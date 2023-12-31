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
          <li class="breadcrumb-item">Account</li>
          <li class="breadcrumb-item active">Status</li>
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
              $result = mysqli_query($conn,"SELECT * FROM users_account where user_id='$id'") or die(mysqli_error($conn)); 
              $data = mysqli_fetch_array($result);
                        $fname = ucfirst($data["first_name"]);
                        $lname = ucfirst($data["last_name"]);
                        $studid=$data["user_id"];
                        $pic = $data['profile_pic'];
                        $e_mail=$data["email"];
                        $connection = @fsockopen('www.google.com',80);


if(isset($_POST['active'])){


                  $message = "Dear $fname $lname your Sodo City TVET LMS  Account has been Activated.<br>
                   Please don't replay to this email!!!!!";
                  $subject="Sodo City TVET LMS"; 
                  $headers = 'From: sodocityrta@gmail.com'. "\r\n". 'MIME-Version: 1.0'. "\r\n" . 'Content-type: text/html; charset=utf-8';
                  $mail = mail($e_mail, $subject, $message,$headers);
                /*  if (!$connection) {

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-wifi-off me-1"></i>You have no internet connection!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        }
                  elseif ($mail == true) {*/
                     $dt = "Active";
                    mysqli_query($conn,"update users_account set account_status = '$dt'  where user_id = '$id'")or die(mysqli_error($conn));
                   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle-fill me-1"></i>
                      This Account has been Activated
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                 /* }else {
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-x-octagon-fill me-1"></i>
                  Failed to activate account and send email!!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                  }  */
                  }
  else if(isset($_POST['deactive'])){

              $message = "Dear $fname $lname your Sodo City TVET LMS Account has been De-Activated.<br>
                   If your have any question please contact the administrator.<br>
                   Please don't replay to this email!!!!!";
                   $subject="Sodo City Vehicle Registration"; 
                   $headers = 'From: sodocityrta@gmail.com'. "\r\n". 'MIME-Version: 1.0'. "\r\n" . 'Content-type: text/html; charset=utf-8';
                  $mail = mail($e_mail, $subject, $message,$headers);
                  /*if (!$connection) {

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-wifi-off me-1"></i>You have no internet connection!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        }
                  elseif ($mail == true) {*/
                    $dt = "De-Active";
                  mysqli_query($conn,"update users_Account set account_status = '$dt'  where user_id = '$id'")or die(mysqli_error($conn));

                echo '<div class="alert alert-success alert-dismissible fade show">
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  This Account has been De-Activated</div>';
                  /*}else {
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  Failed to de-activate account and send email!!</div>';
                  }*/
              }             
              ?>
  <form method="post" action="#" class="was-validated" enctype="multipart/form-data">
                
           <center> <h4 class="text-danger alert-info p-3 rounded"><i class="fa fa-microphone"></i> Set Account Status</h4></center></div>

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
<?php 
                  $run = mysqli_query($conn,"select * from users_account where user_id = '$studid'" ) or die(mysqli_error());
                        $row = mysqli_fetch_array($run);
                        $mail=$row['email'];
                        $subject="SODO CITY TVET LMS"; 
                         $status=$row['account_status'];
                    $Active="Active";
                    $deactive="De-Active";
                
                if($status==$Active){
                    echo' <input type="submit" name="deactive" value="De-Activate" class="btn btn-danger mt-3">';
                  }
                else if($status==$deactive){
                    echo' <input type="submit" name="active" value="Activate" class="btn btn-success mt-3">';
                  } 
                    ?>

  <a type="button" class="btn btn-primary mt-3" href="activate_officer.php">Cancel</a>
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