<?php
error_reporting( E_ALL) ;
ini_set( "display_errors","On") ;
date_default_timezone_set( "Asia/Taipei") ;

session_start();

include_once( "function.php") ;

spl_autoload_extensions('.php');
spl_autoload_register();

define( "DB_HOSTNAME", "127.0.0.1") ;
define( "DB_USERNAME", "root") ;
define( "DB_PASSWORD", "root") ;
define( "DB_DATABASE", "933_sms") ;