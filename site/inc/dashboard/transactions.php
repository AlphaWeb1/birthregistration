<?php

$userinfo=$Site['session']['User']['userinfo'];
$whereClause="AND `paidby`='$userinfo->email'";

$transactions=tableRoutine("payments", '*' , " `id`!=0 $whereClause", '`id`');

if (!empty($transactions)) {
	foreach ($transactions as $key => $transaction) {
		$transaction->pslug=$transaction->purpose;
		$transaction->purpose=ucwords(str_replace("-", " ", $transaction->purpose));
	}
}

$smarty->assign("transactions", $transactions);