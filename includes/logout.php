<?php
session_start();
session_unset();

$_SESSION['email'] = NULL;
$_SESSION['id'] = NULL;

header("Location:../login.php");
exit();

?>
