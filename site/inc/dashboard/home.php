<?php global $sitePage, $Site, $ezDb, $siteName, $smarty;
$userinfo=$Site['session']['User']['userinfo'];
$dashStat=new stdClass();
$dashStat->trans=$ezDb->get_var("SELECT COUNT(`transid`) FROM `payments` WHERE `paidby`='$userinfo->email'");
$dashStat->totalStores=$ezDb->get_var("SELECT COUNT(`id`) FROM `stores` WHERE `store_owner`='$userinfo->email'");
$dashStat->activeStore=$ezDb->get_var("SELECT COUNT(`id`) FROM `stores` WHERE `store_owner`='$userinfo->email' AND `show`='1'");
$dashStat->inactiveStore=$ezDb->get_var("SELECT COUNT(`id`) FROM `stores` WHERE `store_owner`='$userinfo->email' AND `show`='0'");

$smarty->assign("dashStat", $dashStat);
