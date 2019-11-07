<?php

class dbConnection{
	protected  $conn;
	public $servername = 'localhost';
	public $username = 'root';
	public $password = '';
 	public $databasename ='plantation';


	function connect(){
		try {

			$this->conn = new PDO("mysql:host=$this->servername; dbname=$this->databasename;",$this->username,$this->password);
			return $this->conn;

		} catch (OPDException $e) {
			return $e->getMessage();
		}
	}

	function fetchdata()

	{

	 $result=mysqli_query($this->conn,"select * from register_db");
   return $result;
	}
}

?>
