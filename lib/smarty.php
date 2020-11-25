<?php
global $libraries, $site, $templateFolder;
$smarty=null;
if ($Tempemmiter!==true) {
	
	$requiredFrom = basename($_SERVER['SCRIPT_FILENAME']);
	require_once ("Smarty/Smarty.class.php");
	$smarty = new Smarty;
	$smarty->left_delimiter = '<!--{';
	$smarty->right_delimiter = '}-->';
	$smarty->setTemplateDir("./$site/templates/$templateFolder/")->setCompileDir('./'.$cacheDir.'/smarty/templates/')->setCacheDir('./'.$cacheDir.'/smarty/')->addPluginsDir("$libraries/smarty/plugins/");
}
