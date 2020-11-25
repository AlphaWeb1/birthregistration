<?php 
	redirect("home");
$userinfo=$Site['session']['User']['userinfo'];
$whereClause="";
if (!empty($gets->type) and in_array($gets->type, array('hidden', 'showing'))) {
	$whereClause=($gets->type=="hidden"? "AND `show`='0'" :"AND `show`='1'");
}
$fail="";
$err=0;
if ( in_array($sitePage, array("stores")) && ($requestMethod == 'GET') && !empty($gets->evt)  && !empty($gets->id) ) {
	$Store=$ezDb->get_row("SELECT * FROM `stores` WHERE `token`='$gets->id'");
		$Store->images=@json_decode($Store->images);
		$Store->owner_detail=@json_decode($Store->owner_detail);
	if( !empty($Store) and in_array($gets->evt, array('show', 'hide', 'delete')) ){
		$evtMsg=($gets->evt=='show'?'showed': ($gets->evt=='hide'?'hidden':'deleted'));
		if($gets->evt=='show' and $Store->show=='1'):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">This store had already been showed click Stores in the menu to refresh</p>';
		endif;
		if($gets->evt=='hide' and $Store->show=='0'):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">This store had already been hidden click Stores in the menu to refresh</p>';
		endif;
		if($err==0):
			$sqlQ="";
			if($gets->evt=='show'):
				$sqlQ="UPDATE `stores` SET `show`='1' WHERE `token`='$gets->id'";
			elseif($gets->evt=='hide'):
				$sqlQ="UPDATE `stores` SET `show`='0' WHERE `token`='$gets->id'";
			elseif($gets->evt=='delete'):
				$sqlQ="DELETE FROM `stores` WHERE `token`='$gets->id'";
				if (!empty($Store->images) and is_array($Store->images)) :
					foreach ($Store->images as $value):
						if (file_exists($value)):
							@unlink($value);
						endif;
					endforeach;
				endif;
			endif;
			$ezDb->query($sqlQ);
			$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p class="border border-success p-1 rounded">Store was successfully '.$evtMsg.'.</p></div>';
		else:
			$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
		endif;
	}
}

$stores=tableRoutine("stores", '*' , " `id`!=0 $whereClause", '`id`', 'DESC', '`id`', 10);
if (!empty($stores)) {
	foreach ($stores as $key => $store) {
		$store->images=@json_decode($store->images);
		$store->owner_detail=@json_decode($store->owner_detail);
		$store->profile=$ezDb->get_row("SELECT * FROM `userprofile` WHERE `email`='$store->store_owner';");
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