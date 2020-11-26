<?php
global $command;
$theHost = str_replace("www.", "", $_SERVER["HTTP_HOST"]);
$theServer = php_uname('n')."_".$_SERVER['SERVER_ADDR'];
$thisDir = __DIR__;
$scriptBase = $_SERVER['PHP_SELF'];//web name of running script 
$scriptPath = dirname($scriptBase);//web directory of running script
$docRoot = $_SERVER['DOCUMENT_ROOT'];

$protocol="http".((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on')?"s":"")."://";

$myGlobals = array(
    /*Command, Protocol & URL Routing Config*/
    'command'=>$command,
    'theHost'=>$theHost,
    'siteProtocol'=>$protocol,
    'theServer'=>$theServer,
    'thePort'=> $_SERVER['SERVER_PORT'],
    'thisDir'=>$thisDir,
    'thisURL'=>$_SERVER['REQUEST_URI'],
    'scriptBase'=>$scriptBase,
    'libraries'=>'lib',
    'include'=>'inc',
    'getURI' => (isset($_GET['url'])? $_GET['url'] : null),
    'requestMethod'=> $_SERVER['REQUEST_METHOD'],
    'domainName'=>'localhost/birthregistration',
    'companyName'=> 'Birth Registration',
    'companyAbbr'=> 'NBR Cert',
    /*File & Dir Config*/
    'cacheDir'=> 'cache',
    'site'=>'site',
    'media'=>'media',
    'inc'=>'inc',
    'siteName'=>'birthreg',
    'templateFolder'=>'base',
    'dashboard'=>'dashboard',
    'admin'=>'root',
    'baselinePath'=>"/home/schooztc/public_html/birthregistration",
    /*Database config*/
    'dbName'=> 'birthreg',
    'dbHost'=> 'localhost',
    'dbUser'=> 'root',
    'dbPass'=> '',
    'sitePage' => 'home',
    'siteData' => null,
    /*Date & Variable config*/
    'dateNow'=> date("Y-m-d H:i:s"),
    'dateNow2'=> date("Y-m-d"),
    'nextThursday'=> date("Y-m-d H:i:s", strtotime("next thursday")),
    'nextMonday'=> date("Y-m-d H:i:s", strtotime("next monday")),
    'lastThursday'=> date("Y-m-d H:i:s", strtotime("previous thursday")),
    'lastMonday'=> date("Y-m-d H:i:s", strtotime("previous monday")),
    'today'=> date('l'), 
    'emptyArray'=> array(),
    'passwordAuth'=> array('0' => '@[A-Z]@', '1' => '@[0-9]@', '2' => '@[a-z]@', '3' => '@[^\w]@'), 
    /*Template Control*/
    'Tempemmiter'=>false
);
foreach ($myGlobals as $key => $value) {
    $$key = $value;
}


/*System Mail Addres Config*/
$mailConfig->contact["email"]="amajoyeogbe.hofftech@gmail.com";//info@$domainName amajoyeogbe.hofftech@gmail.com
$mailConfig->contact["title"]="Conatct@$companyName";
$mailConfig->contact["subject"]="";
$mailConfig->contact["password"]="";
$mailConfig->newsletter["email"]="amajoyeogbe.hofftech@gmail.com";
$mailConfig->newsletter["title"]="Newsletter@$companyName";
$mailConfig->newsletter["subject"]="$companyName Newsletter Subscription";
$mailConfig->newsletter["password"]="";
$mailConfig->payment["email"]="payments@$domainName";
$mailConfig->payment["title"]="amajoyeogbe.hofftech@gmail.com";
$mailConfig->payment["subject"]="$companyName Payment";
$mailConfig->payment["password"]="";
$mailConfig->auth["email"]="amajoyeogbe.hofftech@gmail.com";
$mailConfig->auth["password"]="AdeRonke4Eva@0";

/*System Payment Key Config*/
$paymentConfig->paystack["test_sk"]="sk_test_89518f69f25f13f55c61d1a9d275c79dfa75fd00";
$paymentConfig->paystack["test_pk"]="pk_test_ce04989d9a3d450412ede3bd8a43be6d530d0e15";
$paymentConfig->paystack["curl"]="https://hfp.ajahcity.com.ng/dashboard/receipt";