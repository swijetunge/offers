<?php

class home extends controller
{
	private $username;
	private $password;
	public $provider;
	
	public function __construct() {
		
		$this->renderPage('home');		

	}
}

?>