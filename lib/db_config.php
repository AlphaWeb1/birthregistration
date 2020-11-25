<?php global $dbUser, $dbPass, $dbName, $dbHost;
ob_start();
@session_start(); //put here so different session folder can be applied

//database connection
define( 'DB_USER', $dbUser );
define( 'DB_PASS', $dbPass );
define( 'DB_NAME', $dbName ); 
define( 'DB_HOST', $dbHost );
define( 'DB_ENCODING','' );

$ezDb = new ezSQL_mysql(DB_USER, DB_PASS, DB_NAME, DB_HOST);