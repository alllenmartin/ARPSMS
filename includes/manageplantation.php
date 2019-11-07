<?php
include_once 'db.php';

class ManageUsers{
	public $link;

	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}

}


?>