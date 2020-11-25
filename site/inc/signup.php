<?php global $sitePage;
redirect("home");
$refid=(empty($gets->id)?"":$gets->id);
/*if (!empty($gets->email)):
	$smarty->assign('email', $gets->email);
endif;*/
if (!empty($refid) and !empty($ezDb->get_var("SELECT `refid` FROM `userprofile` WHERE `refid`='$refid';"))):
	$Site["session"]["refid"]=$refid;
	$sessions= (object)$Site["session"];
	$_SESSION=$Site["session"];
endif;

$countries=getCountries();
if(!empty($posts->signup) and $posts->signup=='signup' and $sitePage=='signup'):
	if( empty($posts->terms) or $posts->terms!='1'):
		$fail.='<p class="border border-danger p-2">Terms Is Required: you have to agree with website operative terms & policy</p>';
		$err++;
	endif;
	if( empty($posts->firstName) ):
		$fail.='<p class="border border-danger p-2">Invalid First Name: first name is not entered</p>';
		$err++;
	endif;
	if( empty($posts->lastName) ):
		$fail.='<p class="border border-danger p-2">Invalid Last Name: last name is not entered</p>';
		$err++;
	endif;
	if( empty($posts->address) ):
		$fail.='<p class="border border-danger p-2">Invalid Address: address is not entered</p>';
		$err++;
	endif;
	if( empty($posts->email) or !checkEmail($posts->email)):
		$fail.='<p class="border border-danger p-2">Invalid Email: not a valid email</p>';
		$err++;
	endif;
	if( !empty($posts->email) and strpos(strtolower($posts->email), $domainName)>-1):
		$fail.='<p class="border border-danger p-2">Invalid Email: this kind of email is not allowed</p>';
		$err++;
	endif;
	if( !empty($posts->email) and !empty($uName=$ezDb->get_var("SELECT `username` FROM `userprofile` WHERE `email`='".strtolower(trim($posts->email))."';"))):
		$fail.='<p class="border border-danger p-2">Invalid Email: there is an account with this email, kindly reqest for a password reset if you owns the email</p>';
		$err++;
	endif;
	if( empty($posts->username)):
		$fail.='<p class="border border-danger p-2">Invalid Username: not a valid username</p>';
		$err++;
	endif;
	if( !empty($posts->username) and !empty($uName=$ezDb->get_var("SELECT `username` FROM `userprofile` WHERE `username`='".strtolower(trim($posts->username))."';"))):
		$genuname="";
		do{
			$genuname=strtolower(ucfirst($posts->firstName)).strtolower($posts->lastName).getNToken(99999);
		}while(!empty($ezDb->get_var("SELECT `username` FROM `userprofile` WHERE `username`='$genuname';")));
		
		$fail.='<p class="border border-danger p-2">Invalid Username: there is an account with this username, you can used this instead <b>'.$genuname.'</b></p>';
		$err++;
	endif;
	if( empty($sessions->refid) or empty($ezDb->get_var("SELECT `email` FROM `userprofile` WHERE `refid`='".strtolower(trim($sessions->refid))."';"))):
		$fail.='<p class="border border-danger p-2">Invalid Referral Code: the referral code does not exist</p>';
		$err++;
	endif;
	/*if( empty($posts->regid) or empty($ezDb->get_var("SELECT `key` FROM `keys` WHERE `key`='".trim(strtolower($posts->regid))."' AND (`email` IS NULL OR `email`='');"))):
		$fail.='<p class="border border-danger p-2">Invalid Registration Code: the registration code is invalid </p>';
		$err++;
	endif;*/
	/*if( empty($posts->userrole) or !array_key_exists($posts->userrole, $Site['userroles'])):
		$fail.='<p class="border border-danger p-2">Invalid Role: select a valid account role</p>';
		$err++;
	endif;*/
	if( empty($posts->password) ):
		$fail.='<p class="border border-danger p-2">Invalid Password: empty password is not allowed</p>';
		$err++;
	endif;
	if( !empty($posts->password) and ( strlen($posts->password) < 8 or !preg_match($passwordAuth['1'], $posts->password)  or !preg_match($passwordAuth['1'], $posts->password) or !preg_match($passwordAuth['2'],$posts->password) ) ):
		$fail.='<p class="border border-danger p-2">Invalid Password: password should be at least 8 characters in length and should include at least one upper case letter, one number</p>';
		$err++;
	endif;
	if( !empty($posts->country) and empty($ezDb->get_var("SELECT `name` FROM `countries` WHERE `name`='$posts->country'"))):
		$fail.='<p class="border border-danger p-2">Invalid Contry: your selected country is invalid</p>';
		$err++;
	endif;

	if($err==0):
		$genRefid=getToken(8).$ezDb->get_var("SELECT IFNULL((`id`+1),'1') FROM `userprofile` ORDER BY `id` DESC LIMIT 1;");
		$ezDb->query("INSERT INTO `userprofile` (`firstname`,`lastname`, `phone`, `address1`, `country`,`email`, `password`, `username`, `terms`, `active`, `dateadded`, `usertype`, `usercat`, `userrole`, `verified`, `referrer`, `refid`) VALUES ('$posts->firstName', '$posts->lastName', '$posts->phone', '$posts->address', '$posts->country', '".strtolower($posts->email)."', '".base64_encode($posts->password)."', '".strtolower($posts->username)."', '$posts->terms', '0', '$dateNow', 'client', 'client', 'level1', '0', '$sessions->refid','$genRefid');");


		$confirmkey=date("YmdHis").getToken('5').$ezDb->get_var("SELECT IF(`id`=NULL,'1',(`id`+1)) FROM `keys` ORDER BY `id` DESC LIMIT 1;");
		if (empty($ezDb->get_var("SELECT `key` FROM `keys` WHERE `email`='".strtolower($posts->email)."'"))) :
			$ezDb->query("INSERT INTO `keys` (`email`, `key`, `expiredon`) VALUES ('".strtolower($posts->email)."', '$confirmkey', DATE_ADD('$dateNow', INTERVAL 2 DAY))");
		else:
			$ezDb->query("UPDATE `keys` SET `key`='$confirmkey', `expiredon`=DATE_ADD('$dateNow', INTERVAL 2 DAY) WHERE `email`='".strtolower($posts->email)."'");
		endif;
		if (!empty($posts->newsletter)) :
			if (!empty($ezDb->get_row("SELECT * FROM `newsletter` WHERE `email`='$posts->email'"))) {
				$ezDb->query("UPDATE `newsletter` SET `status`='$posts->newsletter', `dateupdated`='$dateNow' WHERE `email`='$posts->email'");
			}else{
				$ezDb->query("INSERT INTO `newsletter` (`status`, `dateupdated`, `email`) VALUES ('$posts->newsletter', '$dateNow', '$posts->email');");
			}
		endif;
			
		require_once 'mail_signup.php';
	else:
		$fail='<div class="alert alert-danger text-justify">
					<i class="fa fa-warning"></i> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Error Messages</h3><div class="alert alert-danger alert-dismissible" role="alert"> '.$fail.'</div>
				</div>';
	endif;
endif;
$smarty->assign("countries", $countries);