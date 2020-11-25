<?php global $sitePage;
$posteds=new stdClass();

require_once "contact_mailer.php";

/*$settings=getSettings();
if (in_array($sitePage, array("default","home")) and empty($user) ) {
	$homePageData=new stdClass();
	$homePageData->newsFeed=$ezDb->get_results("SELECT * FROM `news` WHERE `ctype`='news' ORDER BY `id` DESC LIMIT 5");
	if(!empty($homePageData->newsFeed) and is_array($homePageData->newsFeed)){
		foreach ($homePageData->newsFeed as $value) {
			$value->titleln=testinputReverseln($value->title);
			$value->title=testinputReverseln($value->title);
		}
	}
	$homePageData->promos=$ezDb->get_results("SELECT * FROM `promo` ORDER BY `id` DESC LIMIT 5");
	if (!empty($homePageData->promos)) {
		foreach ($homePageData->promos as $value) {
			$value->companyln=testinputReverseln($value->company);
			$value->company=testinputReverseln($value->company);
			$value->descriptionln=testinputReverseln($value->description);
			$value->description=testinputReverse($value->description);
		}
	}
	$homePageData->ads=$ezDb->get_results("SELECT * FROM `ads` ORDER BY `id` DESC LIMIT 9");
	if (!empty($homePageData->ads)) {
		foreach ($homePageData->ads as $ad) {
			$ad->images=@json_decode($ad->images);
			$ad->client_detail=@json_decode($ad->client_detail);
			$ad->description2=testInputReverseln(trim($ad->description));
			$ad->otherdetails2=testInputReverseln(trim($ad->otherdetails));
			$ad->description=testInputReverse(trim($ad->description));
			$ad->otherdetails=testInputReverse(trim($ad->otherdetails));
		}
	}
	$homePageData->jobs=$ezDb->get_results("SELECT * FROM `jobs` WHERE `open`=1 ORDER BY `id` DESC LIMIT 5");
	if(!empty($homePageData->jobs) and is_array($homePageData->jobs)){
		foreach ($homePageData->jobs as $value) {
			$value->applicantDetails=$ezDb->get_results("SELECT `comment`, `userdetails`, `email` FROM `applicants` WHERE `token`='$value->token'");
			$value->expirydate=date('Y-m-d', strtotime($value->expirydate));
			$value->description1=testInputReverseln($value->description);
			$value->description=testInputReverse($value->description);
			$value->role1=testInputReverseLn($value->role);
			$value->role=testInputReverse($value->role);
			$value->location1=testInputReverseln($value->location);
			$value->location=testInputReverse($value->location);
			$value->jobtitle1=testInputReverseln($value->jobtitle);
			$value->jobtitle=testInputReverse($value->jobtitle);
			$value->category1=testInputReverseln($value->category);
			$value->category=testInputReverse($value->category);
			$value->company1=testInputReverseln($value->company);
			$value->company=testInputReverse($value->company);
		}
	}
	$usedTags=$ezDb->get_col("SELECT DISTINCT `tagnumber` FROM `parkspaces`;");
	$usedTags=(is_array($usedTags)? $usedTags: array());
	$availableTags=$settings->parkspace->total - count($usedTags);

	$smarty->assign("availableTags", $availableTags)->assign("usedTags", $usedTags)->assign("homePageData", $homePageData);
	require_once "sitemap_classic.php";
}

$smarty->assign("settings", $settings);*/


$smarty->assign("posts", $posts)->assign("fail", $fail);