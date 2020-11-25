<?php

redirect("home");

if(!empty($gets->k) and empty($ezDb->get_var("SELECT `email` FROM `keys` WHERE `key`='".strtolower(trim($gets->k))."';"))):
	$fail.='<p class="border border-danger p-2">Unable to Verify Key: this verification link does not exist</p>';
	$err++;
endif;

if(empty($gets->k)):
	$fail.='<p class="border border-danger p-2">Unable to Verify Key: No key is was</p>';
	$err++;
endif;
if($err==0 and !empty($email=$ezDb->get_var("SELECT `email` FROM `keys` WHERE `key`='".strtolower(trim($gets->k))."';")) ):
	if($ezDb->get_var("SELECT TIMEDIFF(`expiredon`,'$dateNow') FROM `keys` WHERE `key`='".strtolower(trim($gets->k))."';")>0):
		$fail.='<p class="border border-danger p-2">Unable to Verify Key: this verification link is expired, kindly re-signup or re-register to get another link</p>';
		$err++;
	else:
		$ezDb->query("DELETE FROM `keys` WHERE `email`='".strtolower($email)."';");
		$ezDb->get_row("UPDATE `userprofile` SET `verified`='1' WHERE `email`='$email' AND `usertype`='client';");
		$userLoginDetails=$ezDb->get_row("SELECT `email`, `password` FROM `userprofile` WHERE `email`='$email' AND `usertype`='client' AND `verified`='1';");
		$userLoginDetails->password=base64_decode($userLoginDetails->password);
		$Site["post"]['dataUsername']=$email;
		$Site["post"]['dataPass']=$userLoginDetails->password;
		$myLogin = ( loginUser()==true? true: false);
		if ($myLogin == true):
			$redPage= ( !empty($Site["get"]["e"])? base64_decode($Site["get"]["e"]): "".$Site["session"]['Site']["Page"] );
			redirect($redPage);
		endif;
	endif;
else:
	$fail='<div class="alert alert-danger text-justify">
				<i class="fa fa-warning"></i> <button type="button" class="close d-none" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Error Messages</h3><div class="alert alert-danger alert-dismissible" role="alert"> '.$fail.'</div>
			</div>';
endif;