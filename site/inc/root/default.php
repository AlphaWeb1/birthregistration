<?php

$default=new stdClass();
$defaults->not['reg']=0;
$defaults->not['approved']=0;
$defaults->not['rejected']=0;
// $defaults->not['trans']=$ezDb->get_var("SELECT COUNT(`transid`) FROM `payments`;");
$defaults->not['clients']=$ezDb->get_var("SELECT COUNT(`email`) FROM `userprofile` WHERE `usertype`='client';");
// $defaults->not['stores']=$ezDb->get_var("SELECT COUNT(`id`) FROM `stores`;");

$smarty->assign("defaults", $defaults);