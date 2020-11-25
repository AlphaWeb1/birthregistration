<?php global $urIs, $Site, $dashboard, $sitePage;

if( !empty($Site["session"]["User"]["client"]["Token"]) and sessionExists($Site["session"]["User"]["client"]["Token"])==true ):
	if( !empty($Site["session"]["User"]["admin"]["Token"]) and sessionExists($Site["session"]["User"]["admin"]["Token"])==true ):
		unset($Site["session"]["User"]);
		unset($Site["session"]['Site']["Page"]);
		$_SESSION=$Site["session"];
		redirect( $Site['siteProtocol'].$Site['domainName']."/login?e=".base64_encode( ("".$Site['siteProtocol'].$Site['domainName']."/".$Site['getURI'])."") );
	endif;
	if( count($urIs)>1 ):
		if($urIs[1]=="logout"):
			$sitePage=$urIs[1];
			redirect("../logout");
		endif;
		$user = $Site["session"]["User"]["Username"];
		$Site["session"]["User"]["userinfo"] = userInfo($user);
		/*Restrict Un authorized Admin*/
		if(!in_array($Site["session"]["User"]["userinfo"]->userrole, array("level0","level1","level2"))):
			unset($Site["session"]["User"]);
			unset($Site["session"]['Site']["Page"]);
			$_SESSION=$Site["session"];
			redirect( $Site['siteProtocol'].$Site['domainName']."/login?e=".base64_encode( ("".$Site['siteProtocol'].$Site['domainName']."/".$Site['getURI'])."") );
		endif;
		$posts= (object)$Site["post"];
		$gets= (object)$Site["get"];
		$servers=(object)$Site["server"];
		$sessions= (object)$Site["session"];
		$files=(object)$Site["files"];
		$err=0;
		$fail='';
		// $Site["session"]['Site']["User"]["userInfo"]->initials= ucfirst( substr($Site["session"]['Site']["User"]["userInfo"]->firstName, 0,1) ) ."". ucfirst( substr($Site["session"]['Site']["User"]["userInfo"]->lastName, 0,1) );
		$smarty->assign("userinfo", $Site["session"]["User"]["userinfo"]);
		$declURLS=new stdClass();
		$declURLS->styles='<!-- Google Fonts -->
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/datatables/css/datatables.min.css" />
			<!-- Bootstrap CSS File -->
			<link href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<!-- Libraries CSS Files -->
			<link href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/font-awesome/css/font-awesome.min.css" rel="stylesheet">
			<link href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/animate/animate.min.css" rel="stylesheet">
			<link href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/ionicons/css/ionicons.min.css" rel="stylesheet">
			<link href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
			<link href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/lightbox/css/lightbox.min.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/css/style.css">';

		$declURLS->scripts='<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/jquery/jquery.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/jquery/jquery-migrate.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/datatables/js/jquery.datatables.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/datatables/js/datatables.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/popper.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/easing/easing.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/mobile-nav/mobile-nav.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/wow/wow.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/waypoints/waypoints.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/counterup/counterup.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/owlcarousel/owl.carousel.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/isotope/isotope.pkgd.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/lightbox/js/lightbox.min.js"></script>
			<!-- Contact Form JavaScript File -->
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/contactform/contactform.js"></script>

			<!-- Template Main Javascript File -->
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/js/main.js"></script>

			<script type="text/javascript" src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/js/script.js"></script>';
		$dashStrPath="";

		$lastPage=$urIs[count($urIs)-1];
		for($i=1; $i < count($urIs); $i++):
			$dashStrPath.=("/".$urIs[$i]);
			if( !empty($urIs) and count($urIs) >= ($i+1) and file_exists(__DIR__."/$dashboard".$dashStrPath.".php") ):
				$sitePage=$urIs[$i];
				require_once "$dashboard/".$dashStrPath.".php";
			endif;
		endfor;
		require_once"$dashboard/default.php";
		$smarty->assign("fail", $fail)->assign("err", $err)->assign("part",(!empty($gets->p)?$gets->p:""))->assign("posts",$posts);
	else:
		redirect("home");
	endif;
else:
	redirect( $Site['siteProtocol'].$Site['domainName']."/login?e=".base64_encode( ("".$Site['siteProtocol'].$Site['domainName']."/".$Site['getURI']) ) );
endif;