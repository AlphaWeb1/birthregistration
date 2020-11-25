<?php 
	redirect("home");
$whereClause=" AND `status`=1";

$userinfo=$Site['session']['User']['userinfo'];
$fail="";
$err=0;

if ( in_array($sitePage, array("newsletter")) && ($requestMethod == 'GET') && !empty($Site["get"]['event']) && !empty($gets->id)) {
	$newsletter=$ezDb->get_row("SELECT * FROM `newsletter` WHERE `email`='$gets->id';");
	if (!empty($newsletter)){
		$ezDb->query("DELETE FROM `newsletter` WHERE `email`='$gets->id';");
		$fail="<p class='border badge-pill border-success'>Subscriber <b>".testInputReverse($newsletter->email)."</b> was successfully deteted</p>";
		$fail='<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
	}
}

$newsletters=tableRoutine("newsletter", '*' , " `id`!=0 $whereClause", '`id`', 'DESC', '`id`', 10);
if (!empty($newsletters)) {
	if ( in_array($sitePage, array("newsletter")) && ($requestMethod == 'POST') && isset($Site["post"]['newsletter']) ) {
		$posts = (object) $Site["post"];
		$files= (object) $Site["files"];
		// error_log(json_encode($files));
		/*$targetDir="site/media/news/";*/
		$extensions = array("image/jpg","image/png","image/jpe","image/jpeg", "image/jp2", "image/tiff", "image/tiff");
		/*if ( !empty($files->file_upload['tmp_name']) ):
	    	$fail .= '<p class="border badge-pill border-danger">The uploaded .</p>';
	        $err++;
	    endif;*/
		if( empty(trim($posts->title)) ):
			$err++;
			$fail.='<p class="border badge-pill border-danger">Enter news title please!</p>';
		endif;
		if ( !(in_array( $userinfo->userrole, array('level0','level1')) and  $userinfo->active==true)):
			$err++;
			$fail.='<p class="border badge-pill border-danger">You are not authorized to add news!</p>';
		endif;
		if( empty(trim($posts->author))):
			$posts->author="$userinfo->firstname $userinfo->lastname";
		endif;
		if( empty(trim($posts->content)) ):
			$err++;
			$fail.='<p class="border badge-pill border-danger">Enter news detail please!</p>';
		endif;
		if( $err==0 ):
			/*if( !file_exists("$targetDir") ):
		        mkdir("$targetDir", 0777, true);
		    endif;*/
		    // $posts->content=testInputln($posts->content);
		    @unlink($posts->newsletter);
		    $posts->content_stripe=stripeInputReverse($posts->content);
			$posts->content_stripe=str_replace("&quot;", "\"", $posts->content_stripe);
		    /*error_log($posts->content_stripe);
		    error_log(json_encode($posts));
		    error_log(json_encode($files));*/
		    /*$posts->title=testInputln($posts->title);*/
		    require_once 'mail_newsletter.php';
		else:
			$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
		endif;
	}
}

$smarty->assign("newsletters", $newsletters);