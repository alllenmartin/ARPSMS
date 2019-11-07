<?php
include ('includes/header.php');
include ('nav_bar/navbar_admin.php');
require 'includes/db1.php';


?>
<head>

          <!-- Script for dynamic addition of schemes -->
          <link rel="stylesheet" href="js/bootstrap.min.css" />
          <script src="js/bootstrap.min.js"></script>
          <script src="js/jquery.min.js"></script>
     </head>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <!-- <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications
                <?php
                include_once ('includes/functions.php');
                $query = "SELECT * FROM `notifications` where `status` = 'unread' order by `date` DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-light " ><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
                    ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                $query = "SELECT * from `notifications` order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="view_comment.php?id=<?php echo $i['id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php

                if($i['type']=='comment'){
                    echo "Someone commented <br>on your post.";
                }else if($i['type']=='like'){
                    echo ucfirst($i['name'])." <br>liked your post.";
                }

                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                     ?>
            </div>
          </li>
        </ul> -->


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php

            if (isset($_SESSION['email'])) {
            $sql = "SELECT * FROM register_db WHERE email='".$_SESSION['email']."'";
            $result = mysqli_query($conn,$sql);

            while ($user = mysqli_fetch_object($result)) {
            ?>
            <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-weight: bold;"><?php echo $user->first_name; ?>   <?php echo $user->last_name;  ?></span>
            <?
            }

          }

            ?>

             <?php


          $image = "SELECT file FROM register_db WHERE  email='".$_SESSION['email']."' ";
          $result = mysqli_query($conn,$image);
          $path=mysqli_fetch_assoc($result) or die("Could not fetch array : " .mysqli_error($conn));

            ?>
                <img class="img-profile rounded-circle" src="<?php echo 'includes/image/'.$path['file'];?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php?pf=<?php echo $_SESSION['email'] ;?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>


          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">


            <div class="col-lg-10 mb-10">
             <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <!-- Table -->
               <div class="container">
                 <br />
                 <br />
                 <h2 align="center">Add Schemes</h2>
                 <div class="form-group">
                      <form name="add_name" id="add_name">
                           <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                     <tr>
                                          <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                                          <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                     </tr>
                                </table>
                                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                           </div>
                      </form>
                 </div>
            </div>
       </body>
  </html>
  <script>
  $(document).ready(function(){
       var i=1;
       $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
       });
       $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
       });
       $('#submit').click(function(){
            $.ajax({
                 url:"name.php",
                 method:"POST",
                 data:$('#add_name').serialize(),
                 success:function(data)
                 {
                      alert(data);
                      $('#add_name')[0].reset();
                 }
            });
       });
  });
  </script>

               </div>
             </div>


            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



  <?php
include ('includes/script.php');
include ('includes/footer.php');

  ?>
