<?php

$default=new stdClass();
$defaults->not['reg']=$ezDb->get_var("SELECT COUNT(`id`) FROM `birth_registration`;");
$defaults->not['approved']=$ezDb->get_var("SELECT COUNT(`id`) FROM `birth_registration` WHERE `status`= 1;");
$defaults->not['rejected']=$ezDb->get_var("SELECT COUNT(`id`) FROM `birth_registration` WHERE `status`= 2;");

$smarty->assign("defaults", $defaults);