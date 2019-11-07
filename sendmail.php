<?php
include ('includes/header.php');
include ('nav_bar/navbar_admin.php');
require 'db.php';

?>
<div class="container" style="margin-top: 100px">
<div class="row justify-content-center">
<div class="col-md-6 col-md-offset-3" align="center">
<div class="card mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Progress Small Utility</h6>
                </div>
                <div class="card-body">
                 <form action="PHPMailer/sendmail.php" method="POST">
				<label>Email:</label>
				<input type="email" name="email" placeholder="Enter Email Address" class="form-control"><br>
				<label>Response:</label>
				<select class="form-control" name="reaction" type="text">
				<option>Delivered</option>
				<option>Not Available</option>
				</select><br>
	<button class="btn btn-success" name="submit" type="submit">Submit</button>
</form>
                </div>
              </div>


</div>

</div>

</div>

  <?php
include ('includes/script.php');
include ('includes/footer.php');

  ?>
