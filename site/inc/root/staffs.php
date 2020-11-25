<?php
	redirect("home");
$userinfo=$Site['session']['User']['userinfo'];
if (!in_array($userinfo->userrole, array('level0','level1')) and $userinfo->active==true) {
	redirect("home");
}
redirect("home");
$whereClause="";

$staffs=tableRoutine("userprofile", ' `username`, `email`, `firstname`, `lastname`, `middlename`, `phone`, `usercat`, `userrole`, `dateadded`, `refid`' , " `usertype`='admin' AND (`usercat`='admin' AND `userrole`!='level0') $whereClause", '`id`');

$smarty->assign("staffs", $staffs)->assign("urole", array("level1"=>"Super User", "level2"=>"Operator", "level3"=>"Executives"));