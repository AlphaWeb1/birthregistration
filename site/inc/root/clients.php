<?php
$whereClause="";

$fail="";
$err=0;
redirect("home");
if ( in_array($sitePage, array("clients")) && ($requestMethod == 'GET') && !empty($gets->evt)  && !empty($gets->id) ) {
	$Client=$ezDb->get_row("SELECT * FROM `userprofile` WHERE `email`='$gets->id'");
	if( !empty($Client) and in_array($gets->evt, array('activate', 'block', 'delete')) ){
		$evtMsg=($gets->evt=='activate'?'activated': ($gets->evt=='block'?'blocked':'deleted'));
		if($gets->evt=='activate' and $Client->active=='1'):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">This investor had already been activated click Investors in the menu to refresh</p>';
		endif;
		if($gets->evt=='block' and $Client->active=='0'):
			$err++;
			$fail.='<p class="border border-danger p-1 rounded">This intestor had already been blocked click Investors in the menu to refresh</p>';
		endif;
		if($err==0):
			$sqlQ="";
			if($gets->evt=='activate'):
				$sqlQ="UPDATE `userprofile` SET `active`='1' WHERE `email`='$gets->id'";
			elseif($gets->evt=='block'):
				$sqlQ="UPDATE `userprofile` SET `active`='0' WHERE `email`='$gets->id'";
			elseif($gets->evt=='delete'):
				$sqlQ="DELETE FROM `userprofile` WHERE `email`='$gets->id'";
				if (file_exists($Client->userimg)) :
					@unlink($Client->userimg);
				endif;
			endif;
			$ezDb->query($sqlQ);
			$fail='<div class="alert alert-success1 alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p class="border border-success p-1 rounded">Investor was successfully '.$evtMsg.'.</p></div>';
		else:
			$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
		endif;
	}
}

$clients=tableRoutine("userprofile", '*' , " `usertype`='client' $whereClause", '`id`', 'DESC', '`id`', 9);
if (!empty($clients)) {
	foreach ($clients as $key => $client) {
		$client->stores=$ezDb->get_var("SELECT COUNT(`token`) FROM `stores` WHERE `store_owner`='$client->email'");
	}
}
$smarty->assign("clients", $clients);
