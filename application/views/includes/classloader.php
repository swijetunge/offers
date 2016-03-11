<?php 

	function myAutoloader($class_name) {
		
	    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/application/controllers/' . $class_name . '.php')) {
	        require_once($_SERVER['DOCUMENT_ROOT'].'/application/controllers/' . $class_name . '.php');
	    } else {
	        die('Cant find '.$class_name . '.php');
	    }
	}
	
	spl_autoload_register('myAutoloader');
	
?>