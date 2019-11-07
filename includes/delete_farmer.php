<?php

// Delete Farmers

require 'db1.php';
if(isset($_GET['dfarmers'])) {
$dfarmers=$_GET['dfarmers'];
$sql="DELETE FROM farms WHERE farm_id='$dfarmers'  ";
$sql=mysqli_query($conn,$sql);
header('location:../update_farmers.php?error=Successful');
exit();
}
else {
header('location:../update_farmers.php?error=error');
exit();
}


 ?>
