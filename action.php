<?php

include_once( "include/config.php") ;

$sql = new Controller\Mysqli( DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) ;
$drawlots = new Controller\DrawLots() ;

if ( isset( $_POST['input_draw'])) {
	
	$drawlots->action() ;
} else if ( isset( $_POST['input_clear'])) {
	
	$drawlots->clearSession() ;
	$drawlots->present() ;
} else if ( isset( $_POST['giftNumber'])) {
	
	$drawlots->giftWinner() ;
	$drawlots->present() ;
} else if ( isset( $_POST['input_check'])) {
	
	$drawlots->checkGiftNumber() ;
} else { 
	
	$drawlots->present() ;
}

// $query = $sql->query( "select * from tbl_member limit 1") ;
// pre( $query->row) ;


















