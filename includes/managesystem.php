<?php

include_once ('db.php');


class ManageUsers{
	public $link;

	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}

	function addSupervisor($first_name,$last_name,$dob,$email,$scheme,$date_registered,$role)
	{
		$query = $this->link>prepare("INSERT INTO register_db (first_name,last_name,dob,email,scheme,date_registered,role) VALUES(?,?,?,?,?,?,?)");
		$values = array($first_name,$last_name,$dob,$email,$scheme,$date_registered,$role);
		$query ->execute($values);
		$counts = $query->rowCount();
	}	

	function showFarmers($username){
	$query = $this->link->query("SELECT * FROM farmers WHERE username = '$username'");
	$counts = $query->rowCount();

	if ($counts >= 1) {
		$result = $query->fetchAll();
	}
	else{
		$result = $counts;
	}
	return $result;

}

	

	}
	
