<?php
 
class databaseMySql extends PDO
{
	public function __construct(){
	
		try {
	           parent::__construct('mysql:host=localhost;dbname=', 'root', '');
			   $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			   
	    } catch(PDOException $e) {
	    	
	            echo '<pre>Exception:' . $e->getMessage().'</pre>';           
	            die("<pre>There has been an error. Please contact your system administrator.</pre>");
	    }
	}
}
 
?>