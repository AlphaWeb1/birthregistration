<?php
$userinfo=$Site['session']['User']['userinfo'];
$whereClause="AND `store_owner`='$userinfo->email' ";

$stores=tableRoutine("stores", '*' , " `id`!=0 $whereClause ", '`id`', 'DESC', '`id`', '15');
if (!empty($stores)) {
	foreach ($stores as $key => $store) {
		$store->images=@json_decode($store->images);
		$store->owner_detail=@json_decode($store->owner_detail);
		$store->description2=testInputReverseln(trim($store->description));
		$store->otherdetails2=testInputReverseln(trim($store->otherdetails));
		$store->description=testInputReverse(trim($store->description));
		$store->otherdetails=testInputReverse(trim($store->otherdetails));
		
		$store->rate=$ezDb->get_var("SELECT SUM(`rating`)/COUNT(`rating`) FROM `rating` WHERE `token`='$store->token' AND `type`='store'");
		$store->rate=(empty($store->rate)? 0: $store->rate);
		$store->rateCeil=(count(explode(".", $store->rate))>1.0? explode(".", $store->rate)[0]: $store->rate);
		$store->rateFloor=(round(explode(".", $store->rate))>=1? 1 :0);
		$store->rateRem=5-$store->rateCeil;
		$store->rateDetails=$ezDb->get_results("SELECT `comment`, `email` FROM `rating` WHERE `token`='$store->token' AND `type`='store' AND `comment`!=''");
	}
}
/*Do foreach and get its list of packages it belong*/
$smarty->assign("stores", $stores);