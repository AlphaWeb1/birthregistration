<?php 
$userinfo=$Site['session']['User']['userinfo'];
$whereClause="";
/*id	token	store_number	store_title	store_owner	owner_detail	description	otherdetails	addedby	dateadded show	images category*/

$fail="";
$err=0;
if ( in_array($sitePage, array("properties")) && ($requestMethod == 'GET') && !empty($gets->evt)  && !empty($gets->id) ) {
	$Property=$ezDb->get_row("SELECT * FROM `properties` WHERE `token`='$gets->id'");
		$Property->images=@json_decode($Store->images);
		// $Store->owner_detail=@json_decode($Store->owner_detail);
	if( !empty($Property) and in_array($gets->evt, array('show', 'hide', 'delete')) ){
		$evtMsg=($gets->evt=='show'?'showed': ($gets->evt=='hide'?'hidden':'deleted'));
		if($gets->evt=='show' and $Property->show=='1'):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">This property had already been showed click Properties in the menu to refresh</p>';
		endif;
		if($gets->evt=='hide' and $Property->show=='0'):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">This property had already been hidden click Properties in the menu to refresh</p>';
		endif;
		if($err==0):
			$sqlQ="";
			if($gets->evt=='show'):
				$sqlQ="UPDATE `properties` SET `show`='1' WHERE `token`='$gets->id'";
			elseif($gets->evt=='hide'):
				$sqlQ="UPDATE `properties` SET `show`='0' WHERE `token`='$gets->id'";
			elseif($gets->evt=='delete'):
				$sqlQ="DELETE FROM `properties` WHERE `token`='$gets->id'";
				if (!empty($Property->images) and is_array($Property->images)) :
					foreach ($Property->images as $value):
						if (file_exists($value)):
							@unlink($value);
						endif;
					endforeach;
				endif;
			endif;
			$ezDb->query($sqlQ);
			$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p class="border border-success p-1 rounded">Property was successfully '.$evtMsg.'.</p></div>';
		else:
			$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
		endif;
	}
}

$properties=tableRoutine("properties", '*' , " `id`!=0 $whereClause", '`id`', 'DESC', '`id`', 10);
if (!empty($properties)) {
	foreach ($properties as $key => $property) {
		$property->images=@json_decode($property->images);
		// $store->owner_detail=@json_decode($store->owner_detail);
		// $store->profile=$ezDb->get_row("SELECT * FROM `userprofile` WHERE `email`='$store->store_owner';");
		$property->description2=testInputReverseln(trim($property->description));
		$property->otherdetails2=testInputReverseln(trim($property->otherdetails));
		$property->description=testInputReverse(trim($property->description));
		$property->otherdetails=testInputReverse(trim($property->otherdetails));
		
		/*$store->rate=$ezDb->get_var("SELECT SUM(`rating`)/COUNT(`rating`) FROM `rating` WHERE `token`='$store->token' AND `type`='store'");
		$store->rate=(empty($store->rate)? 0: $store->rate);
		$store->rateCeil=(count(explode(".", $store->rate))>1.0? explode(".", $store->rate)[0]: $store->rate);
		$store->rateFloor=(round(explode(".", $store->rate))>=1? 1 :0);
		$store->rateRem=5-$store->rateCeil;
		$store->rateDetails=$ezDb->get_results("SELECT `comment`, `email` FROM `rating` WHERE `token`='$store->token' AND `type`='store' AND `comment`!=''");*/
	}
}
/*Do foreach and get its list of packages it belong*/
$smarty->assign("properties", $properties);