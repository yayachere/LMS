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
  <!-- ======= Sidebar ======= -->
<?php include('sidebar.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Add_user</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fill Officer Information Below</h5>
              <!--Begin the validation states--->
<?php

if (isset($_POST['register'])) {   
            
    $userId = test_input($_POST['userId']);
    $firstName = test_input(ucfirst($_POST['firstName']));
    $middleName = test_input(ucfirst($_POST['middleName']));
    $lastName = test_input(ucfirst($_POST['lastName']));
    $fullname = $firstName."".$middleName."".$lastName;
    $office = test_input($_POST['office']);
    $position = test_input($_POST['position']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    $accountType = $_POST['accountType'];
    $gender = test_input($_POST['gender']);
    $registered_on = date("Y-m-d");
    $accountStatus = "Active";
    if ($gender == "male") {
       $profileImage = "male.png";
     }else {
     $profileImage = "women.png";

     }

     $documentName = $_FILES['document']['name'];
     $document = $_FILES['document']['tmp_name'];
     $targetDir = "../Uploads/";
     $targetFile = $targetDir . basename($_FILES["document"]["name"]);
     $documentFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $str = str_shuffle($str);
    $passwordd = substr($str, 0,10);
    $pass=base64_encode($passwordd);
    $password = md5($passwordd);
/*  $connection = @fsockopen('www.google.com',80);
          
//check connection 

    if (!$connection) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-wifi-off me-1"></i>You have no internet connection!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                  }
//check if name contains letter and space

    else*/if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
                          
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle-fill me-1"></i>
        <strong>Failed! </strong>Only letters and white space allowed for name!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

// check if email has a valid format

    elseif (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
          
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-x-octagon-fill me-1"></i>
      <strong>Error! </strong>Invalid Email format!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
         
          }

//check if the user exists
    elseif(mysqli_num_rows(mysqli_query($conn,"select * from users_account where user_id ='$userId'")) >= 1)  {
            
                                       
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle-fill me-1"></i>
        There is an account with this user id !!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

    else if($documentFileType != "pdf" && $documentFileType != "doc" && $documentFileType != "docx") {

        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
          <i class="bi bi-info-circle-fill me-1"></i>
          <strong>Failed! </strong>Only<strong> doc, docx AND pdf</strong> file formats are allowed for document field!!              
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                    }
               
    else {

 //Send mail by PHP Mail Function
      $subject="Sodo City TVET"; 
      
     $message = "Dear $firstName $middleName below is your username and password for Vehicle Registration System.<br><br>
    Your User Id : $userId <br>  
    Your Password : $passwordd<br><br>
    Please use this information to login to Vehicle Registration System!!<br>
    DON'T REPLY to this email";
    $headers = 'From: sodocityrta@gmail.com'. "\r\n". 'MIME-Version: 1.0'. "\r\n" . 'Content-type: text/html; charset=utf-8';
    $mail = mail($email, $subject, $message,$headers);
                 
     /*if (!$mail== true) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-x-octagon-fill me-1"></i>
                Failed to create account Check your connection and try again!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
} else {*/

      mysqli_query($conn,"insert into users_account( user_id,first_name,last_name,account_type,email,phone,profile_pic,password,account_status,gender) values('$userId','$firstName','$middleName','$accountType','$email','$phone','$profileImage','$password','$accountStatus','$gender')")or die(mysqli_error($conn));

      mysqli_query($conn,"insert into officer( user_id,first_name,middle_name,
        last_name,document,email,phone,office,registered_on,gender,position) values('$userId','$firstName','$middleName','$lastName','$document','$email','$phone','$office','$registered_on','$gender','$position')")or die(mysqli_error($conn));

      move_uploaded_file($document,"../Uploads/".$documentName);

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-1"></i>
      New '. $accountType. ' Account Created successfully!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';?>

      <a href='print_officer.php?firstName=<?php echo $firstName;?>&lastName=<?php echo $middleName;?>&userId=<?php echo $userId;?>&password=<?php echo $passwordd;?>' class="btn btn-success">Print</a> 
                          
          <?php  }}  ?>

<form action="#" method="post"  enctype="multipart/form-data">
    
    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="uid" name="userId" placeholder="Enter user Id here" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter user_id here" required="">
          <label for="floatingInput">User_Id</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="uid" name="firstName" placeholder="Enter First Name" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter first name here" required="">
          <label for="floatingInput">First Name</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="uid" name="middleName" placeholder="Enter Father Name" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Father Name here" required="">
          <label for="floatingInput">Father Name</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="uid" name="lastName" placeholder="Enter Grand Father Name" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Grand Father Name here" required="">
          <label for="floatingInput">Grand Father Name</label>
        </div>

    <div class="form-floating mb-3">
          <input type="email" class="form-control" id="uid" name="email" placeholder="name@example.com" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Email here" required="">
          <label for="floatingInput">Email Address</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="uid" name="phone" placeholder="0987654321" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Phone Number here" required="">
          <label for="floatingInput">Phone Number</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="office" name="office" placeholder="Enter Office" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Office" required>
          <label for="floatingInput">Office</label>
    </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position of Work" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Position" required>
          <label for="floatingInput">Position of Work</label>
    </div>

    <div class="form-floating col-md-12 mt-3 mb-3">
          <select class="form-select" name="gender" id="gender" aria-label="Floating label select example" required>
            <option disabled selected></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
           
          </select>
          <label for="type">Gender:</label>
    </div>

    <div class="form-floating col-md-12 mt-3 mb-3">
          <select class="form-select" name="accountType" id="accountType" aria-label="Floating label select example" required>
            <option disabled selected></option>
            <option value="hrm">HRM</option>
            <option value="finance">Finance</option>
            <option value="library">Librarist</option>
            <option value="registerar">Registerar</option>
          </select>
          <label for="type">Account Type:</label>
    </div>

    <div class="form-floating mb-3">
          <input type="file" class="form-control" id="document" name="document" placeholder="Enter Instructor Document" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Instructor Document" required>
          <label for="floatingInput">Officer Document</label>
    </div>


    <div class="row mb-3 mt-3">
      <div class="col-sm-10 text-center">
        <button type="submit" class="btn btn-primary" name="register" >Add</button>
        <button type="reset" class="btn btn-danger">Clear</button>
      </div>
    </div>

</form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php');?>
  <!-- Template Main JS File --> 
    <script src="assets/js/main.js"></script>
<?php
function test_input($data) {
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
</body>

</html>