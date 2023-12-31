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
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Update_user</li>
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
 <form action="#" class="form-horizontal" id="form_sample_1" method="post" 
           enctype="multipart/form-data">
<?php
                     $id = $_GET["ID"];
               $result = mysqli_query($conn,"SELECT * FROM users_account where user_id='$id'") or die(mysqli_error());  
               $rows = mysqli_fetch_array($result);    
               $f_name=$rows['first_name'];
               $m_name =$rows["last_name"];
               $email=$rows["email"];
            
            if (isset($_POST['update'])){   
    
                    $passwordd = $_POST['password'];             
                    $password=md5($passwordd);
                    $subject="Sodo City Vehicle Registration";  
                    $message = "Dear $f_name $m_name 
                    Your Account Has been updated By the Administrator.<br><br>
                    Your Username is: $id<br>
                    Your new password is : $passwordd<br>
                    Use this information to login to Sodo City TVET LMS.<br><br>
                    DON'T REPLY to this email";
                    $headers = 'From: sodocityrta@gmail.com'. "\r\n". 'MIME-Version: 1.0'. "\r\n" . 'Content-type: text/html; charset=utf-8';

                          // Send mail by PHP Mail Function
                    $mail = mail($email, $subject, $message,$headers);
                    $connection = @fsockopen('www.google.com',80);
                    
                    //check connection          
          /*if (!$connection) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-wifi-off me-1"></i>You have no internet connection!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        }
          elseif ($mail == true) {*/
                                
               mysqli_query($conn,"Update users_Account set password ='$password' where user_id='$id'")or die(mysqli_error($conn));
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle-fill me-1"></i>
                      User Account Has Been Updated Now!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
          /*}else {

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-x-octagon-fill me-1"></i>Failed to Update user account!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    }*/
       
              }?>
                      <?php 
                                $query=mysqli_query($conn,"select * from users_account where user_id='$id'")or die(mysqli_error());
                                 $row=mysqli_fetch_array($query);
                                  $pic=$row["profile_pic"];
                                ?> 

              <img src="../Uploads/<?php echo $pic;?>" alt="Profile" class="rounded-circle" width ="150px" height = "150px">
              <h2> <?php echo $rows['first_name']. " ". $rows['last_name']; ?></h2>
              <h3> <?php echo $rows['account_type']; ?></h3>
                  <h5 class="card-title">Position of Work</h5>
                  <p class="small fst-italic"> <?php echo $rows['position']; ?></p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $rows['first_name']. " ". $rows['last_name']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Account Type</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $rows['account_type']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">User_Id</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $rows['user_id']; ?> </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $row['account_status']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $rows['phone']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $rows['email']; ?></div>
                  </div>
                       <div class="mb-4 mt-5">
      <label for="uid" class="form-label text-dark">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter new password here" required>
    </div>         
  <button type="submit" class="btn btn-success mt-4" 
  name="update" id="update" >Update User</button>
  <a class="btn btn-danger mt-4" href="updateuser.php">Cancel</a>
                                       
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