<?php include('header.php');?>
<!DOCTYPE html>
<html lang="en">

<body>

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
          <li class="breadcrumb-item active">Information</li>
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
                  $pic = $data["pro_image"];
                  ?>
              <img src="../Uploads/<?php echo $pic; ?>" alt="Profile" class="rounded-circle">
              <h2> <?php echo $data['f_name'] . " " . $data['l_name']; ?> </h2>
              <h3> <?php echo $data['user_type']; ?> </h3>
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
                  <a href="info.php"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profile settings" class="nav-link active">Edit Profile</a>
                </li>

                <li class="nav-item">
                  <a href="picture.php"data-bs-toggle="tooltip" data-bs-placement="bottom" title="profile picture" class="nav-link">Change Picture</a>
                </li>

                <li class="nav-item">
                  <a href="password.php"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change password" class="nav-link">Change Password</a>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
                          <?php 
if (isset($_POST['save'])){   
        $error = 0;
        $e_mail=$_POST['e_mail'];
        $phone = $_POST['phone'];
        $phone_len = strlen($phone);
        $about = $_POST['about'];
                    
        $runn = mysqli_query($conn,"SELECT * FROM users_account")or die(mysqli_error());
        $roww = mysqli_fetch_array($runn);
        $iddb = $roww['e_mail'];  
                    
          if($iddb==$e_mail) {
              echo '<div class="alert alert-danger alert-dismissible fade show">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              You have inserted used Email. Please insert another </div>';
                      $error = 1;
                    }
  
          else if($phone_len >= 10) {
              echo '<div class="alert alert-danger alert-dismissible fade show">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              Phone Number length must be less than or equal to 10</div>';
                      $error = 1;
                    }                                    
          else if($iddb!=$e_mail && $error==0 ) {
          
              mysqli_query($conn,"Update users_account set e_mail='$e_mail',phone_no='$phone',about_me='$about' where user_id='$session_id' ")or die(mysqli_error($conn));
                      
              echo ' <div class="alert alert-success alert-dismissible fade show">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              Your Profile is Updated Now!</div>';
                    
                  }
                  
              }
              
              
                          ?>
                          
                          <?php
            $query=mysqli_query($conn,"select * from users_account where user_id='$session_id'")or die(mysqli_error());
                          $row=mysqli_fetch_array($query);
                          $about = $row['about_me'];
                          $phone = $row['phone_no'];
                          $email = $row['e_mail'];
                          ?>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $row['f_name']. ' '. $row['l_name']; ?>" disabled="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">User_Id</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?php echo $row['user_id']; ?>" disabled="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px" required=""><?php echo $about; ?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="number" class="form-control" id="phone" placeholder="Enter numbers only"value="<?php echo $phone; ?>" required="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="e_mail" type="email" class="form-control" name="e_mail" placeholder= "k.anderson@example.com"value="<?php echo $email; ?>" required="">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="save">Save Changes</button>
                      <button type="reset" class="btn btn-danger" name="cancel" id="cancel" >Cancel</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

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