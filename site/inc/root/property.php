<?php 
	redirect("home");
$id=(!empty($gets->id)? $gets->id: "");
$property=$ezDb->get_row("SELECT * FROM `properties` WHERE `token`='$id'");
if (!empty($property)) {
	$property->images=@json_decode($property->images);
	if ( in_array($sitePage, array("property")) && ($requestMethod == 'GET') && !empty($gets->evt)  && !empty($gets->id) ) {
		$Property=$ezDb->get_row("SELECT * FROM `properties` WHERE `token`='$gets->id'");
			$Property->images=@json_decode($Property->images);
			// $Store->owner_detail=@json_decode($Store->owner_detail);
		if( !empty($Property) and in_array($gets->evt, array('show', 'hide', 'delete')) ){
			$evtMsg=($gets->evt=='show'?'showed': ($gets->evt=='hide'?'hidden':'deleted'));
			if($gets->evt=='show' and $Property->show=='1'):
				$err++;
				$fail.='<p class="border border-danger p-1 rounded">This property had already been showed click Properties in the menu to refresh</p>';
			endif;
			if($gets->evt=='hide' and $Property->show=='0'):
				$err++;
				$fail.='<p class="border border-danger p-1 rounded">This property had already been hidden click Properties in the menu to refresh</p>';
			endif;
			if($err==0):
				$sqlQ="";
				if($gets->evt=='show'):
					$sqlQ="UPDATE `properties` SET `show`='1' WHERE `token`='$gets->id'";
				elseif($gets->evt=='hide'):
					$sqlQ="UPDATE `properties` SET `show`='0' WHERE `token`='$gets->id'";
				elseif($gets->evt=='delete'):
					$sqlQ="DELETE FROM `properties` WHERE `token`='$gets->id'";
					if (!empty($Property->images) and is_array($Property->images)) :
						foreach ($Property->images as $value):
							if (file_exists($value)):
								@unlink($value);
							endif;
						endforeach;
					endif;
				endif;
				$ezDb->query($sqlQ);
				$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p class="border border-success p-1 rounded">Property was successfully '.$evtMsg.'.</p></div>';
			else:
				$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
			endif;
		}
	}
	$userinfo=$Site['session']['User']['userinfo'];
	$fail="";
	$err=0;

	if ( in_array($sitePage, array("property")) && ($requestMethod == 'POST') && isset($Site["post"]['edit_prop']) ) {
		$posts = (object) $Site["post"];
		$files= (object) $Site["files"];
		// error_log(json_encode($files));
		$targetDir="site/media/property/";
		$extensions = array("image/jpg","image/png","image/jpe","image/jpeg", "image/jp2", "image/tiff", "image/tiff");
		if ( !empty($files->img_upload['tmp_name']) and !in_array(strtolower(getMime($files->img_upload['tmp_name'])), $extensions)):
	    	$fail .= '<p class="border border-danger p-1 rounded">Kindly upload a valid image 1 file for property. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
	        $err++;
	    endif;
		if ( !empty($files->img_upload1['tmp_name']) and !in_array(strtolower(getMime($files->img_upload1['tmp_name'])), $extensions)):
	    	$fail .= '<p class="border border-danger p-1 rounded">Kindly upload a valid image 2 file for property. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
	        $err++;
	    endif;
		if ( !empty($files->img_upload2['tmp_name']) and !in_array(strtolower(getMime($files->img_upload2['tmp_name'])), $extensions)):
	    	$fail .= '<p class="border border-danger p-1 rounded">Kindly upload a valid image 3 file for property. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
	        $err++;
	    endif;
		if ( !empty($files->img_upload3['tmp_name']) and !in_array(strtolower(getMime($files->img_upload3['tmp_name'])), $extensions)):
	    	$fail .= '<p class="border border-danger p-1 rounded">Kindly upload a valid image 4 file for property. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
	        $err++;
	    endif;
		if( empty(trim($posts->prop_title)) ):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter property title please!</p>';
		endif;
		if( empty(trim($posts->prop_mode)) or !in_array($posts->prop_mode, array("for sale", "for rent"))):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Select a valid property sales type!</p>';
		endif;
		if( empty(trim($posts->prop_number))):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter property number please!</p>';
		endif;
		if( empty(trim($posts->description))):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter property detail / description please!</p>';
		endif;
		if( !empty($ezDb->get_var("SELECT `token` FROM `properties` WHERE `prop_number`='$posts->prop_number' AND `token`!='$id'"))):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Kindly user another property number, this store number already exists!</p>';
		endif;
		if( $err==0 ):
			if( !file_exists("$targetDir") ):
		        mkdir("$targetDir", 0777, true);
		    endif;
		    $token= $id;
		    $targetFiles =array();

		    $targetFiles[0]= $targetDir . $token."_image.png";
		    if(!empty($files->img_upload['tmp_name'])):
		    	@unlink($property->images[0]);
		    endif;
		    $targetFiles[0]=( (!empty($files->img_upload['tmp_name']) and @move_uploaded_file($files->img_upload['tmp_name'], $targetFiles[0]))? $targetFiles[0]: $property->images[0]);
		    $targetFiles[1]= $targetDir . $token."_image1.png";
		    if(!empty($files->img_upload1['tmp_name'])):
		    	@unlink($property->images[1]);
		    endif;
		    $targetFiles[1]=( (!empty($files->img_upload1['tmp_name']) and @move_uploaded_file($files->img_upload1['tmp_name'], $targetFiles[1]))? $targetFiles[1]: $property->images[1]);
		    $targetFiles[2]= $targetDir . $token."_image2.png";
		    if(!empty($files->img_upload2['tmp_name'])):
		    	@unlink($property->images[2]);
		    endif;
		    $targetFiles[2]=( (!empty($files->img_upload2['tmp_name']) and @move_uploaded_file($files->img_upload2['tmp_name'], $targetFiles[2]))? $targetFiles[2]: $property->images[2]);
		    $targetFiles[3]= $targetDir . $token."_image3.png";
		    if(!empty($files->img_upload3['tmp_name'])):
		    	@unlink($property->images[3]);
		    endif;
		    $targetFiles[3]=( (!empty($files->img_upload3['tmp_name']) and @move_uploaded_file($files->img_upload3['tmp_name'], $targetFiles[3]))? $targetFiles[3]: $property->images[3]);

		    $targetFiles=@json_encode($targetFiles);
		    $posts->description=testInputln($posts->description);
		    $posts->otherdetails=testInputln($posts->otherdetails);
		    $posts->prop_title=testInput($posts->prop_title);

		    $ezDb->query("UPDATE `properties` SET `prop_number`='$posts->prop_number', `prop_title`='$posts->prop_title', `email`='$posts->email', `phone_number`='$posts->phone_number', `description`='$posts->description', `otherdetails`='$posts->otherdetails', `category`='$posts->category', `dateadded`='$dateNow', `images`='$targetFiles', `amount`='$posts->amount', `url`='$posts->url', `prop_mode`='$posts->prop_mode' WHERE `token`='$id';");
			$property=$ezDb->get_row("SELECT * FROM `properties` WHERE `token`='$id'");
			$property->images=@json_decode($property->images);

			$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p class="border border-success p-1 rounded"> property detail was successfully updated.</p></div>';
		else:
			$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
		endif;
	}

	$property->description2=testInputReverseln(trim($property->description));
	$property->otherdetails2=testInputReverseln(trim($property->otherdetails));
	$property->description=testInputReverse(trim($property->description));
	$property->otherdetails=testInputReverse(trim($property->otherdetails));


}else{
	redirect('properties');
}
$categories=$ezDb->get_col("SELECT DISTINCT `category` FROM `properties`");
$smarty->assign("property", $property)->assign("categories", $categories);