<?php
	redirect("home");

$clientemail=(!empty($gets->id)? $gets->id: "");
$client=$ezDb->get_row("SELECT * FROM `userprofile` WHERE `username`='$clientemail' OR `email`='$clientemail' AND `usertype`='client';");
if (!empty($client) and is_object($client)) {
	/*$client->stores=tableRoutine("stores", '*' , " `id`!=0 AND `store_owner`='$clientemail' ", '`id`', 'DESC', '`id`', '15');
	if (!empty($client->stores)) {
		foreach ($client->stores as $key => $store) {
			$store->images=@json_decode($store->images);
			$store->owner_detail=@json_decode($store->owner_detail);
			$store->description2=testInputReverseln(trim($store->description));
			$store->otherdetails2=testInputReverseln(trim($store->otherdetails));
			$store->description=testInputReverse(trim($store->description));
			$store->otherdetails=testInputReverse(trim($store->otherdetails));
		}
	}
	$client->transactions=$ezDb->get_results("SELECT * FROM `payments` WHERE `paidby`='$clientemail'");
	$client->archives=$ezDb->get_var("SELECT COUNT(`store_number`) FROM `store_archives` WHERE `store_owner`='$clientemail';");*/
}else{
	redirect("clients");
}

if ( in_array($sitePage, array("client")) && ($requestMethod == 'POST') && !empty($posts->pay) && $posts->pay=='admin' ) {

	$mainPayment=$ezDb->get_row("SELECT * FROM `extrapayments` WHERE `clients` LIKE'%$clientemail%' AND `token`='$posts->payid';");
	if (!empty($mainPayment)) {
		$dateIntervalStat1='';
		if ($mainPayment->renewal=='once') {
			$dateIntervalStat1="COUNT(`transdate`)";
		}elseif ($mainPayment->renewal=='weekly') {
			$dateIntervalStat1="DATEDIFF('$dateNow',`transdate`)";
		}elseif ($mainPayment->renewal=='monthly') {
			$dateIntervalStat1="TIMESTAMPDIFF(MONTH,`transdate`,'$dateNow')";
		}elseif ($mainPayment->renewal=='quarterly') {
			$dateIntervalStat1="TIMESTAMPDIFF(MONTH,`transdate`,'$dateNow')";
		}elseif ($mainPayment->renewal=='yearly') {
			$dateIntervalStat1="TIMESTAMPDIFF(YEAR,`transdate`,'$dateNow') AS `nofyear`, DATEDIFF('$dateNow',`transdate`)";
		}
		$mainPayment->clients=@json_decode($mainPayment->clients);
		$mainPayment->purpose=testInputReverse($mainPayment->purpose);
		$mainPayment->lastPayment=$ezDb->get_row("SELECT *, $dateIntervalStat1 AS `expired`, FALSE AS `isExpired` FROM `payments` WHERE `purpose`='$mainPayment->pslug' AND `token` LIKE '%$mainPayment->token-%' AND `paidby`='$clientemail' ORDER BY `id` DESC LIMIT 1");
		if (
			($mainPayment->renewal=='once' && $mainPayment->lastPayment->expired<1) or 
			($mainPayment->renewal=='weekly' && $mainPayment->lastPayment->expired>7) or 
			($mainPayment->renewal=='monthly' && $mainPayment->lastPayment->expired>0) or 
			($mainPayment->renewal=='quarterly' && $mainPayment->lastPayment->expired>4) or 
			($mainPayment->renewal=='yearly' && $mainPayment->lastPayment->expired>=1) or empty($mainPayment->lastPayment)
			){
			$mainPayment->lastPayment=(empty($mainPayment->lastPayment)?new stdClass() :$mainPayment->lastPayment);
			$mainPayment->lastPayment->isExpired=true;
		}
		if ($mainPayment->lastPayment->isExpired==true) {
			$email=$clientemail;
			$amount=$mainPayment->amount-($mainPayment->amount*($mainPayment->discount/100));
			$token=$mainPayment->token."-".getToken(5).$ezDb->get_var("SELECT IFNULL((`id`+1), 1) FROM `payments` ORDER BY `id` DESC LIMIT 1");
			$err=0;
			$fail='';
			$targetDir="site/media/proof/";
			$extensions = array("image/jpg","image/png","image/jpe","image/jpeg", "image/jp2", "image/tiff", "image/tiff");
			if ( !empty($files->img_upload['tmp_name']) and !in_array(strtolower(getMime($files->img_upload['tmp_name'])), $extensions)):
		    	$fail .= '<p>The uploaded payment proof is not an image file. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
		        $err++;
		    endif;
			if( empty(trim($posts->transid))):
				$err++;
				$fail.='<p class="border border-danger p-1 rounded">Enter transaction id please!</p>';
			endif;
			if( $err==0 ):
				if( !file_exists("$targetDir") ):
			        mkdir("$targetDir", 0777, true);
			    endif;
			    $pToken=$posts->transid."_adm".$ezDb->get_var("SELECT IFNULL((`id`+1),'1') FROM `payments` ORDER BY `id` DESC LIMIT 1;");
			    $gTk=$mainPayment->token."-".getToken(5).$ezDb->get_var("SELECT IFNULL((`id`+1), 1) FROM `payments` ORDER BY `id` DESC LIMIT 1");
			    $targetFile = $targetDir . $pToken."_proof.png";
			    if( !empty($files->img_upload['tmp_name']) and @move_uploaded_file($files->img_upload['tmp_name'], $targetFile) ):
			    else:
			    	$targetFile='';
			    endif;
			    	$ezDb->query("INSERT INTO `payments` (`transid`, `transid1`, `token`, `purpose`, `amount`, `transdate`, `gateway`, `paidby`, `status1`, `status`, `discount`, `proof`) VALUES ('$gTk', '$pToken', '$gTk', '$mainPayment->pslug', '$mainPayment->amount', '$dateNow', 'admin', '$clientemail', 'success', '1', '$mainPayment->discount', '$targetFile');");
					$client->transactions=$ezDb->get_results("SELECT * FROM `payments` WHERE `paidby`='$clientemail'");

				$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Success!</h3> <p class="border border-success p-1 rounded">Payment for '.ucwords($mainPayment->purpose).' successfully renewed</p></div>';
			else:
				$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
			endif;

			/*$Site["session"]['subToken']=$token;
			$Site["session"]['purpose']=$mainPayment->purpose;
			$Site["session"]['pslug']=$mainPayment->pslug;
			$Site["session"]['amount']=$mainPayment->amount;
			$Site["session"]['discount']=$mainPayment->discount;
			$_SESSION=$Site["session"];
			$sessions= (object)$Site["session"];*/
			/*require_once 'paystack_connect.php';*/
		}else{
			$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
				<p class="border border-danger p-1 rounded">You are on active payment for '.$mainPayment->purpose.'</p>
			</div>';
		}
	}else{
		$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
				<p class="border border-danger p-1 rounded">Unable to find selected payment outlet</p>
			</div>';
	}
}

/*$otherPayments=$ezDb->get_results("SELECT * FROM `extrapayments` WHERE `clients` LIKE'%$clientemail%';");*/

/*if (!empty($otherPayments)) {
	foreach ($otherPayments as $key => $otherPayment) {
		$dateIntervalStat1='';
		if ($otherPayment->renewal=='once') {
			$dateIntervalStat1="COUNT(`transdate`)";
		}elseif ($otherPayment->renewal=='weekly') {
			$dateIntervalStat1="DATEDIFF('$dateNow',`transdate`)";
		}elseif ($otherPayment->renewal=='monthly') {
			$dateIntervalStat1="TIMESTAMPDIFF(MONTH,`transdate`,'$dateNow')";
		}elseif ($otherPayment->renewal=='quarterly') {
			$dateIntervalStat1="TIMESTAMPDIFF(MONTH,`transdate`,'$dateNow')";
		}elseif ($otherPayment->renewal=='yearly') {
			$dateIntervalStat1="TIMESTAMPDIFF(YEAR,`transdate`,'$dateNow') AS `nofyear`, DATEDIFF('$dateNow',`transdate`)";
		}
		$otherPayment->clients=@json_decode($otherPayment->clients);
		$otherPayment->purpose=testInputReverse($otherPayment->purpose);
		$otherPayment->lastPayment=$ezDb->get_row("SELECT *, $dateIntervalStat1 AS `expired`, FALSE AS `isExpired` FROM `payments` WHERE `purpose`='$otherPayment->pslug' AND `token` LIKE '%$otherPayment->token-%' AND `paidby`='$clientemail' ORDER BY `id` DESC LIMIT 1");
		if (
			($otherPayment->renewal=='once' && $otherPayment->lastPayment->expired<1) or 
			($otherPayment->renewal=='weekly' && $otherPayment->lastPayment->expired>7) or 
			($otherPayment->renewal=='monthly' && $otherPayment->lastPayment->expired>0) or 
			($otherPayment->renewal=='quarterly' && $otherPayment->lastPayment->expired>4) or 
			($otherPayment->renewal=='yearly' && $otherPayment->lastPayment->expired>=1) or empty($otherPayment->lastPayment)
			){
			$otherPayment->lastPayment=(empty($otherPayment->lastPayment)?new stdClass() :$otherPayment->lastPayment);
			$otherPayment->lastPayment->isExpired=true;
		}

	}
	// error_log(json_encode($otherPayments));
}*/

$smarty->assign("user", $client);