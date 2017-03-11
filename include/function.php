<?php
function save_log( $msg, $className="", $fileName="", $logName="") {
	
	$fileDate = date( "Y_md" ) ;
	$logFileName = "log/orderrefund_{$logName}{$fileDate}.log" ;
	$fp = fopen($logFileName , "a" ) ;
	$nowTime = date("Y/m/d H:i:s");
	fwrite($fp,"{$nowTime} | file Name : {$fileName}\r\n") ;
	fwrite($fp,"{$nowTime} | class Name : {$className}\r\n") ;

	if (is_array($msg)) {
	fwrite($fp,"{$nowTime} | ".print_r($msg, true)."\r\n") ;
	// fwrite($fp,print_r($msg, true)."\r\n") ;
	} else {
	fwrite($fp,"{$nowTime} | {$msg}\r\n") ;
	// fwrite($fp,"{$msg}\r\n") ;
	}
	fclose($fp);
}

function pre($val, $className="", $fileName="", $Parameters = "") {
	echo '<pre>';
	echo trim($fileName)	? "file Name : {$fileName}\n"		: "" ;
	echo trim($className)	? "class Name : {$className}\n"		: "" ;
	echo trim($Parameters)	? "Parameters : {$Parameters}\n"	: "" ;
	print_r( $val);
	// var_dump( $val);
	echo '</pre>';
}

function getGUID( $mod = "") {
	if (function_exists('com_create_guid'))  {
		return com_create_guid();
	} else {
		mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		if ( $mod == "") {
			$uuid = chr(123)// "{"
				.substr($charid, 0, 8).$hyphen
				.substr($charid, 8, 4).$hyphen
				.substr($charid,12, 4).$hyphen
				.substr($charid,16, 4).$hyphen
				.substr($charid,20,12)
				.chr(125);// "}" ;
		} else {
			// no Braces
			$uuid = ""
				.substr($charid, 0, 8)
				.substr($charid, 8, 4)
				.substr($charid,12, 4)
				.substr($charid,16, 4)
				.substr($charid,20,12) ;
		}
		// return strtolower( $uuid) ;
		return $uuid ;
	}
}