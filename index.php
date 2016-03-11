<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', true);
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/classloader.php');
	
	session_start();
	session_unset();
	$_SESSION = array();
	
	header("Cache-control: private"); //IE 6 Fix
		
	// if (class_exists('home')) { // Check that the class exists before trying to use it
    // $home = new home();
	// }

	$parms = (object) $_GET;

	try {
		$pageclass = (isset($parms->page)?$parms->page:'home');
		$page = new $pageclass((isset($_POST)?(object) $_POST:null));
	} catch (Exception $e) {
	    echo $e->getMessage(), "\n";
	}
	
?>