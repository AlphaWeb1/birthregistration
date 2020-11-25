<?php global $sitePage, $Site, $ezDb, $siteName, $smarty;
$userinfo=$Site['session']['User']['userinfo'];
$summary=new stdClass();
$summary->birth_reg_new=$ezDb->get_var("SELECT COUNT(`transid`) FROM `payments`;");
// $dashStat->user=$ezDb->get_var("SELECT COUNT(`email`) FROM `userprofile` WHERE `usertype`='client';");
// $dashStat->stores=$ezDb->get_var("SELECT COUNT(`id`) FROM `stores`;");
// $dashStat->jobs=$ezDb->get_var("SELECT COUNT(`id`) FROM `jobs`;");
// $dashStat->news=$ezDb->get_var("SELECT COUNT(`id`) FROM `news`;");
// $dashStat->properties=$ezDb->get_var("SELECT COUNT(`id`) FROM `properties`;");
// // $dashStat->transMonthly=$ezDb->get_results("SELECT SUM(`amount`) AS `totalAmount`,  DATE_FORMAT(`transdate`, '%b,%y') AS `transmonth` FROM `payments` WHERE TIMESTAMPDIFF(MONTH, `transdate` ,'$dateNow')<6 GROUP BY TIMESTAMPDIFF(MONTH, `transdate` ,'$dateNow');");
// // $dashStat->recordDaily=$ezDb->get_results("SELECT COUNT(`id`) AS `totalRecord`,  DATE_FORMAT(`dateadded`, '%Y-%m-%d') AS `transday` FROM `recordbooks` WHERE DATEDIFF('$dateNow', `dateadded`)<=7 GROUP BY DATEDIFF('$dateNow', `dateadded`);");

// $defaultDetail=new stdClass();
// /*Clients*/
// $defaultDetail->totalCustomers=$ezDb->get_var("SELECT (SELECT COUNT(DISTINCT `email`) FROM `userprofile` WHERE `usertype`='client' AND `verified`=1) + (SELECT COUNT(DISTINCT `paidby`) FROM `payments` WHERE `paidby` NOT IN(SELECT DISTINCT `email` FROM `userprofile` WHERE `usertype`='client' AND `verified`=1))");
// $defaultDetail->activeCustomers=$ezDb->get_var("SELECT COUNT(DISTINCT `paidby`) FROM `payments` WHERE `status`=1;");
// $defaultDetail->inactiveCustomers=$ezDb->get_var("SELECT COUNT(DISTINCT `email`) FROM `userprofile` WHERE `usertype`='client' AND `verified`=1 AND `email` NOT IN(SELECT DISTINCT `paidby` FROM `payments` WHERE `status`=1);");
// $defaultDetail->regProgressW=$ezDb->get_results("SELECT COUNT(DISTINCT `email`) AS `count`, DATE_FORMAT(`dateadded`, '%d, %b, %Y') AS `dateadded` FROM `userprofile` WHERE `usertype`='client' AND `verified`=1 AND DATEDIFF('$dateNow', `dateadded`)<=7 GROUP BY DATEDIFF('$dateNow', `dateadded`) ORDER BY DATEDIFF('$dateNow', `dateadded`) DESC;");
// $defaultDetail->regProgressM=$ezDb->get_results("SELECT COUNT(DISTINCT `email`) AS `count`, DATE_FORMAT(`dateadded`, '%b, %Y') AS `dateadded` FROM `userprofile` WHERE `usertype`='client' AND `verified`=1 GROUP BY DATE_FORMAT(`dateadded`, '%b, %Y') ORDER BY DATE_FORMAT(`dateadded`, '%Y') DESC, DATE_FORMAT(`dateadded`, '%m') DESC LIMIT 12;");
// $defaultDetail->regProgressM=array_reverse($defaultDetail->regProgressM);

// /*Transactions*/
// $defaultDetail->totalTrans=$ezDb->get_row("SELECT IFNULL(SUM(`amount`),0.00)  AS `amount`, IFNULL(COUNT(`transid`),0) AS `count` FROM `payments`;");
// $defaultDetail->totalTransSuccess=$ezDb->get_row("SELECT IFNULL(SUM(`amount`),0.00)  AS `amount`, IFNULL(COUNT(`transid`),0) AS `count` FROM `payments` WHERE `status`=1;");
// $defaultDetail->totalTransFailed=$ezDb->get_row("SELECT IFNULL(SUM(`amount`),0.00) AS `amount`, IFNULL(COUNT(`transid`),0) AS `count` FROM `payments` WHERE `status`=0;");
// $defaultDetail->transProgressW=$ezDb->get_results("SELECT IFNULL(SUM(`amount`),0.00) AS `amount`, IFNULL(COUNT(`transid`),0) AS `count`, DATE_FORMAT(`transdate`, '%d, %b, %Y') AS `dateadded` FROM `payments` WHERE `status`=1 AND DATEDIFF('$dateNow', `transdate`)<=7 GROUP BY DATEDIFF('$dateNow', `transdate`) ORDER BY DATEDIFF('$dateNow', `transdate`) DESC;");
// $defaultDetail->transProgressM=$ezDb->get_results("SELECT IFNULL(SUM(`amount`),0.00)  AS `amount`, IFNULL(COUNT(`transid`),0) AS `count`, DATE_FORMAT(`transdate`, '%b, %Y') AS `dateadded` FROM `payments` WHERE `status`=1 GROUP BY DATE_FORMAT(`transdate`, '%b, %Y') ORDER BY DATE_FORMAT(`transdate`, '%Y') DESC, DATE_FORMAT(`transdate`, '%m') DESC LIMIT 12;");
// $defaultDetail->transProgressM=array_reverse($defaultDetail->transProgressM);
$smarty->assign("summary", $summary);