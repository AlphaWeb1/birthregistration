<?php global $sitePage;
$posteds=new stdClass();

require_once "contact_mailer.php";


if (in_array($sitePage, array("default","home")) and empty($user) ) {

	$summary=new stdClass();
	$summary->birth_reg_all=$ezDb->get_var("SELECT COUNT(`id`) FROM `birth_registration`;");
	$summary->birth_reg_new=$ezDb->get_var("SELECT COUNT(`id`) FROM `birth_registration` WHERE `status`= 0;");
	$summary->birth_reg_approved=$ezDb->get_var("SELECT COUNT(`id`) FROM `birth_registration` WHERE `status`= 1;");
	$summary->birth_reg_rejected=$ezDb->get_var("SELECT COUNT(`id`) FROM `birth_registration` WHERE `status`= 2;");
	$smarty->assign("summary", $summary);
}


$smarty->assign("posts", $posts)->assign("fail", $fail);