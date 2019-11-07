<?php

//use PHPMailer\PHPMailer\PHPMailer;
require_once ('db.php');
require_once ('PHPAutoload.php');

if (isset($_POST['submit'])) {
	
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$reaction = mysqli_real_escape_string($conn,$_POST['reaction']);

	
	

	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->HOST = 'smtp.gmail.com';
	$mail->SMTPAuth= true;
	$mail->Username = 'martinallen722@gmail.com';
	$mail->Password = 'allenmartin10224';
	$mail->Port = '465';
	$mail->SMTPSecure ='ssl';

	$mail->isHTML();
	$mail->setFrom($email,$reaction);
	$mail->addAddress('arpsms@gmail.com');
	$mail->Subject = $reaction;
	$mail->Body= $reaction;

	if ($mail->send()) {
		echo "Success";
	}else{
		echo "Unsuccessful".$conn->error;
	}
}


?>