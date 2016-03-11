<?php 

class controller
{
		
	public function __construct() {
		session_start();		
	}
	
	public function renderPage($page) 
	{
		include($_SERVER['DOCUMENT_ROOT'].'/application/views/' .$page. '.php');
	}
		
}

?>
