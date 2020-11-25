<?php 
$userinfo=$Site['session']['User']['userinfo'];

$id=(!empty($gets->id)? $gets->id: "");
$store=$ezDb->get_row("SELECT * FROM `stores` WHERE `token`='$id' AND `store_owner`='$userinfo->email';");
if (!empty($store)) {
	$store->images=@json_decode($store->images);
	$store->owner_detail=@json_decode($store->owner_detail);
	$store->profile=$ezDb->get_row("SELECT * FROM `userprofile` WHERE `email`='$store->store_owner';");
	$store->description2=testInputReverseln(trim($store->description));
	$store->otherdetails2=testInputReverseln(trim($store->otherdetails));
	$store->description=testInputReverse(trim($store->description));
	$store->otherdetails=testInputReverse(trim($store->otherdetails));

	$fail="";
	$err=0;
	if ( in_array($sitePage, array("store")) && ($requestMethod == 'POST') && isset($Site["post"]['edit_store']) ) {
		$posts = (object) $Site["post"];
		$files= (object) $Site["files"];
		// error_log(json_encode($files));
		$targetDir="site/media/store/";
		$extensions = array("image/jpg","image/png","image/jpe","image/jpeg", "image/jp2", "image/tiff", "image/tiff");
		if ( !empty($files->img_upload['tmp_name']) and !in_array(strtolower(getMime($files->img_upload['tmp_name'])), $extensions)):
	    	$fail .= '<p class="border border-danger p-1 rounded">Kindly upload a valid image 1 file for store. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
	        $err++;
	    endif;
		if ( !empty($files->img_upload1['tmp_name']) and !in_array(strtolower(getMime($files->img_upload1['tmp_name'])), $extensions)):
	    	$fail .= '<p class="border border-danger p-1 rounded">Kindly upload a valid image 2 file for store. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
	        $err++;
	    endif;
		if ( !empty($files->img_upload2['tmp_name']) and !in_array(strtolower(getMime($files->img_upload2['tmp_name'])), $extensions)):
	    	$fail .= '<p class="border border-danger p-1 rounded">Kindly upload a valid image 3 file for store. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
	        $err++;
	    endif;
		if ( !empty($files->img_upload3['tmp_name']) and !in_array(strtolower(getMime($files->img_upload3['tmp_name'])), $extensions)):
	    	$fail .= '<p class="border border-danger p-1 rounded">Kindly upload a valid image 4 file for store. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
	        $err++;
	    endif;
		if( empty(trim($posts->store_title)) ):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter store title please!</p>';
		endif;
		if( empty(trim($posts->description))):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter store detail / description please!</p>';
		endif;
		if( empty(trim($posts->open_hour))/* or strtotime($posts->open_hour)*/):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter a valid time for Opening Hour!</p>';
		endif;
		if( empty(trim($posts->close_hour)) /*or strtotime($posts->close_hour)*/):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter a valid time for Closing Hour!</p>';
		endif;
		if( $err==0 ):
			if( !file_exists("$targetDir") ):
		        mkdir("$targetDir", 0777, true);
		    endif;
		    $token= $id;
		    $targetFiles =array();

		    $targetFiles[0]= $targetDir . $token."_image.png";
		    if(!empty($files->img_upload['tmp_name'])):
		    	@unlink($store->images[0]);
		    endif;
		    $targetFiles[0]=( (!empty($files->img_upload['tmp_name']) and @move_uploaded_file($files->img_upload['tmp_name'], $targetFiles[0]))? $targetFiles[0]: $store->images[0]);
		    $targetFiles[1]= $targetDir . $token."_image1.png";
		    if(!empty($files->img_upload1['tmp_name'])):
		    	@unlink($store->images[1]);
		    endif;
		    $targetFiles[1]=( (!empty($files->img_upload1['tmp_name']) and @move_uploaded_file($files->img_upload1['tmp_name'], $targetFiles[1]))? $targetFiles[1]: $store->images[1]);
		    $targetFiles[2]= $targetDir . $token."_image2.png";
		    if(!empty($files->img_upload2['tmp_name'])):
		    	@unlink($store->images[2]);
		    endif;
		    $targetFiles[2]=( (!empty($files->img_upload2['tmp_name']) and @move_uploaded_file($files->img_upload2['tmp_name'], $targetFiles[2]))? $targetFiles[2]: $store->images[2]);
		    $targetFiles[3]= $targetDir . $token."_image3.png";
		    if(!empty($files->img_upload3['tmp_name'])):
		    	@unlink($store->images[3]);
		    endif;
		    $targetFiles[3]=( (!empty($files->img_upload3['tmp_name']) and @move_uploaded_file($files->img_upload3['tmp_name'], $targetFiles[3]))? $targetFiles[3]: $store->images[3]);

		    $targetFiles=@json_encode($targetFiles);
		    $posts->description=testInputln($posts->description);
		    $posts->otherdetails=testInputln($posts->otherdetails);
		    $posts->store_title=testInput($posts->store_title);
		    $ownerDetails=new stdClass();
		    $ownerDetails->owner_names=$store->owner_detail->owner_names;
		    $ownerDetails->phone_number=$posts->phone_number;
	    	$ownerDetails->url=$posts->url;
		    $ownerDetails->store_owner_names=$store->owner_detail->store_owner_names;
		    $ownerDetails->store_owner_email=$store->owner_detail->store_owner_email;
		    $ownerDetails->store_owners_phone=$store->owner_detail->store_owners_phone;
		    $ownerDetails->open_hour_string=$posts->open_hour;
		    $ownerDetails->open_hour=strtotime($posts->open_hour);
		    $ownerDetails->close_hour_string=$posts->close_hour;
		    $ownerDetails->close_hour=strtotime($posts->close_hour);
		    $ownerDetails=@json_encode($ownerDetails);

		    $ezDb->query("UPDATE `stores` SET `store_title`='$posts->store_title', `owner_detail`='$ownerDetails', `description`='$posts->description', `otherdetails`='$posts->otherdetails', `category`='$posts->category', `images`='$targetFiles' WHERE `token`='$id' AND `store_owner`='$userinfo->email';");
			$store=$ezDb->get_row("SELECT * FROM `stores` WHERE `token`='$id' AND `store_owner`='$userinfo->email'");
			$store->images=@json_decode($store->images);
			$store->owner_detail=@json_decode($store->owner_detail);
			$store->profile=$ezDb->get_row("SELECT * FROM `userprofile` WHERE `email`='$store->store_owner';");
			$store->description2=testInputReverseln(trim($store->description));
			$store->otherdetails2=testInputReverseln(trim($store->otherdetails));
			$store->description=testInputReverse(trim($store->description));
			$store->otherdetails=testInputReverse(trim($store->otherdetails));

			$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p class="border border-success p-1 rounded"> store was successfully updated.</p></div>';
		else:
			$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
		endif;
	}

	$store->rate=$ezDb->get_var("SELECT SUM(`rating`)/COUNT(`rating`) FROM `rating` WHERE `token`='$store->token' AND `type`='store'");
	$store->rate=(empty($store->rate)? 0: $store->rate);
	$store->rateCeil=(count(explode(".", $store->rate))>1.0? explode(".", $store->rate)[0]: $store->rate);
	$store->rateFloor=(round(explode(".", $store->rate))>=1? 1 :0);
	$store->rateRem=5-$store->rateCeil;
	$store->rateDetails=$ezDb->get_results("SELECT `comment`, `email` FROM `rating` WHERE `token`='$store->token' AND `type`='store' AND `comment`!=''");
}else{
	redirect('stores');
}
$categories=$ezDb->get_col("SELECT DISTINCT `category` FROM `stores`");

$smarty->assign("store", $store)->assign("categories", $categories);