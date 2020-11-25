<?php 

$faqs=$ezDb->get_results("SELECT * FROM `faqs` ORDER BY `id` ASC;");
if(!empty($faqs) and is_array($faqs)){
	foreach ($faqs as $value) {
		$value->question1=testInputReverse(str_replace("<br/>", "\n", $value->question));
		$value->answer1=testInputReverse(str_replace("<br/>", "\n", $value->answer));
	}
}
$smarty->assign("faqs", $faqs);