<?php
if (isset($_POST['password_reset'])) {

	include '../phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;
	$mail ->isSMTP();
	$mail ->SMTPAuth = true;
	$mail ->SMTPSecure = 'ssl';
	$mail ->Host = 'smtp.gmail.com';
	$mail ->Port = '465';
	$mail ->isHTML();
	$mail ->Username = 'martinallen722@gmail.com';
	$mail ->Password = 'allenmartin10224';
	$mail ->SetFrom = 'no-reply@arpsms.org';
	$mail ->Subject = 'Hello';
	$mail ->Body= 'See mail';
	$mail ->AddAddress('arpsms@gmail.com');
	$mail ->send();
	

	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);

	$url = "127.0.0.1/ARPSMS/create-new-password.php?selector=".$selector. ""."&validator=".bin2hex($token);

	$expires = date("U") + 1800;

	require 'db.php';


	$userEmail = $_POST["email"];

	$sql = "DELETE FROM password_reset WHERE resetEmail = ?";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error";
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt,"s",$userEmail);
		mysqli_stmt_execute($stmt);
	}

	$sql = "INSERT INTO password_reset(resetEmail,resetSelector,resetToken,resetExpires) VALUES(?,?,?,?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error";
		exit();
	}
	else
	{
		$hashToken = password_hash($token,PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashToken,$expires);
		mysqli_stmt_execute($stmt);
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

	$to = $userEmail;

	$subject = "Reset your password from ARPSMS";

	$message = '<p>We received a password reset request.The link to your password reset has been sent to your email.If you did not make this request,you can ignore the email</p>';
	$message.='<p>Here is your password link:<br>';
	$message.='<a href="'.$url.'">'.$url.'</a></p>';

	$headers = "FROM:ARPSMS <arpsms@gmail.com\r\n>";
	$headers.="Content-type:text/html\r\n";

	mail($to, $subject, $message,$headers);

	header("Location:../reset-password.php?reset=Success");
	exit();
}
else
{
	header("Location../reset-password.php");
	exit(); 
}