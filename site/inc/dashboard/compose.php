<?php
$userinfo=$Site["session"]["User"]["userinfo"];

if ( in_array($sitePage, array("compose")) && ($requestMethod == 'POST') && isset($Site["post"]['send_message']) ) {
	// error_log(json_encode($files));
	/*$targetDir="site/media/messaging/";
	$extensions = array("image/jpg","image/png","image/jpe","image/jpeg", "image/jp2", "image/tiff", "image/tiff");
	if ( !empty($files->img_upload['tmp_name']) and !in_array(strtolower(getMime($files->img_upload['tmp_name'])), $extensions)):
    	$fail .= '<p>The uploaded profile picture is not an image file. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
        $err++;
    endif;*/
	if( empty(trim($posts->title)) ):
		$err++;
		$fail.='<p>Enter post title please!</p>';
	endif;
	if( empty(trim($posts->content)) ):
		$err++;
		$fail.='<p>Enter post content please!</p>';
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
	    $receiver=array();
	    array_push($receiver, "admin");

	    $ezDb->query("INSERT INTO `messages` (`messageid`, `title`, `content`, `sender`, `receivers`, `readers`, `datesent`, `reply`, `attachement`) VALUES ('$messageid', '$posts->title', '$posts->content', '$userinfo->email', '".json_encode($receiver)."', '".json_encode($emptyArray)."', '$dateNow', '', '')");

		$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>Message succesfully sent.</p></div>';
	else:
		$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
	endif;
}