<?php
$staff_email=(!empty($gets->id)? $gets->id: "");
$userinfo=$Site['session']['User']['userinfo'];
if (!in_array($userinfo->userrole, array('level0','level1')) and $userinfo->active==true) {
	redirect("home");
}
$countries=getCountries();
$staff=$ezDb->get_row("SELECT * FROM `userprofile` WHERE `email`='$staff_email' AND `userrole` IN('level1','level2','level3');");

if (!empty($staff)) {
	$fail="";
	$err=0;
	/*Updating of staff*/
	if ( in_array($sitePage, array("edit_staff")) && ($requestMethod == 'POST') && isset($Site["post"]['edit_staff']) ) {
		$posts = (object) $Site["post"];
		$files= (object) $Site["files"];
		// error_log(json_encode($files));
		$targetDir="site/media/userdata/ppics/";
		$extensions = array("image/jpg","image/png","image/jpe","image/jpeg", "image/jp2", "image/tiff", "image/tiff");
		if ( !empty($files->img_upload['tmp_name']) and !in_array(strtolower(getMime($files->img_upload['tmp_name'])), $extensions)):
	    	$fail .= '<p class="border border-danger p-1 rounded">The uploaded profile picture is not an image file. Only JPG, JPEG, JP2, TIFF, PNG or JPE files is allowed.</p>';
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
		if( !empty($ezDb->get_var("SELECT `email` FROM `userprofile` WHERE `email`='$posts->email' AND `email`!='$staff_email'") ) ):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">There is a user with the supplied email kindly change it!</p>';
		endif;
		if( !empty($ezDb->get_var("SELECT `username` FROM `userprofile` WHERE `username`='$posts->username' AND `email`!='$staff_email'") ) ):
			$err++;
			$token=getToken(3).date("Y").$ezDb->get_var("SELECT COUNT(`id`)+1 FROM `userprofile`;");
			$fail.='<p class="border border-danger p-1 rounded">There is a user with the supplied username kindly change it!, You can use this suggested username: `'.$token.'`</p>';
		endif;
		/*if( empty($posts->refid) or empty($ezDb->get_var("SELECT `email` FROM `userprofile` WHERE `refid`='".strtolower(trim($posts->refid))."' AND `verified`='1' AND `usertype`='admin' AND `userrole` IN('level1', 'level0', 'level3');"))):
			$fail.='<p class="border border-danger p-1">Invalid Referral Code: the referral code does not exist</p>';
			$err++;
		endif;*/
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
			$fail.='<p class="border border-danger p-1 rounded">Choose a valid staff\'s Dashboard Role!</p>';
		endif;
		//$specialChars = preg_match('@[^\w]@', $password);
		if( !empty($posts->password) and ( strlen($posts->password) < 8 or !preg_match('@[A-Z]@', $posts->password)  or !preg_match('@[0-9]@', $posts->password) or !preg_match('@[a-z]@',$posts->password) ) ):
			$fail.='<p class="border border-danger p-1 rounded">Invalid Password: password should be at least 8 characters in length and should include at least one upper case letter, one number, and one lowercase letter</p>';
			$err++;
		endif;
		if ($err==0) {
			if ( !file_exists("$targetDir") ) :
		        mkdir("$targetDir", 0777, true);
		    endif;
		    $targetFile = $targetDir . $posts->email."_profile.png";
		    if (!empty($files->img_upload['tmp_name']) and file_exists($staff->userimg)) :
		    	@unlink($staff->userimg);
		    endif;
			if ( !empty($files->img_upload['tmp_name']) and @move_uploaded_file($files->img_upload['tmp_name'], $targetFile) ) :
			else:
				$targetFile=$staff->userimg;
			endif;
			if(empty($staff->refid) and in_array($staff->userrole, array("level1","level3"))):
				$staff->refid=getToken(8).$ezDb->get_var("SELECT IFNULL((`id`+1),'1') FROM `userprofile` ORDER BY `id` DESC LIMIT 1;");
			endif;
			$ezDb->query("UPDATE `userprofile` SET `username`='$posts->username', `firstname`='$posts->firstname', `middlename`='$posts->othername', `lastname`='$posts->lastname', `gender`='$posts->gender', `phone`='$posts->phone', `address1`='$posts->address', `country`='$posts->country', `usertype`='admin', `userimg`='$targetFile', `active`='$posts->active', `refid`='$staff->refid', `password`='".base64_encode($posts->password)."' WHERE `email`='$staff_email';");
			$staff=$ezDb->get_row("SELECT * FROM `userprofile` WHERE `email`='$staff_email' AND `userrole` IN('level1','level2');");
			$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>staff detail was successfully updated.</p></div>';
		}else{
			$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
		}
	}

	/*Deleting of staff*/
	if ( in_array($sitePage, array("edit_staff")) && ($requestMethod == 'POST') && isset($Site["post"]['delete_staff']) ) {
		if ($err==0) {
			if (file_exists($staff->userimg)):
		    	unlink($staff->userimg);
		    	$staff->userimg="";
			endif;
			$ezDb->query("DELETE FROM `userprofile` WHERE `email`='$staff_email' AND `userrole` IN('level1','level2');");

			$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>staff detail was successfully deleted from the system.</p></div>';
		}
	}
	$staff->password=base64_decode($staff->password);

}else{
	redirect("staffs");
}
$referrers=$ezDb->get_results("SELECT CONCAT(`firstname`, ' ', `lastname`) AS `names`, `email`, `refid` FROM `userprofile` WHERE `verified`='1' AND `usertype`='admin' AND `userrole` IN('level1', 'level3');");
$smarty->assign("fail", $fail)->assign("countries", $countries)->assign("staff", $staff)->assign("referrers", $referrers)->assign("urole", array("level1"=>"Super User","level2"=>"Operator", "level3"=>"Executive"));