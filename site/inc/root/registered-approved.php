<?php 
$whereClause=" `status` = 1";

$all_births=tableRoutine("birth_registration", '*' , " $whereClause", '`id`', 'DESC', '`id`', 10);

$smarty->assign("all_births", $all_births);