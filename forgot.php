<?php include('header.php');
include('dbcon.php');
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
?>
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
  .credits a {
    color: #000;
       font-size: 17px;
    text-decoration: none;
  }
  .credits a:hover {
    color: papayawhip;   

  }
 

    #preloader {
      background: #fff url(Loading_2.gif) no-repeat center center;
      background-size: 10%;
      height: 100vh;
      width: 100%;
      position: fixed;
      z-index: 100;
    }
  </style>
</head>

<body style="background-image: url(Uploads/bg2.jpg);" onpagehide="show()" onpageshow="hide()">
<div id="preloader"></div>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">

                  <span class="d-none d-lg-block glow"></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login<br>
                      <img src="img/vrslogo.png" alt="logo" height="100" width="100" class="rounded-circle"></p>
                  </div>
 <?php
  
 if(isset($_POST['send']))
  {  
     $user_id1=$_POST['uid'];
     $email1=$_POST['email'];
     $type=$_POST['type'];
     $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $str = str_shuffle($str);
    $passwordd = substr($str, 0,10);
    $pass=base64_encode($passwordd);
    $password = md5($passwordd);

$result=mysqli_query($conn,"select * from users_account where user_id='$user_id1' AND 
email='$email1'")or die( mysqli_error($conn));

if(mysqli_num_rows($result) >= 1)  {
  $row = mysqli_fetch_assoc($result);
  $account_type = $row['account_type'];
  $f_name = $row['first_name'];
  $l_name = $row['last_name'];

if($type==$account_type)
 {    
        $subject="Sodo City TVET";  
                    $message = "Dear $f_name $l_name 
                    Your password is changed as per your request.<br><br>
                    Your new password is : $passwordd<br>
                    Use this password to login to your Sodo City Vehicle Registration System account.<br><br>
                    DON'T REPLY TO THIS EMAIL";
                    $headers = 'From: sodocityrta@gmail.com'. "\r\n". 'MIME-Version: 1.0'. "\r\n" . 'Content-type: text/html; charset=utf-8';

                          // Send mail by PHP Mail Function
                    $mail = mail($email1, $subject, $message,$headers);
                    $connection = @fsockopen('www.google.com',80);
                    //check connection          
          if (!$connection) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-wifi-off me-1"></i>You have no internet connection!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        }
          elseif ($mail == true) {
                                
               mysqli_query($conn,"Update users_account set password ='$password' where user_id='$user_id1'")or die(mysqli_error());

              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-1"></i>
      Changed Successfully. Your password is sent on your email address.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
          }else {

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-x-octagon-fill me-1"></i>
                  Failed to send email. Please check your connection and try again!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    }                
  
        } 
else
        {    
 
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-x-octagon-fill me-1"></i>
      There is no '. $type. ' account with this email and user_id!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';  
 
        }
   
  } else
        {  
 
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-x-octagon-fill me-1"></i>
      There is no account with this user_id and email 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

        }}
?>
  <form method="post" action="#" class="row">
    <div class="col-md-12">
      <label for="cid" class="form-label text-dark">User ID:</label>
      <input type="text" class="form-control" id="uid" placeholder="Enter User ID" name="uid" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fill your User ID here" required>
     
    </div>
    <div class="col-md-12 mt-3">
      <label for="email" class="form-label text-dark">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fill your Email here" required>
    </div>
<div class="form-floating col-md-12 mt-3">
                      <select class="form-select" name="type" id="type" aria-label="Floating label select example" required>
                        <option disabled selected></option>
                        <option value="Admin">Admin</option>
                        <option value="registerar">Registerar</option>
                        <option value="finance">Finance</option>
                        <option value="hrm">HRM</option>
                        <option value="instructor">Instructor</option>
                        <option value="head">Head</option>
                        <option value="library">Library</option>
                        <option value="student">Student</option>
                      </select>
                      <label for="type">Choose account type from the list:</label>
    </div>
    
  <button type="submit" class="btn btn-primary col-md-5 mt-3" name="send">Submit</button><div class="col-md-2"></div>
  <a href ="index.php" class=" col-md-5 mt-3 btn btn-danger">Cancel</a>
  </form>

                </div>
              </div>
            <div class="copyright text-light">
                  &copy; Copyright <strong><span>Sodo City TVET</span></strong>. All Rights Reserved
                </div>
              <div class="credits mt-2">

                <a href="mailto:chereyaya16@gmail.com" target="blank">Powered by Yaya</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>