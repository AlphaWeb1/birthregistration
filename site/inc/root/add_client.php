<?php 

redirect("home");
$userinfo=$Site['session']['User']['userinfo'];
if (!in_array($userinfo->userrole, array('level0','level1')) and $userinfo->active==true) {
	redirect("home");
}
$countries=getCountries();

$fail="";
$err=0;
if ( in_array($sitePage, array("add_client")) && ($requestMethod == 'POST') && isset($Site["post"]['add_client']) ) {
	$posts = (object) $Site["post"];
	$files= (object) $Site["files"];
	// error_log(json_encode($files));
	$targetDir="site/media/userdata/ppics/";
	$extensions = array("image/jpg","image/png","image/jpe","image/jpeg", "image/jp2", "image/tiff", "image/tiff");
	if ( !empty($files->img_upload['tmp_name']) and !in_array(strtolower(getMime($files->img_upload['tmp_name'])), $extensions)):
    	$fail .= '<p class="border border-danger p-1 rounded">The uploaded profile picture is not an image file. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
        $err++;
    endif;
	if( empty($posts->refid) or empty($ezDb->get_var("SELECT `email` FROM `userprofile` WHERE `refid`='".strtolower(trim($posts->refid))."';"))):
		$fail.='<p class="border border-danger p-2">Invalid Referral Code: the referral code does not exist</p>';
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
	if( empty($ezDb->get_var("SELECT `ct`.`name` FROM `states` AS `st`, `cities` AS `ct` WHERE `ct`.`state_id`=`st`.`ID` AND `ct`.`name`='$posts->city' AND `st`.`name`='$posts->state' ") ) ):
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
		$ezDb->query("INSERT INTO `userprofile` (`username`, `firstname`, `middlename`, `lastname`, `address1`, `country`, `gender`, `phone`, `email`, `usertype`, `usercat`, `userrole`, `password`,`userimg`, `verified`, `dateadded`, `addedby`, `terms`, `active`, `referrer`, `refid`) VALUES ('$posts->username', '$posts->firstname', '$posts->othername', '$posts->lastname', '$posts->address', '$posts->country', '$posts->gender', '$posts->phone', '$posts->email', 'client', 'client', 'level1', '".base64_encode($posts->password)."', '$targetFile','1','$dateNow','$userinfo->email', '1', '1', '$posts->refid','$genRefid');");
		$fail='<div class="alert alert-success1 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>Investor detail was successfully added.</p></div>';
	}else{
		$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
	}
}
$genPassword=getToken(8);
$smarty->assign("fail",$fail)->assign("countries", $countries)->assign('genPassword', $genPassword);