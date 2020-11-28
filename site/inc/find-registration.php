<?php
$regId = !empty($gets->regId) ? $gets->regId : '';

$birth_reg = $ezDb->get_row("SELECT * FROM `birth_registration` WHERE `registration_id`= '$regId'");

$smarty->assign('birth_reg', $birth_reg)->assign('regId', $regId);