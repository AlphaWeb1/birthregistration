<?php
$regId = !empty($gets->regId) ? $gets->regId : '';


if(!empty($posts->update_status) and $posts->update_status=='update_status' and $sitePage=='search'){
    $fail = '';
    $err = 0;
    $birth_reg = $ezDb->get_row("SELECT * FROM `birth_registration` WHERE `registration_id`= '$posts->registration_id'");
	if( empty($posts->status) || !in_array($posts->status, array("2", "1"))):
		$fail.='<p class="border border-danger p-2">Invalid Confrimation status: Select a valid confirmation status</p>';
		$err++;
	endif;
	if( empty($birth_reg)):
		$fail.='<p class="border border-danger p-2">Invalid Confrimation: Unable to find registration detail</p>';
		$err++;
	endif;
	if( !empty($birth_reg->status) || $birth_reg->status > 0):
		$fail.='<p class="border border-danger p-2">Invalid Confrimation: This registration has already been confirmed</p>';
		$err++;
	endif;
    if ($err == 0) {
        $regId = $posts->registration_id;
        $ezDb->query("UPDATE `birth_registration` SET `status`='$posts->status' WHERE `registration_id`= '$posts->registration_id'");
        
        $fail='<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
        <p>Registrtion detail successfully confirmed as '.($posts->status == 1 ? 'approved' : 'declined').'.</p>
        </div>';
        // Send Email
    }
}

$birth_reg = $ezDb->get_row("SELECT * FROM `birth_registration` WHERE `registration_id`= '$regId'");

$smarty->assign('birth_reg', $birth_reg)->assign('regId', $regId);