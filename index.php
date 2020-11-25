<?php
ob_start();
$command = basename(__FILE__);
date_default_timezone_set('Africa/Lagos');

require_once "config.php";
//Load Smarty Function and other Libraries
require_once "$libraries/functions.php";
/*Cache Optimizer*/
require_once "clear_cache.php";
/*Database Requires*/
require_once "$libraries/ezsql/ez_sql_core.php";
require_once "$libraries/ezsql/ez_sql_mysql.php";
require_once "../db_config.php";
/*Email Required*/
require "$libraries/mailer/vendor/autoload.php";
@session_start();

require_once "$libraries/url.php";
require_once "$libraries/smarty.php";
//Load variables in config.php into $Site array
foreach ($myGlobals as $key => $value) {
    $Site["$key"] = $value;
}
// pass super globals to site
$Site["session"]=$_SESSION;
$Site["cookie"]=$_COOKIE;
$Site["post"]=$_POST;
$Site["get"]=$_GET;
$Site["files"]=$_FILES;
$Site["server"]=$_SERVER;
$Site['templateFolder']=$templateFolder;

$err=0;
$fail='';
// convert super globals to objects
$sessions= (object)$Site["session"];
$cookies= (object)$Site["cookie"];
$posts= (object)$Site["post"];
$gets= (object)$Site["get"];
$files=(object)$Site["files"];
$servers=(object)$Site["server"];
$message=new stdClass();
routineCode();

if( file_exists("$site/$inc/$sitePage.php") ){
	require_once "$site/$inc/$sitePage.php";
}

//Require Default Logic
require_once "$site/$include/default.php";
// strictly for authentication
require_once "$libraries/authenticate.php";
// $smarty->debugging = true;//debug
if ($Tempemmiter!==true) {
	$smarty->caching = false;
	$smarty->assign('Site', $Site)->assign('sitePage', $sitePage)->assign("thisURL",$thisURL);
	$siteData= $sitePage;
}

//Display Page template
$returnData = $siteData;
emmitData($returnData);
exit;