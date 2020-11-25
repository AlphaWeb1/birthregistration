<?php 
	redirect("home");
$userinfo=$Site['session']['User']['userinfo'];

$id=(!empty($gets->id)? $gets->id: "");
$promo=$ezDb->get_row("SELECT * FROM `promo` WHERE `token`='$id';");
if (!empty($promo)){
	if ( in_array($sitePage, array("promo")) && ($requestMethod == 'POST') && isset($Site["post"]['edit_promo']) ) {
		$posts = (object) $Site["post"];
		$files= (object) $Site["files"];
		// error_log(json_encode($files));
		$targetDir="site/media/promo/";
		$extensions = array("image/jpg","image/png","image/jpe","image/jpeg", "image/jp2", "image/tiff", "image/tiff");
		if ( !empty($files->img_upload['tmp_name']) and !in_array(strtolower(getMime($files->img_upload['tmp_name'])), $extensions)):
	    	$fail .= '<p class="border border-danger p-1 rounded">The uploaded profile picture is not an image file. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
	        $err++;
	    endif;
		if( empty(trim($posts->company)) ):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter promo company or organization name please!</p>';
		endif;
		if ( !(in_array( $userinfo->userrole, array('level0','level1')) and  $userinfo->active==true)):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">You are not authorized to add promo!</p>';
		endif;
		if( empty(trim($posts->description)) ):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter promo detail / description please!</p>';
		endif;
		if( !empty($posts->store) and is_array($posts->store)):
			foreach($posts->store as $store):
				if(empty($ezDb->get_var("SELECT `token` FROM `stores` WHERE `token`='$store'"))):
					$err++;
					$fail.='<p class="border border-danger p-1 rounded">One of the select stores no longer exists!</p>';
					break;
				endif;
			endforeach;
		endif;
		/*error_log(json_encode($posts));
		$err++;*/
		if( empty(trim($posts->category)) ):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">Enter promo category please!</p>';
		endif;
		if( $err==0 ):
			if( !file_exists("$targetDir") ):
		        mkdir("$targetDir", 0777, true);
		    endif;
		    if (file_exists($promo->image) && is_file($promo->image) && !empty($files->img_upload['tmp_name'])):
				@unlink($promo->image);
			endif;
		    $targetFile = $targetDir . $id."_promo.png";
		    if( !empty($files->img_upload['tmp_name']) and @move_uploaded_file($files->img_upload['tmp_name'], $targetFile) ):
		    else:
		    	$targetFile=$promo->image;
		    endif;
		    $posts->description=testInputln($posts->description);
		    $posts->title=testInputln($posts->title);
	    	$selStores=@json_encode($posts->store);
		    //id	updateid	title	content	image	addedby	dateadded
		    $ezDb->query("UPDATE `promo` SET `company`='$posts->company', `description`='$posts->description', `category`='$posts->category', `image`='$targetFile', `stores`='$selStores' WHERE `token`='$id';");
			$promo=$ezDb->get_row("SELECT * FROM `promo` WHERE `token`='$id';");

			$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p> promo was successfully updated.</p></div>';
		else:
			$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
		endif;
	}
	$promo->companyln=testinputReverseln($promo->company);
	$promo->company=testinputReverseln($promo->company);
	$promo->descriptionln=testinputReverseln($promo->description);
	$promo->description=testinputReverse($promo->description);
	$promo->stores=@json_decode($promo->stores);
	$promo->stores=((empty($promo->stores) and !is_array($promo->stores))?array(): $promo->stores);
	if (!empty($promo->stores)) {
		foreach ($promo->stores as $key => $store) {
			$promo->storesDetails[$key]=$ezDb->get_row("SELECT * FROM `stores` WHERE `token`='$store'");
			$promo->storesDetails[$key]->owner_detail=@json_decode($promo->storesDetails[$key]->owner_detail);
			$promo->storesDetails[$key]->images=@json_decode($promo->storesDetails[$key]->images);
			$promo->storesDetails[$key]->description2=testInputReverseln(trim($promo->storesDetails[$key]->description));
			$promo->storesDetails[$key]->description=testInputReverse(trim($promo->storesDetails[$key]->description));
		}
	}
}else{
	redirect("promo");
}
$stores=$ezDb->get_results("SELECT * FROM `stores`;");
if (!empty($stores)) {
	foreach ($stores as $key => $store) {
		$store->images=@json_decode($store->images);
		$store->owner_detail=@json_decode($store->owner_detail);
		$store->profile=$ezDb->get_row("SELECT * FROM `userprofile` WHERE `email`='$store->store_owner';");
		$store->description2=testInputReverseln(trim($store->description));
		$store->description=testInputReverse(trim($store->description));
	}
}

$categories=$ezDb->get_col("SELECT DISTINCT `category` FROM `promo`");
$smarty->assign("categories", $categories)->assign("promo", $promo)->assign("stores", $stores);