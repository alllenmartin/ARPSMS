<?php
// Delete Scheme
if(isset($_GET['dlscheme'])) {
$dlscheme=$_GET['dlscheme'];
$sql="DELETE FROM scheme WHERE scheme_id = '$dlscheme'  ";
$sql=mysqli_query($conn,$sql);
header('location:view_scheme.php?error=Successful');
exit();
}
else {
header('location:view_scheme.php?error=error');
}

 ?>
