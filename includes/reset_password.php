<?php


if (isset($_POST['reset-password'])) {
	
	$selector = $_POST['selector'];
	$validator = $_POST['validator'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];


	if (empty($password) || empty($re_password)) {
		
		header("Location:.../create-new-password.php?newpwd=empty");
		exit();
	}
	elseif ($password <> $re_password) {
		header("Location:.../create-new-password.php?newpwd=doestmatch");
		exit();
	}

	$currentDate = date("U");


	require 'db.php';

	$sql = "SELECT *  password_reset WHERE resetSelector = ? AND resetExpires >= ? ";
	$stmt = mysqli_stmt_init($conn);

	if (!msqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error";
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt,"s",$selector);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		if (!$row = mysqli_fetch_assoc($result)) {
			echo "You need to submit your reset request";
			exit();
		}
		else
		{

			$tokenBin = hex2bin($validator);
			$tokenCheck = password_verify($tokenBin,$row['resetToken']);

			if ($tokenCheck === false) {
				echo "You need to submit your reset request";
				exit();
			}
			elseif ($tokenCheck === true) {
				
				$tokenEmai = $row['resetEmail'];


				$sql = "SELECT * FROM users WHERE email =?;";

	if (!msqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error";
		exit();
	}
	else
	{
	mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
	mysqli_stmt_execute($stmt);	
	
		$result = mysqli_stmt_get_result($stmt);
		if (!$row = mysqli_fetch_assoc($result)) {
			echo "There was an error";
			exit();
		}
		else
		{
			$sql = "UPDATE users SET password WHERE email = ?;";
			if (!msqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error";
		exit();
	}
	else
	{
	$newpwdHash = password_hash($password,PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt,"ss",$tokenEmail,$newpwdHash,$tokenEmail);
	mysqli_stmt_execute($stmt);


	$sql = "DELETE FROM password_reset WHERE resetEmail = ?";
	$stmt = mysqli_stmt_init($conn);

	if (!msqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error";
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt,"s",$userEmail);
		mysqli_stmt_execute($stmt);

		header("Location:../login.php?UpdateSuccess");
	}	
		}	
	}

			}
		}
	}

}
else
{
	header("Location:../index.php");
	exit();
}