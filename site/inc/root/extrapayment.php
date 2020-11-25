<?php 
$userinfo=$Site['session']['User']['userinfo'];

if ( in_array($sitePage, array("extrapayment")) && ($requestMethod == 'GET') && !empty($Site["get"]['event']) && !empty($gets->id)) {
	$payment=$ezDb->get_row("SELECT * FROM `extrapayments` WHERE `token`='$gets->id';");
	if (!empty($payment)){
		$ezDb->query("DELETE FROM `extrapayments` WHERE `token`='$gets->id';");
		$fail="<p class='border badge-pill border-success'>Payment <b>".testInputReverse($payment->token)."</b> was successfully deteted</p>";
		$fail='<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
	}
}

if ( in_array($sitePage, array("extrapayment")) && ($requestMethod == 'POST') && isset($Site["post"]['createpayment']) && $posts->createpayment=='create') {
	if( empty(trim($posts->renewal)) or !in_array($posts->renewal, array("once", "weekly", "monthly", "quarterly", "yearly"))):
		$err++;
		$fail.='<p class="border badge-pill border-danger">Select a valid renewal period status!</p>';
	endif;
	if( empty(trim($posts->amount)) or is_nan($posts->amount) ):
		$err++;
		$fail.='<p class="border badge-pill border-danger">Enter a valid amount!</p>';
	endif;
	if( empty(trim($posts->purpose)) ):
		$err++;
		$fail.='<p class="border badge-pill border-danger">Enter purpose please!</p>';
	endif;
	if( is_nan($posts->discount) or $posts->discount<0 or $posts->discount>100 ):
		$err++;
		$fail.='<p class="border badge-pill border-danger">Enter a valid package discount please!</p>';
	endif;
	$posts->filter=trim(strtolower($posts->filter));
	$filteredClients=null;
	if (!empty($posts->filter)) :
		$filteredClients=$ezDb->get_col("SELECT DISTINCT `store_owner` AS `email` FROM `stores` WHERE LCASE(`store_number`) LIKE '%$posts->filter%';");
	endif;
	if( !empty(trim($posts->filter)) and (empty($filteredClients) and !is_array($posts->clients)))://$posts->clients
		$err++;
		$fail.='<p class="border badge-pill border-danger">Filter cannot be found: Enter a valid filter!</p>';
	endif;
	if( (empty($posts->clients) or !is_array($posts->clients)) and empty($filteredClients) ):
		$err++;
		$fail.='<p class="border badge-pill border-danger">Enter a filter or choose selected clients to create payment for!</p>';
	elseif(!empty($posts->clients) and is_array($posts->clients)):
		foreach($posts->clients as $client):
			if(empty($ezDb->get_var("SELECT `email` FROM `userprofile` WHERE `usertype`='client'")) and $client!='all'):
				$err++;
				$fail.='<p class="border border-danger p-1 rounded">Client '.$client.' does not exist in the system!</p>';
			endif;
		endforeach;
	endif;
	if( $err==0 ):
		$selectedClients=array();
		if( is_array($posts->clients) and count($posts->clients)==1 and $posts->clients[0]=='all' ):
			$selectedClients=$ezDb->get_col("SELECT DISTINCT `email` AS `email` FROM `userprofile` WHERE `usertype`='client';");
		elseif( is_array($posts->clients) and count($posts->clients)>=1 and $posts->clients[0]!='all' ):
			$selectedClients=$posts->clients;
		endif;
		if (!empty($filteredClients) and is_array($filteredClients)):
			foreach ($filteredClients as $key => $value) :
				if(in_array($value, $selectedClients)):
					continue;
				endif;
				array_push($selectedClients, $value);
			endforeach;
		endif;
		@unlink($posts->createpayment);
		$encodedClients=@json_encode($selectedClients);
		/*error_log(json_encode($posts));
		error_log($encodedClients);*/

		$posts->purpose_slug=slugTitle($posts->purpose);
		$posts->purpose=testInput($posts->purpose);
	    $token= getToken(5).$ezDb->get_var("SELECT IF(`id`=NULL,'1',(`id`+1)) FROM `extrapayments` ORDER BY `id` DESC LIMIT 1;");
	    // token	amount	discount	renewal	filter	purpose	pslug	clients	dateadded
	    $ezDb->query("INSERT INTO `extrapayments` (`token`, `amount`, `discount`, `renewal`, `filter`, `purpose`, `pslug`, `clients`, `dateadded`) VALUES ('$token', '$posts->amount', '$posts->discount', '$posts->renewal', '$posts->filter', '$posts->purpose', '$posts->purpose_slug', '$encodedClients', '$dateNow')");

		/*$setting=json_encode($setting);
		if (empty($settings)) {
			$ezDb->query("INSERT INTO `settings` (`subscription`, `updated`) VALUES ('$setting', '$dateNow')");
		}else{
			$ezDb->query("UPDATE `settings` SET `subscription`='$setting'");
		}*/
		$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>new payment outlet was successfully added.</p></div>';
	else:
		$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
	endif;
}

$extrapayments=tableRoutine("extrapayments", '*' , " `id`!=0 $whereClause", '`id`', 'DESC', '`id`', 10);
if (!empty($extrapayments)) {
	foreach ($extrapayments as $key => $extrapayment) {
		$extrapayment->clients=@json_decode($extrapayment->clients);
		$extrapayment->purpose=testInputReverse($extrapayment->purpose);
	}
}

$clients=$ezDb->get_results("SELECT * FROM `userprofile` WHERE `usertype`='client';");

/*Do foreach and get its list of packages it belong*/
$categories=$ezDb->get_col("SELECT DISTINCT `category` FROM `stores`");
$smarty->assign("categories", $categories)->assign("clients", $clients)->assign("extrapayments", $extrapayments);