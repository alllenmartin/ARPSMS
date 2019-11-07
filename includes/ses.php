<?php

session_start();

  if (isset($_SESSION['email'])) {
    if ((time() - $_SESSION['last_login_timestamp']) > 1000000000) {
    	header("Location:login.php");
    	exit();
    }else{

    }
  }else{
    header("Location:login.php");
    exit();
  }
?>