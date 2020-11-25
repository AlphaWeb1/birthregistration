<?php 

redirect("home");
$id=(!empty($gets->id)? $gets->id: "");
$store=$ezDb->get_row("SELECT * FROM `stores` WHERE `token`='$id'");
if (!empty($store)) {
	$store->images=@json_decode($store->images);
	$store->owner_detail=@json_decode($store->owner_detail);
	$store->profile=$ezDb->get_row("SELECT * FROM `userprofile` WHERE `email`='$store->store_owner';");
	$store->description2=testInputReverseln(trim($store->description));
	$store->otherdetails2=testInputReverseln(trim($store->otherdetails));
	$store->description=testInputReverse(trim($store->description));
	$store->otherdetails=testInputReverse(trim($store->otherdetails));
	if ( in_array($sitePage, array("store")) && ($requestMethod == 'GET') && !empty($gets->evt)  && !empty($gets->id) ) {
		$Store=$ezDb->get_row("SELECT * FROM `stores` WHERE `token`='$gets->id'");
			$Store->images=@json_decode($Store->images);
			$Store->owner_detail=@json_decode($Store->owner_detail);
		if( !empty($Store) and in_array($gets->evt, array('show', 'hide', 'delete')) ){
			$evtMsg=($gets->evt=='show'?'showed': ($gets->evt=='hide'?'hidden':'deleted'));
			if($gets->evt=='show' and $Store->show=='1'):
				$err++;
				$fail.='<p class="border border-danger p-1 rounded">This store had already been showed click Stores in the menu to refresh</p>';
			endif;
			if($gets->evt=='hide' and $Store->show=='0'):
				$err++;
				$fail.='<p class="border border-danger p-1 rounded">This store had already been hidden click Stores in the menu to refresh</p>';
			endif;
			if($err==0):
				$sqlQ="";
				if($gets->evt=='show'):
					$sqlQ="UPDATE `stores` SET `show`='1' WHERE `token`='$gets->id'";
					$store->show=1;
				elseif($gets->evt=='hide'):
					$sqlQ="UPDATE `stores` SET `show`='0' WHERE `token`='$gets->id'";
					$store->show=0;
				elseif($gets->evt=='delete'):
					$sqlQ="DELETE FROM `stores` WHERE `token`='$gets->id'";
					if (!empty($Store->images) and is_array($Store->images)) :
						foreach ($Store->images as $value):
							if (file_exists($value)):
								@unlink($value);
							endif;
						endforeach;
					endif;
				endif;
				$ezDb->query($sqlQ);
				$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p class="border border-success p-1 rounded">Store was successfully '.$evtMsg.'.</p></div>';
			else:
				$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
			endif;
		}
	}

	$userinfo=$Site['session']['User']['userinfo'];
	$fail="";
	$err=0;

	if ( in_array($sitePage, array("store")) && ($requestMethod == 'POST') && isset($Site["post"]['move_store']) ) {
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
		if( empty(trim($posts->store_number)) or inArray2($posts->store_number, $store_numbers)===false):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Select a valid store number please!</p>';
		endif;
		if( empty(trim($posts->description))):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter store detail / description please!</p>';
		endif;
		if( !empty($ezDb->get_var("SELECT `token` FROM `stores` WHERE `store_owner`='$posts->store_owner' AND `token`='$id'"))):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">This client is currently in possession of the store!</p>';
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
			$targetFiles2 =array();
		    if(!empty($store->images) and is_array($store->images)):
		    	if( !file_exists("site/media/archive/store/") ):
			        mkdir("site/media/archive/store/", 0777, true);
			    endif;
			    $token1= getToken(5).$ezDb->get_var("SELECT IF(`id`=NULL,'1',(`id`+1)) FROM `stores` ORDER BY `id` DESC LIMIT 1;");
			    foreach($store->images as $key=>$stImg):
			    	if(!empty($stImg) and file_exists($stImg)):
			    		@copy($stImg, ("site/media/archive/store/".$token1."_image".($key+1).".png"));
			    	endif;
			    	$targetFiles2[$key]=((!empty($stImg) and file_exists($stImg))?"site/media/archive/store/".$token1."_image".($key+1).".png":"");
			    endforeach;
		    endif;
		    $targetFiles2=@json_encode($targetFiles2);

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
		    $ownerDetails->owner_names=$posts->owner_names;
		    $ownerDetails->phone_number=$posts->phone_number;
	    	$ownerDetails->url=$posts->url;
		    $ownerDetails->store_owner_names=$posts->store_owner_names;
		    $ownerDetails->store_owner_email=$posts->store_owner_email;
		    $ownerDetails->store_owners_phone=$posts->store_owners_phone;
		    $ownerDetails->open_hour_string=$posts->open_hour;
		    $ownerDetails->open_hour=strtotime($posts->open_hour);
		    $ownerDetails->close_hour_string=$posts->close_hour;
		    $ownerDetails->close_hour=strtotime($posts->close_hour);
		    $ownerDetails=@json_encode($ownerDetails);

		    $ezDb->query("INSERT INTO `store_archives` (`token`, `store_number`, `store_title`, `store_owner`, `owner_detail`, `description`, `otherdetails`, `category`, `addedby`, `dateadded`, `show`, `images`, `datearchived`) SELECT `token`, `store_number`, `store_title`, `store_owner`, `owner_detail`, `description`, `otherdetails`, `category`, `addedby`, `dateadded`, `show`, '$targetFiles2','$dateNow' FROM `stores` WHERE `token`='$id';");

		    $ezDb->query("UPDATE `stores` SET `store_title`='$posts->store_title', `store_owner`='$posts->store_owner', `owner_detail`='$ownerDetails', `description`='$posts->description', `otherdetails`='$posts->otherdetails', `category`='$posts->category', `dateadded`='$dateNow', `images`='$targetFiles' WHERE `token`='$id';");
		    $store=$ezDb->get_row("SELECT * FROM `stores` WHERE `token`='$id'");
			$store->images=@json_decode($store->images);
			$store->owner_detail=@json_decode($store->owner_detail);
			$store->profile=$ezDb->get_row("SELECT * FROM `userprofile` WHERE `email`='$store->store_owner';");
			$store->description2=testInputReverseln(trim($store->description));
			$store->otherdetails2=testInputReverseln(trim($store->otherdetails));
			$store->description=testInputReverse(trim($store->description));
			$store->otherdetails=testInputReverse(trim($store->otherdetails));

			$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p class="border border-success p-1 rounded"> store was successfully moved.</p></div>';
		else:
			$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
		endif;
	}

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
		if( empty(trim($posts->store_number)) or inArray2($posts->store_number, $store_numbers)===false):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Select a valid store number please!</p>';
		endif;
		if( empty(trim($posts->description))):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter store detail / description please!</p>';
		endif;
		if( !empty($ezDb->get_var("SELECT `token` FROM `stores` WHERE `store_number`='$posts->store_number' AND `token`!='$id'"))):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Kindly user another store number, this store number already exists!</p>';
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
		    $ownerDetails->owner_names=$posts->owner_names;
		    $ownerDetails->phone_number=$posts->phone_number;
	    	$ownerDetails->url=$posts->url;
		    $ownerDetails->store_owner_names=$posts->store_owner_names;
		    $ownerDetails->store_owner_email=$posts->store_owner_email;
		    $ownerDetails->store_owners_phone=$posts->store_owners_phone;
		    $ownerDetails->open_hour_string=$posts->open_hour;
		    $ownerDetails->open_hour=strtotime($posts->open_hour);
		    $ownerDetails->close_hour_string=$posts->close_hour;
		    $ownerDetails->close_hour=strtotime($posts->close_hour);
		    $ownerDetails=@json_encode($ownerDetails);

		    $ezDb->query("UPDATE `stores` SET `store_number`='$posts->store_number', `store_title`='$posts->store_title', `store_owner`='$posts->store_owner', `owner_detail`='$ownerDetails', `description`='$posts->description', `otherdetails`='$posts->otherdetails', `category`='$posts->category', `dateadded`='$dateNow', `images`='$targetFiles' WHERE `token`='$id';");
			$store=$ezDb->get_row("SELECT * FROM `stores` WHERE `token`='$id'");
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
	$store->archives=$ezDb->get_var("SELECT COUNT(`store_number`) FROM `store_archives` WHERE `store_number`='$store->store_number';");
}else{
	redirect('stores');
}
$clients=$ezDb->get_results("SELECT * FROM `userprofile` WHERE `usertype`='client';");
$categories=$ezDb->get_col("SELECT DISTINCT `category` FROM `stores`");
$smarty->assign('store_numbers', $store_numbers)->assign("store", $store)->assign("categories", $categories)->assign("clients", $clients);