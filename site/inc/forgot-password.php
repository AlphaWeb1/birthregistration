<?php global $sitePage, $smarty, $ezDb, $requestMethod, $Site, $siteName, $domainName, $dateNow, $companyName;

$eol = "\r\n";
if ( in_array($sitePage, array("forgot-password")) and ($requestMethod=='POST') ) :
	$err=0;
	$fail='';
    if( empty($posts->dataRecoverEmail) ):
    	$fail.='<p class="border border-danger p-2">The email field cannot be empty!</p>';
    	$err++;
    endif;
    if(  !checkEmail($posts->dataRecoverEmail)):
    	$fail.='<p class="border border-danger p-2">This is not a valid email!</p>';
    	$err++;
    endif;
    if( empty($ezDb->get_var("SELECT `email` FROM `userprofile` WHERE `email`='$posts->dataRecoverEmail'")) ):
    	$fail.='<p class="border border-danger p-2">The email supplied does not exist!</p>';
    	$err++;
    elseif( empty($ezDb->get_var("SELECT `email` FROM `userprofile` WHERE `email`='$posts->dataRecoverEmail' AND `verified`='1'")) ):
    	$fail.='<p class="border border-danger p-2">The email is currently yet to be verified!</p>';
    	$fail.='<p class="border border-danger p-2">The use the link below to request for verification link!</p>';
    	$fail.='<p class="border border-info alert-success p-2"><a href="'.$Site['siteProtocol'].$Site['domainName']."/resend?e=$posts->dataRecoverEmail".'" class="btn btn-link">Get Verification Link</a></p>';
    	$err++;
    endif;
    if( $err == 0 ){
		$recKey="rec-".getToken(20).date('YmdHis');
		$ezDb->query("UPDATE `userprofile` SET `reckey`='$recKey', `recdate`='$dateNow' WHERE `email`='$posts->dataRecoverEmail' AND `verified`='1'");
		require_once 'mail_forgot.php';
		
	}else{
		$fail='<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-warning"></i> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
	}
	$smarty->assign("fail", $fail);
endif;
$smarty->assign("remail", (empty($posts->dataRecoverEmail)?"":$posts->dataRecoverEmail));