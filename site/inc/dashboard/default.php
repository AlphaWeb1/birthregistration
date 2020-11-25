<?php

$userinfo=$Site['session']['User']['userinfo'];
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
$lastPayment=$ezDb->get_row("SELECT *, $dateIntervalStat AS `expired`, FALSE AS `isExpired` FROM `payments` WHERE `purpose`='subscription' AND `paidby`='$userinfo->email' ORDER BY `id` DESC LIMIT 1");
if (
	($settings->subscription->renewal=='weekly' && $lastPayment->expired>7) or 
	($settings->subscription->renewal=='monthly' && $lastPayment->expired>0) or 
	($settings->subscription->renewal=='quarterly' && $lastPayment->expired>4) or 
	($settings->subscription->renewal=='yearly' && $lastPayment->expired>=1) or empty($lastPayment)
	){
	$lastPayment=(empty($lastPayment)?new stdClass() :$lastPayment);
	$lastPayment->isExpired=true;
}

$otherPayments=$ezDb->get_results("SELECT * FROM `extrapayments` WHERE `clients` LIKE'%$userinfo->email%';");

if (!empty($otherPayments)) {
	foreach ($otherPayments as $key => $otherPayment) {
		$dateIntervalStat1='';
		if ($otherPayment->renewal=='once') {
			$dateIntervalStat1="COUNT(`transdate`)";
		}elseif ($otherPayment->renewal=='weekly') {
			$dateIntervalStat1="DATEDIFF('$dateNow',`transdate`)";
		}elseif ($otherPayment->renewal=='monthly') {
			$dateIntervalStat1="TIMESTAMPDIFF(MONTH,`transdate`,'$dateNow')";
		}elseif ($otherPayment->renewal=='quarterly') {
			$dateIntervalStat1="TIMESTAMPDIFF(MONTH,`transdate`,'$dateNow')";
		}elseif ($otherPayment->renewal=='yearly') {
			$dateIntervalStat1="TIMESTAMPDIFF(YEAR,`transdate`,'$dateNow') AS `nofyear`, DATEDIFF('$dateNow',`transdate`)";
		}
		$otherPayment->clients=@json_decode($otherPayment->clients);
		$otherPayment->purpose=testInputReverse($otherPayment->purpose);
		$otherPayment->lastPayment=$ezDb->get_row("SELECT *, $dateIntervalStat1 AS `expired`, FALSE AS `isExpired` FROM `payments` WHERE `purpose`='$otherPayment->pslug' AND `token` LIKE '%$otherPayment->token-%' AND `paidby`='$userinfo->email' ORDER BY `id` DESC LIMIT 1");
		// $otherPayment->filter=$dateIntervalStat1;
		if (
			($otherPayment->renewal=='once' && $otherPayment->lastPayment->expired<1) or 
			($otherPayment->renewal=='weekly' && $otherPayment->lastPayment->expired>7) or 
			($otherPayment->renewal=='monthly' && $otherPayment->lastPayment->expired>0) or 
			($otherPayment->renewal=='quarterly' && $otherPayment->lastPayment->expired>4) or 
			($otherPayment->renewal=='yearly' && $otherPayment->lastPayment->expired>=1) or empty($otherPayment->lastPayment)
			){
			$otherPayment->lastPayment=(empty($otherPayment->lastPayment)?new stdClass() :$otherPayment->lastPayment);
			$otherPayment->lastPayment->isExpired=true;
		}

	}
	// error_log(json_encode($otherPayments));
}


$totalStores=$ezDb->get_var("SELECT COUNT(`id`) FROM `stores` WHERE `store_owner`='$userinfo->email'");
$totalTrans=$ezDb->get_var("SELECT COUNT(`transid`) FROM `payments` WHERE `paidby`='$userinfo->email'");
$smarty->assign("settings", $settings)->assign("lastPayment", $lastPayment)->assign("totalStores", $totalStores)->assign("totalTrans", $totalTrans)->assign("otherPayments", $otherPayments);