<?php
require_once ('db.php');
use PHPMailer\PHPMailer\PHPMailer;
if (isset($_POST['submit'])) {
	
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$reaction = mysqli_real_escape_string($conn,$_POST['reaction']);

	require_once "PHPMailer/PHPMailer.php";
	require_once "PHPMailer/Exception.php";
	require_once "PHPMailer/SMTP.php";

	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->HOST = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = "martinallen722@gmail.com";
	$mail->Password = "allenmartin10224";
	$mail->Port = 465;
	$mail->SMTPSecure ="ssl";

	$mail->isHTML(true);
	$mail->setFrom($email,$email);
	$mail->addAddress("arpsms@gmail.com");
	$mail->Subject = $message;
	$mail->Body= $message;

	if ($mail->send()) {
		echo "Success";
	}else{
		echo $error;
	}
}


?>