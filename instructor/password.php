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
          <li class="breadcrumb-item active">Password</li>
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
                  <a href="picture.php"data-bs-toggle="tooltip" data-bs-placement="bottom" title="profile picture" class="nav-link">Change Picture</a>
                </li>

                <li class="nav-item">
                  <a href="password.php"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change password" class="nav-link active">Change Password</a>
                </li>

              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="#" method="post">
        <?php
            if (isset($_POST['update'])){
            $query=mysqli_query($conn,"select * from users_account where user_id='$session_id'")or die(mysqli_error());
          $row=mysqli_fetch_array($query);
          $pass=$row['password'];
            $np = $_POST['np']; 
            $op = $_POST['op'];
            $rp = $_POST['rp'];
            $OPP=md5($op);            
            
    if($np!=$rp) {

        echo "<div class='alert alert-danger alert-dismissible fade show'>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        New and Confirm Password doesn't Match!</div>";
            }

    else{
        
        if($OPP==$pass){
              $nnp=md5($np);
            mysqli_query($conn,"update users_account set password = '$nnp' where user_id = '$session_id' ")or die(mysql_error());

           echo "<div class='alert alert-success alert-dismissible fade show'>
                  <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                  Password has been changed successfully!</div>";
       }else{
        
          echo "<div class='alert alert-danger alert-dismissible fade show'>
              <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
              Your old Password is not Correct!</div>";
  }}}?>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" name="op" id="op" placeholder="Enter Current Password" required/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" name="np" id="np"placeholder="Enter New Password"  required/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" name="rp" id="rp" placeholder="Re- Enter Password" required />
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name = "update" id="update">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

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