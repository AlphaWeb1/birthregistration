<?php 

redirect("home");
if ( in_array($sitePage, array("promo")) && ($requestMethod == 'GET') && !empty($Site["get"]['event']) && !empty($gets->id)) {
	$promo=$ezDb->get_row("SELECT * FROM `promo` WHERE `token`='$gets->id';");
	if (!empty($promo)){
		if (file_exists($promo->image) && is_file($promo->image)){
			@unlink($promo->image);
		}
		$ezDb->query("DELETE FROM `promo` WHERE `token`='$gets->id';");
		$fail="<p>Promo <b>".testInputReverse($promo->description)."</b> was successfully deleted</p>";
		$fail='<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
	}
}

/*$contents=str_replace("'", "&apos;", $posts->content);
$contents=str_replace("\"", "&quot;", $contents);*/
$whereClause="";
$promos=tableRoutine("promo", '*' , " `id`!=0 $whereClause", '`id`', 'DESC', '`id`', '8');
if (!empty($promos)) {
	foreach ($promos as $value) {
		$value->companyln=testinputReverseln($value->company);
		$value->company=testinputReverseln($value->company);
		$value->descriptionln=testinputReverseln($value->description);
		$value->description=testinputReverse($value->description);
	}
}

$smarty->assign("promos", $promos);
