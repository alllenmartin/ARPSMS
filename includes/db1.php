<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename ="kawira";

try{
    $conn = mysqli_connect($servername,$username,$password,$databasename);

    if ($conn) {
    	// echo "Database was connected successfully";
    }
}catch(Exception $errormsg){
 echo $errormsg->getMessage();
}
?>