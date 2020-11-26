<?php global $sitePage, $Site, $ezDb, $siteName, $smarty;
$userinfo=$Site['session']['User']['userinfo'];
$summary=new stdClass();
$summary->birth_reg_all=$ezDb->get_var("SELECT COUNT(`id`) FROM `birth_registration`;");
$summary->birth_reg_new=$ezDb->get_var("SELECT COUNT(`id`) FROM `birth_registration` WHERE `status`= 0;");
$summary->birth_reg_approved=$ezDb->get_var("SELECT COUNT(`id`) FROM `birth_registration` WHERE `status`= 1;");
$summary->birth_reg_rejected=$ezDb->get_var("SELECT COUNT(`id`) FROM `birth_registration` WHERE `status`= 2;");
$summary->faq=$ezDb->get_var("SELECT COUNT(`id`) FROM `faqs` WHERE `active`= 1;");

$smarty->assign("summary", $summary);