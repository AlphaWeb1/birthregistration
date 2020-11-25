<?php

redirect("home");
$userinfo=$Site["session"]["User"]["userinfo"];
$storeNKeys=array_keys($store_numbers);
array_push($storeNKeys, 'all');

$clients=$ezDb->get_results("SELECT `email`, CONCAT(`firstname`, ' ', `middlename`, '', `lastname`) AS `names` FROM `userprofile` WHERE `usertype`='client' AND `verified`='1';");
if ( in_array($sitePage, array("compose")) && ($requestMethod == 'POST') && isset($Site["post"]['send_message']) ) {
	// error_log(json_encode($files));
	/*$targetDir="site/media/messaging/";
	$extensions = array("image/jpg","image/png","image/jpe","image/jpeg", "image/jp2", "image/tiff", "image/tiff");*/
	/*if ( !empty($files->img_upload['tmp_name']) and !in_array(strtolower(getMime($files->img_upload['tmp_name'])), $extensions)):
    	$fail .= '<p>The uploaded profile picture is not an image file. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
        $err++;
    endif;*/
	$receiver=array();
	if( empty(trim($posts->sendto)) or !in_array($posts->sendto, array("*","#","$"))):
		$err++;
		$fail.='<p class="border badge-pill border-danger">Choose a valid send to!</p>';
	elseif( $posts->sendto=='#'):
		if( empty($posts->receivers) or !is_array($posts->receivers) ):
			$err++;
			$fail.='<p class="border badge-pill border-danger">Kindly choose receiver(s)!</p>';
		else:
			foreach ($posts->receivers as $key => $value):
				if(empty($value) or empty($ezDb->get_var("SELECT `email` FROM `userprofile` WHERE `email`='$value' AND `usertype`='client' AND `verified`='1'"))):
					$err++;
					$fail.='<p class="border badge-pill border-danger">This ('.$value.') receiver is not a valid registered user!</p>';
				elseif(!empty($value)):
					array_push($receiver, $value);
				endif;
			endforeach;
		endif;
	elseif( $posts->sendto=='$'):
		$receiver=array();
		/*$posts->filter=trim(strtolower($posts->filter));
		if (!empty($posts->filter)) :
			$receiver=$ezDb->get_col("SELECT DISTINCT `store_owner` AS `email` FROM `stores` WHERE LCASE(`store_number`) LIKE '%$posts->filter%';");
		endif;
		if( empty(trim($posts->filter)) or empty($receiver) or count($receiver))://$posts->clients
			$err++;
			$fail.='<p class="border badge-pill border-danger">Filter cannot be found: Enter a valid filter!</p>';
		endif;*/
		if( (empty($posts->blockNum) or !is_array($posts->blockNum)) or count(array_diff($posts->blockNum, $storeNKeys)) ):
			$err++;
			$fail.='<p class="border badge-pill border-danger">Kindly choose a block; one of the chosen block is invalid or no block was chosen!</p>';
		elseif( (!empty($posts->blockNum) and is_array($posts->blockNum)) and ( empty($posts->storeNum) or (is_array($posts->storeNum) and $posts->storeNum[0]=='all') ) ):
			$blockKeys="";
			foreach ($posts->blockNum as $key => $value):
				if ($value=='all'):
					$receiver=$ezDb->get_col("SELECT DISTINCT `store_owner` AS `email` FROM `stores`;");
					$blockKeys="";
					break;
				endif;
				$blockKeys.=(($key==0?"WHERE ": "OR ")." `store_number` LIKE'$value%'");
			endforeach;
			if (!empty($blockKeys)) :
				$receiver=$ezDb->get_col("SELECT DISTINCT `store_owner` AS `email` FROM `stores` $blockKeys;");
			endif;
		elseif( (!empty($posts->blockNum) and is_array($posts->blockNum)) and ( !empty($posts->storeNum) or (is_array($posts->storeNum) and $posts->storeNum[0]!='all') ) ):
			$blockVals="";
			foreach ($posts->storeNum as $key => $value):
				$blockVals.=(($key==0?"WHERE `store_number` IN('$value'": ",'$value' "));
			endforeach;
			if (!empty($blockKeys)) :
				$blockVals.=")";
				$receiver=$ezDb->get_col("SELECT DISTINCT `store_owner` AS `email` FROM `stores` $blockKeys;");
			endif;
		else:
			$err++;
			$fail.='<p class="border badge-pill border-danger">Kindly choose a valid store number!</p>';
		endif;
		if(empty($receiver) or count($receiver)==0):
			$err++;
			$fail.='<p class="border badge-pill border-danger">Unable to find message recepient on chosen store(s)!</p>';
		endif;
	elseif( $posts->sendto=='*'):
		$receiver=$ezDb->get_col("SELECT `email` FROM `userprofile` WHERE `usertype`='client' AND `verified`='1';");
	endif;
	if( empty(trim($posts->title)) ):
		$err++;
		$fail.='<p class="border badge-pill border-danger">Enter post title please!</p>';
	endif;
	if( empty(trim($posts->content)) ):
		$err++;
		$fail.='<p class="border badge-pill border-danger">Enter post content please!</p>';
	endif;
	if( $err==0 ):
		/*if( !file_exists("$targetDir") ):
	        mkdir("$targetDir", 0777, true);
	    endif;*/
	    $messageid= getToken(6).$ezDb->get_var("SELECT IF(`id`=NULL,'1',(`id`+1)) FROM `messages` ORDER BY `id` DESC LIMIT 1;");
	    /*$targetFile = $targetDir . $updateid."_update.png";
	    if( !empty($files->img_upload['tmp_name']) and @move_uploaded_file($files->img_upload['tmp_name'], $targetFile) ):
	    else:
	    	$targetFile="";
	    endif;*/
	    $posts->content=testInput($posts->content);
	    $posts->title=testInput($posts->title);
	    //id	messageid	sender	title	content	receivers	readers	datesent	reply	attachement
	    $ezDb->query("INSERT INTO `messages` (`messageid`, `title`, `content`, `sender`, `receivers`, `readers`, `datesent`, `reply`, `attachement`) VALUES ('$messageid', '$posts->title', '$posts->content', '$userinfo->email', '".json_encode($receiver)."', '".json_encode($emptyArray)."', '$dateNow', '', '')");

		$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>Message succesfully sent.</p></div>';
	else:
		$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
	endif;
}

$smarty->assign('store_numbers', $store_numbers)->assign("clients", $clients)->assign("centers", $centers);