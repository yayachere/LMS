<?php include('header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Profile</li>
          <li class="breadcrumb-item active">Picture</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <?php

                  $result = mysqli_query($conn, "SELECT * FROM users_account where user_id='$session_id'") or die(mysqli_error());
                  $data = mysqli_fetch_array($result);
                  $pic = $data["profile_pic"];
                  ?>
              <img src="../Uploads/<?php echo $pic; ?>" alt="Profile" class="rounded-circle">
              <h2> <?php echo $data['first_name'] . " " . $data['last_name']; ?> </h2>
              <h3> <?php echo $data['account_type']; ?> </h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <a href="profile.php"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Overview" class="nav-link " >Overview</a>
                </li>

                <li class="nav-item">
                  <a href="info.php"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profile settings" class="nav-link">Edit Profile</a>
                </li>

                <li class="nav-item">
                  <a href="picture.php"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profile picture" class="nav-link active">Change Picture</a>
                </li>

                <li class="nav-item">
                  <a href="password.php"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change password" class="nav-link">Change Password</a>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form action="#" role="form" method="post" enctype="multipart/form-data">
                 <?php
                 $error=0;
                                                
        if (isset($_POST['profile'])){
                $image = $_FILES['image']['tmp_name'];
            if ($image=="") {
                 echo '<div class="alert alert-danger alert-dismissible fade show">
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                Select an Image!</div>';
                $error = 1;                                      
                           }
            else {

                    $image_name = $_FILES['image']['name'];
                    $image_size = getimagesize($_FILES['image']['tmp_name']);
                    $image_type = $_FILES['image']['type'];
                    $image_error = $_FILES['image']['error'];    

        if($image_size==FALSE && $error ==0 ){
                   echo '  <div class="alert alert-danger alert-dismissible fade show">
                   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    That is not an image.</div>';
                      $error = 1;
                    }

         else if($image_error > 0 && $error == 0){
              echo '<div class="alert alert-danger alert-dismissible fade show">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              There is error in uploading an image. </div>';
                      $error = 1;
                    }

            else if($error == 0){
                     mysqli_query($conn,"update users_account set profile_pic='"."$image_name"."' where user_id = '$session_id'")or die(mysqli_error());
                       move_uploaded_file($image,"../Uploads/".$image_name);
                     echo '<div class="alert alert-success alert-dismissible fade show">
                     <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                       Your profile changed successfully.</div>';
                               }}}?>
                    <div class="row mb-3">
                      <div class="mb-2 alert-info rounded">
                      <span class="label bg-danger text-light" style="font-size: 20px;"> <i class="fas fa-exclamation-triangle text-warning"></i> NOTICE! </span><br>

                      <span class=""> The profile you have to use must be your own because it is used for many purpose in this site. Make sure your image is only 3 month old this is for your own sake </span>
                </div>
                <?php 
            $query=mysqli_query($conn,"select * from users_account where user_id='$session_id'")or die(mysqli_error());
            $row=mysqli_fetch_array($query);
             $pic=$row["profile_pic"]; ?> 
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Current Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../Uploads/<?php echo $pic;?>" style="height: 200px; width: 300px;" alt="Profile">
                        <div class="pt-5">
                          <h6>Select New Profile Picture</h6>
                          <input type="file" class="form-control mt-4" name="image" id="profile" />
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary"  name="profile" title="Upload new profile image"><i class="bi bi-upload"></i></button>
                      <button type="reset" class="btn btn-danger btn-md text-dark"  title="Back"><i class="bi bi-backspace-fill"></i></button>
                    </div>
                  </form><!-- End settings Form -->

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