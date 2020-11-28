<?php 

$regId = !empty($gets->id) ? $gets->id : '';

$birth_reg = $ezDb->get_row("SELECT * FROM `birth_registration` WHERE `registration_id`= '$regId' AND `status` = 1");
if (empty($birth_reg)) {
//    redirect('registered-all');
}

$smarty->assign('birth_reg', $birth_reg);