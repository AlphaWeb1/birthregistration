<?php 
	redirect("home");
$whereClause='';
$gets->id=(!empty($gets->id) and in_array($gets->id, array("paid", "unpaid")))? $gets->id: 'all';
$clients=tableRoutine("userprofile", '*' , " `usertype`='client' $whereClause", '`id`', 'DESC', '`id`', 9);
if (!empty($clients)) {
	foreach ($clients as $key => $client) {
		$client->stores=$ezDb->get_results("SELECT * FROM `stores` WHERE `store_owner`='$client->email'");
		$client->transactions=$ezDb->get_row("SELECT COUNT(`transid`) AS `total`, SUM(`amount`) AS `amount` FROM `payments` WHERE `paidby`='$client->email' AND `status`='1'");
		$client->otherPayments=$ezDb->get_results("SELECT * FROM `extrapayments` WHERE `clients` LIKE'%$client->email%';");
		$client->expiredPay=array();
		if (!empty($client->otherPayments)) {
			foreach ($client->otherPayments as $ke => $otherPayment) {
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
				$otherPayment->lastPayment=$ezDb->get_row("SELECT *, $dateIntervalStat1 AS `expired`, FALSE AS `isExpired` FROM `payments` WHERE `purpose`='$otherPayment->pslug' AND `token` LIKE '%$otherPayment->token-%' AND `paidby`='$client->email' ORDER BY `id` DESC LIMIT 1");
				if (
					($otherPayment->renewal=='once' && $otherPayment->lastPayment->expired<1) or 
					($otherPayment->renewal=='weekly' && $otherPayment->lastPayment->expired>7) or 
					($otherPayment->renewal=='monthly' && $otherPayment->lastPayment->expired>0) or 
					($otherPayment->renewal=='quarterly' && $otherPayment->lastPayment->expired>4) or 
					($otherPayment->renewal=='yearly' && $otherPayment->lastPayment->expired>=1) or empty($otherPayment->lastPayment)
					){
					$otherPayment->lastPayment=(empty($otherPayment->lastPayment) ?new stdClass() :$otherPayment->lastPayment);
					$otherPayment->lastPayment->isExpired=true;
					array_push($client->expiredPay, $otherPayment->token);
				}

			}
			// error_log(json_encode($otherPayments));
		}
		if($gets->id=='unpaid' and count($client->expiredPay)==0){
			unset($clients[$key]);
		}elseif($gets->id=='paid' and count($client->expiredPay)>0){
			unset($clients[$key]);
		}
	}
}
$smarty->assign("clients", $clients);

