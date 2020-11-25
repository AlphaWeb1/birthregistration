<?php
$userinfo=$Site['session']['User']['userinfo'];
redirect("home");

$fail="";
$err=0;
if ( in_array($sitePage, array("subscription")) && ($requestMethod == 'POST') && !empty($posts->pay) && $posts->pay=='paystack' ) {
	$settings=getSettings();
	$dateIntervalStat='';
	if ($settings->subscription->renewal=='weekly') {
		$dateIntervalStat="DATEDIFF('$dateNow',`transdate`)";
	}elseif ($settings->subscription->renewal=='monthly') {
		$dateIntervalStat="TIMESTAMPDIFF(MONTH,`transdate`,'$dateNow')";
	}elseif ($settings->subscription->renewal=='quarterly') {
		$dateIntervalStat="TIMESTAMPDIFF(MONTH,`transdate`,'$dateNow')";
	}elseif ($settings->subscription->renewal=='yearly') {
		$dateIntervalStat="TIMESTAMPDIFF(YEAR,`transdate`,'$dateNow') AS `nofyear`, DATEDIFF('$dateNow',`transdate`)";
	}
	$lastPayment=$ezDb->get_row("SELECT *, $dateIntervalStat AS `expired`, FALSE AS `isExpired` FROM `payments` WHERE `paidby`='$userinfo->email' ORDER BY `id` DESC LIMIT 1");
	if (
		($settings->subscription->renewal=='weekly' && $lastPayment->expired>7) or 
		($settings->subscription->renewal=='monthly' && $lastPayment->expired>0) or 
		($settings->subscription->renewal=='quarterly' && $lastPayment->expired>4) or 
		($settings->subscription->renewal=='yearly' && $lastPayment->expired>=1) or empty($lastPayment)
		){
		$lastPayment=(empty($lastPayment)?new stdClass() :$lastPayment);
		$lastPayment->isExpired=true;
	}
	if ($lastPayment->isExpired==true) {
		$email=$userinfo->email;
		$amount=$settings->subscription->amount-($settings->subscription->amount*($settings->subscription->discount/100));
		$token=getToken(5).$ezDb->get_var("SELECT IFNULL((`id`+1), 1) FROM `payments` ORDER BY `id` DESC LIMIT 1");
		$Site["session"]['subToken']=$token;
		$Site["session"]['amount']=$settings->subscription->amount;
		$Site["session"]['purpose']='subscription';
		$Site["session"]['discount']=$settings->subscription->discount;
		$_SESSION=$Site["session"];
		$sessions= (object)$Site["session"];
		require_once 'paystack_connect.php';
	}else{
		$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
			<p class="border border-danger p-1 rounded">You are on active subscription</p>
		</div>';
	}
}
// $smarty->assign("package", $package);