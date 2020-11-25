<?php 
$userinfo=$Site['session']['User']['userinfo'];
require_once 'paystack_return.php';

$id=(!empty($gets->id)? $gets->id: "");
$payment=$ezDb->get_row("SELECT * FROM `payments` WHERE `transid`='$id' AND `paidby`='$userinfo->email'");
if (empty($payment)) {
	redirect("transactions");
}
$payment->pslug=$payment->purpose;
$payment->purpose=ucwords(str_replace("-", " ", $payment->purpose));
$smarty->assign("payment", $payment);