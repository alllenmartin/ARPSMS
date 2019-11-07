		<?php
		// Including database connection
		include_once ('db1.php');

		// Check if submit button is clicked

		if (isset($_POST['submit'])) {
			$first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
			$last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
			$username = mysqli_real_escape_string($conn,$_POST['username']);
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$password = mysqli_real_escape_string($conn,$_POST['password']);
			$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);


			$reg_date = date("Y-m-d");
			$reg_time = date("H:i:s");



			$file = rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			$folder="image/";


			/* new file size in KB */
			$new_size = $file_size/1024;
			/* new file size in KB */

			/* make file name in lower case */
			$new_file_name = strtolower($file);
			/* make file name in lower case */

			$final_file=str_replace(' ','-',$new_file_name);


			if (empty($first_name) || empty($last_name) || empty($username) || empty($password) || empty($pwd) || empty($file))
			{
			   echo "string".$conn->error;
			}
			elseif ($password <> $pwd)
			 {
				header("Location:../register.php?error=Password");
				exit();
			}
			elseif (!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				header("Location:../register.php?error=emailError");
				exit();
			}

			else

			{
				$sql = "SELECT * FROM register_db WHERE email = '$email'";
				$result = mysqli_query($conn,$sql);
				$rowcount = mysqli_num_rows($result);


				if ($rowcount > 0) {
					header("Location:../register.php?error=Exists");
					exit();
				}
				else
				{
					if(move_uploaded_file($file_loc,$folder.$final_file)){

					$pwdHash = password_hash($password,PASSWORD_DEFAULT);
					$sql = "INSERT INTO register_db(username,first_name,last_name,email,password,reg_date,reg_time,file,type,size) VALUES('$username','$first_name','$last_name','$email','$pwdHash','$reg_date','$reg_time','$final_file','$file_type','$new_size');";
					$result = mysqli_query($conn,$sql);

					if ($result == TRUE)
					{

					 header("Location:../login.php");
					 exit();
					}
					else
					{
						header("Location:../register.php?error=Unseccessful");
						exit();
					}
				}
				}
			}

		}




		//Login User


		if (isset($_POST['login'])) {

			// Checks for characters
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$password = mysqli_real_escape_string($conn,$_POST['password']);
			// Checks for empty fields
			if (empty($email) || empty($password))
				{
				header("Location:../login.php?error=Empty&mail=".$email);
				exit();

			}
			else
				{
			// Checks if the SQL is correct
			$sql = "SELECT * FROM register_db WHERE email = ? OR password = ?;";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../login.php?error=Sqle");
			exit();

			}else
			{
			mysqli_stmt_bind_param($stmt,"ss",$email,$email);
			mysqli_stmt_execute($stmt);
			$result =mysqli_stmt_get_result($stmt);

			if ($row = mysqli_fetch_assoc($result))
			 {
			$chekPass = password_verify($password,$row['password']);
			$role = $row['role'];
			if ($chekPass == FALSE)
			{
			header("Location:../login.php?error=wrongpassword");
			exit();
			}
			else if ($chekPass == TRUE)
			{
			session_start();
			$_SESSION['email'] = $row['email'];
			$_SESSION['role'] = $role;
			$_SESSION['id']= $row['id'];
			$_SESSION['username']= $row['username'];
			$_SESSION['file']= $row['file'];
			$_SESSION['address'] = $row['address'];
			$_SESSION['phone'] = $row['phone'];
			$_SESSION['scheme'] = $row['scheme'];
			$_SESSION['last_login_timestamp'] = time();


			if ($role == '1') {
				header("Location:../index.php?Success");
			exit();

			}elseif ($role == '2') {
				header("Location:../supervisor_page.php?Success");
			exit();
			}elseif ($role == '3') {
					header("Location:../farmer_page.php?Success");
			        exit();
			}
		else
		{
			header("Location:../login.php?error=wrongpassword1");
			exit();
			}
		}
		else
		{
			header("Location:../login.php?error=nosuchuser");
			exit();
			}
		}
		}

		}

}
		//Register Farm



		if (isset($_POST['register_farm'])) {


		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$uname = trim($_POST['uname']);
		$email = trim($_POST['email']);
		$phone = trim($_POST['phone']);
		$address = trim($_POST['address']);
		$scheme = trim($_POST['scheme']);
		$fno = trim($_POST['fno']);
		$fsize= trim($_POST['fsize']);

		if (empty($phone) || empty($address) || empty($scheme) || empty($fno) || empty($fsize))

		   {
		     header("Location:../register_farm.php?error=EmptyFields");
		     exit();
			}
			else
			{
				$sql = "SELECT * FROM register_db JOIN farms ON register_db.user_id = farms.farm_id WHERE email = '$email'";
				$result = mysqli_query($conn,$sql);
				$check = mysqli_num_rows($result);

				if ($check > 0) {
					 echo "<script type='text/javascript' class='alert alert-success'>alert('Unsuccessful! Farm already exist,please try again!')</script>";
		            echo '<meta http-equiv="refresh" content="0; url=../index.php">';
				}

			else
			{
				$sql = "INSERT INTO farms (phone,address,farm_name,fnumber,farm_size) VALUES('$phone','$address','$scheme','$fno','$fsize');";
				$result = mysqli_query($conn,$sql);

				if ($result == TRUE) {

		            echo "<script type='text/javascript' class='alert alert-success'>alert('Submitted successfully! Thanks for registering with us!')</script>";
		            echo '<meta http-equiv="refresh" content="0; url=../index.php">';
				}
				else
				{
					 echo "string" .$conn->error;
				}
			}
		}
	}

?>
<?php
//Add items

if (isset($_POST['add_item'])) {
	$product_category = mysqli_real_escape_string($conn,$_POST['product_category']);
	$product_name = mysqli_real_escape_string($conn,$_POST['product_name']);
	$product_price = mysqli_real_escape_string($conn,$_POST['product_price']);

	if (empty($product_category) || empty($product_name) || empty($product_price)) {
		header("Location:../add_item.php?error=Empty");
		exit();
	}
	else
	{
		$sql = "INSERT INTO products(brand_id,product_name,product_price) VALUES('$product_category','$product_name','$product_price')";
		$result = mysqli_query($conn,$sql);

		if ($result)
		 {
			header("Location:../add_item.php?error=Successful");
			exit();
		}
		else
		{
			echo "string".$conn->error;
		}
	}
}































		?>
