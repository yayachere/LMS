<?php include('header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="../jquery-3.6.0.js"></script>
<script type="text/javascript">
  function show() {  
  var loader = document.getElementById('preloader');
    loader.style.display = "block";

  }
  function hide() {  
  var loader = document.getElementById('preloader');
    loader.style.display = "none";

  }
</script>
<style type="text/css">
    #preloader {
      background: #fff url(../Loading_2.gif) no-repeat center center;
      background-size: 10%;
      height: 100vh;
      width: 100%;
      position: fixed;
      z-index: 100;
    }
  </style>
</head>
<body onpagehide="show()" onpageshow="hide()">
<div id="preloader"></div>
  <!-- ======= Header ======= -->
  <?php include('navbar.php');?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
   <?php include('sidebar.php');?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Delete_user</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-10">

          <div class="card">
            <div class="card-body pt-3">
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
 <?php 
  $id = $_GET["ID"];
              $result = mysqli_query($conn,"SELECT * FROM users_account where user_id='$id'") or die(mysqli_error()); 
                        $data = mysqli_fetch_array($result);
                        $fname = ucfirst($data["first_name"]);
                        $lname = ucfirst($data["last_name"]);
                        $studid=$data["user_id"];
                        $pic = $data['profile_pic'];

            if(isset($_POST['delete'])){
               $run = mysqli_query($conn,"select email from users_account where user_id = '$studid'" ) or die(mysqli_error());
                        $row = mysqli_fetch_array($run);  
                        $email=$row['email'];
                        $subject="Sodo City TVET LMS"; 
                        $message = "Dear $fname $lname your Account has been deleted.<br> 
                        If you have any question Contact the Administrator.<br>
                        Please don't replay to this email!!!!!";
                        $headers = 'From: sodocityrta@gmail.com'. "\r\n". 'MIME-Version: 1.0'. "\r\n" . 'Content-type: text/html; charset=utf-8';
                        $mail = mail($email, $subject, $message,$headers);
                        $connection = @fsockopen('www.google.com',80);
      /*  if (!$connection) {

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-wifi-off me-1"></i>You have no internet connection!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        }

        elseif ($mail == true) {*/
                mysqli_query($conn,"DELETE from users_Account where user_id='$id'")or die(mysqli_error($conn));
                echo' <meta content="2;delete_instructor.php" http-equiv="refresh" />';
                   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle-fill me-1"></i>
                      This account has been deleted!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';                  
                      /*  }
        else {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-x-octagon-fill me-1"></i>
                  Failed to delete account and send email!!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                  }*/

                  
              }
              
              ?>
   
  <form method="post" action="#" class="was-validated" enctype="multipart/form-data">
                
           <center> <h4 class="text-danger alert-info p-3 rounded"><i class="fa fa-microphone"></i> Are You Sure You Want to Delete this user</h4></center></div>

    <div class="mb-3 ">
      
       <img src="../Uploads/<?php echo $pic;?>" alt="pro_image" class="rounded-circle" width = "150px" height ="150px"/> 
    </div>
<h2> <?php echo $data['first_name']. " ". $data['last_name']; ?></h2>
              <h4> <?php echo $data['account_type']; ?></h3>
                

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Full Name:</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $data['first_name']. " ". $data['last_name']; ?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Account Type:</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $data['account_type']; ?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">User_Id:</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $data['user_id']; ?> </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Status:</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $data['account_status']; ?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Phone:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['phone']; ?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Email:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['email']; ?></div>
                  </div>
  <button type="submit" class="btn btn-danger mt-3" name="delete">Confirm</button>
  <a type="button" class="btn btn-primary mt-3" href="deleteuser.php">Cancel</a>
  </form>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- ======= Footer ======= -->
  <?php include('footer.php');?>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>