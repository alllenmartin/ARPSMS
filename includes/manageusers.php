<?php

include_once ('db.php');


class ManageUsers{
	public $link;
  
	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}

	function registerUsers($username,$first_name,$last_name,$email,$password,$role,$address,$reg_date,$reg_time,$file,$type,$size){

		
			

		  $query = $this->link->prepare("INSERT INTO register_db (username,first_name,last_name,email,password,role,address,reg_date,reg_time,file,type,size) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
			$values = array($username,$first_name,$last_name,$email,$password,$role,$address,$reg_date,$reg_time,$file,$type,$size);
			$query->execute($values); 
			$counts= $query->rowCount();
			return $counts;



	}
 
	function LoginUsers($username,$password){
		$hash = md5($password);
		$query=$this->link->query("SELECT * FROM register_db WHERE username = '$username' AND password = '$hash'");
		$rowcount=$query->rowCount();
		return $rowcount;

	}
	function All($username = null){
		$query = $this->link->prepare("SELECT * FROM register_db WHERE username = '$username'");
		$query->execute();
		$rowcount=$query->rowCount();
		return $rowcount;

	}
	function GetUserInfo($username){
		$query= $this->link->query("SELECT * FROM register_db WHERE username = '$username'");
		$rowcount = $query->rowCount();

		if ($rowcount == 1) {
			
			$result = $query->fetchAll();
			return $result;
		}
		else{
			return $rowcount;
		}


	}



}

?>