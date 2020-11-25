<?php 
$whereClause="";

$all_births=tableRoutine("birth_registration", '*' , " $whereClause", '`id`', 'DESC', '`id`', 10);
// if (!empty($all_births)) {
// 	foreach ($all_births as $key => $all_birth) {
// 		$client->stores=$ezDb->get_var("SELECT COUNT(`token`) FROM `stores` WHERE `store_owner`='$client->email'");
// 	}
// }
$smarty->assign("all_births", $all_births);