<?php

redirect("home");
$userinfo=$Site['session']['User']['userinfo'];
$whereClause="";

$transactions=tableRoutine("payments", '*' , " `id`!=0 $whereClause", '`id`');

/*if (!empty($transactions)) {
	foreach ($transactions as $key => $transaction) {
		
	}
}*/

$smarty->assign("transactions", $transactions);