<!DOCTYPE html>
<html>
<head>
	<title>New Password</title>
</head>
<body>
<body>
<?php
$selector = $_GET['selector'];
$validator = $_GET['validator'];

if (isset($selector) || isset($validator)) {
	echo "Could not validate request";
}
else
{
	if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false)
	  {
		?>
			<form action="includes/password_reset.php" method="POST">
			<input type="hidden" name="selector" value="<?php echo $selector; ?>">
			<input type="hidden" name="validator" value="<?php echo $validator; ?>">
			<input type="password" name="Password" placeholder="Enter Password">
			<input type="re_password" name="Password" placeholder="Repeat the Password">
			<button type="submit" name="reset-password">Reset Password</button>
				
			</form>
		<?php
	}
}
?>

</body>
</html>