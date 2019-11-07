<?php

if (isset($_POST['submit'])) {

	include_once ('db.php');
	include_once ('manageusers.php');
	$users = new ManageUsers();

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	// $checkbox = $_POST['checkbox'];
	$address = $_SERVER['REMOTE_ADDR'];
	$reg_date = date("Y-m-d");
	$reg_time = date("H:i:s");


	$file = rand(1000,100000)."-".$_FILES['file']['name'];
   	$file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="image/";

	/* new file size in KB */
	$new_size = $file_size/1024;  
	/* new file size in KB */

	/* make file name in lower case */
	$new_file_name = strtolower($file);
	/* make file name in lower case */

	$final_file=str_replace(' ','-',$new_file_name);




	if (empty($username) || empty($first_name) || empty($last_name) || empty($email) || empty($file) || empty($password) || empty($role) || empty($pwd) || empty($address) || empty($reg_date) || empty($reg_time))
	 {
		echo "".$conn->error;
	 }
	elseif ($password <> $pwd)
	 {
		header("Location:../register.php?Password");
		exit();
	 }
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
	{
		header("Location:../register.php?Email");
		exit();
	}
	else
	{   $password = md5($password);
		$check_availability = $users ->GetUserInfo($username);
		if ($check_availability == 0) {
			
			$register_user = $users ->registerUsers($username,$first_name,$last_name,$email,$password,$role,$address,$reg_date,$reg_time,$final_file,$file_type,$new_size);
			move_uploaded_file($file_loc,$folder.$final_file);
			if ($register_user == 1)
			 {
				$make_session = $users ->  GetUserInfo($username);

		foreach ($make_session as $UserSession) {
			
			$_SESSION['system'] = $UserSession['username'];

			if ($_SESSION['system']) {
				
				header("Location:../login.php");
			}
		}
			}
		}
		else{
			header("Location:../register.php?Failed");
		exit();
		}

	}


}

// Register Users
if (isset($_POST['login'])) {

	session_start();

	include_once ('manageusers.php');
	$users = new ManageUsers(); 
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) || empty($password))
	 {
		header("Location:../login.php");
		exit();
	}
	else
	{

	$login_users = new ManageUsers();
	$auth_user = $login_users -> LoginUsers($username,$password);

	if ($auth_user == 1) {

		$make_session = $login_users ->  GetUserInfo($username);

		foreach ($make_session as $UserSession) {
			
			$_SESSION['system'] = $UserSession['username'];

			if ($_SESSION['system']) {
				
				header("Location:../index.php");
			}
		}
		
	}
	else
	{
		header("Location:../login.php?Invalid_Credentials");
		exit();
	}
	}
}

?>