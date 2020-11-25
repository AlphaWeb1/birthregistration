<?php
	redirect("home");
$userinfo=$Site['session']['User']['userinfo'];
if (!in_array($userinfo->userrole, array('level0','level1')) and $userinfo->active==true) {
	redirect("home");
}
$countries=getCountries();

$fail="";
$err=0;
if ( in_array($sitePage, array("add_staff")) && ($requestMethod == 'POST') && isset($Site["post"]['add_staff']) ) {
	$posts = (object) $Site["post"];
	$files= (object) $Site["files"];
	// error_log(json_encode($files));
	$targetDir="site/media/userdata/ppics/";
	$extensions = array("image/jpg","image/png","image/jpe","image/jpeg", "image/jp2", "image/tiff", "image/tiff");
	if ( !empty($files->img_upload['tmp_name']) and !in_array(strtolower(getMime($files->img_upload['tmp_name'])), $extensions)):
    	$fail .= '<p class="border border-danger p-1 rounded">The uploaded profile picture is not an image file. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
        $err++;
    endif;
	if( empty($posts->refid) ):
		$posts->refid=$ezDb->get_var("SELECT `refid` FROM `userprofile` WHERE `verified`='1' AND `usertype`='admin' AND `userrole` IN('level0') AND `username`='admin0';");
	endif;
	if( empty($posts->refid) or empty($ezDb->get_var("SELECT `email` FROM `userprofile` WHERE `refid`='".strtolower(trim($posts->refid))."' AND `verified`='1' AND `usertype`='admin' AND `userrole` IN('level1', 'level0', 'level3');"))):
		$fail.='<p class="border border-danger p-1">Invalid Referral Code: the referral code does not exist</p>';
		$err++;
	endif;
	if( empty(trim($posts->firstname)) ):
		$err++;
		$fail.='<p class="border border-danger p-1 rounded">Enter first name please!</p>';
	endif;
	if( empty(trim($posts->username)) ):
		$err++;
		$fail.='<p class="border border-danger p-1 rounded">Enter username please!</p>';
	endif;
	if( empty(trim($posts->email)) ):
		$err++;
		$fail.='<p class="border border-danger p-1 rounded">Enter email please!</p>';
	endif;
	if( !empty($ezDb->get_var("SELECT `email` FROM `userprofile` WHERE `email`='$posts->email'") ) ):
		$err++;
		$fail.='<p class="border border-danger p-1 rounded">There is a user with the supplied email kindly change it!</p>';
	endif;
	if( !empty($ezDb->get_var("SELECT `username` FROM `userprofile` WHERE `username`='$posts->username'") ) ):
		$err++;
		$token=getToken(3).date("Y").$ezDb->get_var("SELECT COUNT(`id`)+1 FROM `userprofile`;");
		$fail.='<p class="border border-danger p-1 rounded">There is a user with the supplied username kindly change it!, You can use this suggested username: `'.$token.'`</p>';
	endif;
	if( empty(trim($posts->lastname)) ):
		$err++;
		$fail.='<p class="border border-danger p-1 rounded">Enter last name please!</p>';
	endif;
	if( empty(trim($posts->gender)) or !in_array($posts->gender, array("male","female")) ):
		$err++;
		$fail.='<p class="border border-danger p-1 rounded">Choose a valid gender!</p>';
	endif;
	if( !isset($posts->active) or !in_array($posts->active, array("0","1")) ):
		$err++;
		$fail.='<p class="border border-danger p-1 rounded">Choose a ability to operate on dashbaord!</p>';
	endif;
	if( empty(trim($posts->userrole)) or !in_array($posts->userrole, array("level1", "level2", "level3")) ):
		$err++;
		$fail.='<p class="border border-danger p-1 rounded">Choose a valid Official\'s Dashboard Role!</p>';
	endif;
	if( empty($posts->password) ):
		$fail.='<p class="border border-danger p-1 rounded">Invalid Password: empty password is not allowed</p>';
		$err++;
	endif;
	//$specialChars = preg_match('@[^\w]@', $password);
	if( !empty($posts->password) and ( strlen($posts->password) < 8 or !preg_match('@[A-Z]@', $posts->password)  or !preg_match('@[0-9]@', $posts->password) or !preg_match('@[a-z]@',$posts->password) ) ):
		$fail.='<p class="border border-danger p-1 rounded">Invalid Password: password should be at least 8 characters in length and should include at least one upper case letter, one number, and one lowercase letter</p>';
		$err++;
	endif;
	/*error_log("$posts->state $posts->city");
	if( empty($ezDb->get_var("SELECT `ct`.`name` FROM `states` AS `st`, `lawcon_city` AS `ct` WHERE `ct`.`state_id`=`st`.`ID` AND `ct`.`name`='$posts->city' AND `st`.`name`='$posts->state' ") ) ):
		$err++;
		$fail.='<p>Select a valid city please!</p>';
	endif;*/
	if ($err==0) {
		if ( !file_exists("$targetDir") ) :
	        mkdir("$targetDir", 0777, true);
	    endif;
	    $targetFile = $targetDir . $posts->email."_profile.png";
		if ( !empty($files->img_upload['tmp_name']) and @move_uploaded_file($files->img_upload['tmp_name'], $targetFile) ) :
		else:
			$targetFile="";
		endif;
		$genRefid=getToken(8).$ezDb->get_var("SELECT IFNULL((`id`+1),'1') FROM `userprofile` ORDER BY `id` DESC LIMIT 1;");
		if( in_array($posts->userrole, array("level2")) ):
			$getRefid="";
			$posts->refid="";
		endif;
		$ezDb->query("INSERT INTO `userprofile` (`token`,`username`, `firstname`, `middlename`, `lastname`, `gender`, `phone`, `address1`, `country`, `email`, `usertype`, `usercat`, `userrole`, `password`,`userimg`, `verified`, `active`, `dateadded`, `addedby`, `referrer`, `refid`) VALUES ('','$posts->username', '$posts->firstname', '$posts->othername', '$posts->lastname', '$posts->gender', '$posts->phone', '$posts->address', '$posts->country', '$posts->email', 'admin', 'admin', '$posts->userrole', '".base64_encode($posts->password)."', '$targetFile','1','$posts->active','$dateNow','$userinfo->email', '$posts->refid','$genRefid');");
		$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>Staff detail was successfully added.</p></div>';
	}else{
		$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
	}
}
$referrers=$ezDb->get_results("SELECT CONCAT(`firstname`, ' ', `lastname`) AS `names`, `email`, `refid` FROM `userprofile` WHERE `verified`='1' AND `usertype`='admin' AND `userrole` IN('level1', 'level3');");
$genPassword=getToken(8);
$smarty->assign("fail",$fail)->assign("countries", $countries)->assign("referrers", $referrers)->assign('genPassword', $genPassword);