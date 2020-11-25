<?php
redirect("home");
$settings=getSettings();
$userinfo=$Site['session']['User']['userinfo'];
if (!in_array($userinfo->userrole, array('level0','level1')) and $userinfo->active==true) {
	redirect("home");
}

$fail="";
$err=0;
$setting=new stdClass();
if ( in_array($sitePage, array("settings")) && ($requestMethod == 'POST') && isset($Site["post"]['activation']) && $posts->activation=='activation') {
	if( empty(trim($posts->renewal)) or !in_array($posts->renewal, array("once","weekly", "monthly", "quarterly", "yearly"))):
		$err++;
		$fail.='<p>Select a valid renewal period!</p>';
	endif;
	if( empty(trim($posts->amount)) or is_nan($posts->amount) ):
		$err++;
		$fail.='<p>Enter a avalid amount!</p>';
	endif;
	if( empty(trim($posts->time)) or is_nan($posts->time) ):
		$err++;
		$fail.='<p>Enter a avalid amount!</p>';
	endif;
	if( is_nan($posts->discount) or $posts->discount<0 or $posts->discount>100 ):
		$err++;
		$fail.='<p>Enter a valid package discount please!</p>';
	endif;
	if( $err==0 ):
		$setting->renewal=$posts->renewal;
		$setting->discount=$posts->discount;
		$setting->amount=$posts->amount;
		$setting->time=$posts->time;
		$setting->updatedBy=$userinfo->email;
		$setting->dateUpdated=$dateNow;

		$setting=json_encode($setting);
		if (empty($settings)) {
			$ezDb->query("INSERT INTO `settings` (`activation`, `updated`) VALUES ('$setting', '$dateNow')");
		}else{
			$ezDb->query("UPDATE `settings` SET `activation`='$setting'");
		}
		$fail='<div class="alert alert-success1 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>Activation settings was successfully updated.</p></div>';
	else:
		$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
	endif;
}

if ( in_array($sitePage, array("settings")) && ($requestMethod == 'POST') && isset($Site["post"]['working_hour']) && $posts->working_hour=='working_hour') {
	$fail2='';
	$err=0;
	
	if( empty(trim($posts->open_hour)) /*or strtotime($posts->open_hour)*/):
		$err++;
		$fail2.='<p class="border border-danger p-1 rounded">Enter a valid time for HFP Opening Hour!</p>';
	endif;
	if( empty(trim($posts->close_hour)) /*or strtotime($posts->close_hour)*/):
		$err++;
		$fail2.='<p class="border border-danger p-1 rounded">Enter a valid time for HFP Closing Hour!</p>';
	endif;
	if( $err==0 ):
	    $setting->open_hour_string=$posts->open_hour;
	    $setting->open_hour=strtotime($posts->open_hour);
	    $setting->close_hour_string=$posts->close_hour;
	    $setting->close_hour=strtotime($posts->close_hour);
		$setting->updatedBy=$userinfo->email;
		$setting->dateUpdated=$dateNow;

		$setting=json_encode($setting);
		if (empty($settings)) {
			$ezDb->query("INSERT INTO `settings` (`working_hours`, `updated`) VALUES ('$setting', '$dateNow')");
		}else{
			$ezDb->query("UPDATE `settings` SET `working_hours`='$setting'");
		}
		$fail2='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>HFP wroking hour was successfully updated.</p></div>';
	else:
		$fail2='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail2.'</div>';
	endif;
	$smarty->assign("fail2", $fail2);
}

if ( in_array($sitePage, array("settings")) && ($requestMethod == 'POST') && isset($Site["post"]['parkspace']) && $posts->parkspace=='parkspace') {
	$fail3='';
	$err=0;
	
	if( empty(trim($posts->total)) or is_nan($posts->total)/*or strtotime($posts->open_hour)*/):
		$err++;
		$fail3.='<p class="border border-danger p-1 rounded">Enter a valid total parking space!</p>';
	endif;
	if( $err==0 ):
	    $setting->total=$posts->total;
		$setting->updatedBy=$userinfo->email;
		$setting->dateUpdated=$dateNow;

		if (empty($settings)) {
	    	$setting->used=array();
			$setting=json_encode($setting);
			$ezDb->query("INSERT INTO `settings` (`parkspace`, `updated`) VALUES ('$setting', '$dateNow')");
		}else{
	    	$setting->used=((!empty($setting->parkspace->used) and count($setting->parkspace->used)>0)? $setting->parkspace->used:array());
			$setting=json_encode($setting);
			$ezDb->query("UPDATE `settings` SET `parkspace`='$setting'");
		}
		$fail3='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>HFP parkinh space was successfully updated.</p></div>';
	else:
		$fail3='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail3.'</div>';
	endif;
	$smarty->assign("fail3", $fail3);
}

if ( in_array($sitePage, array("settings")) && ($requestMethod == 'POST') && isset($Site["post"]['codegen']) && $posts->codegen=='codegen') {
	redirect("home");
	$fail1='';
	$err=0;
	if( empty(trim($posts->status)) or !in_array($posts->status, array("1", "0"))):
		$err++;
		$fail1.='<p>Select a valid status!</p>';
	endif;
	if( $err==0 ):
		$setting->status=$posts->status;
		$setting->updatedBy=$userinfo->email;
		$setting->dateUpdated=$dateNow;

		$setting=json_encode($setting);
		if (empty($settings)) {
			$ezDb->query("INSERT INTO `settings` (`codegen`, `updated`) VALUES ('$setting', '$dateNow')");
		}else{
			$ezDb->query("UPDATE `settings` SET `codegen`='$setting'");
		}
		$fail1='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>Auto code generation status was successfully updated.</p></div>';
	else:
		$fail1='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail1.'</div>';
	endif;
	$smarty->assign("fail1", $fail1);
}
$settings=getSettings();
$smarty->assign("settings", $settings);