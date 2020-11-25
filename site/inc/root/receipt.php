<?php 

$id=(!empty($gets->id)? $gets->id: "");
$payment=$ezDb->get_row("SELECT * FROM `payments` WHERE `transid`='$id'");
if (!empty($payment)) {
	
}else{
	redirect("transactions");
}
$smarty->assign("payment", $payment);