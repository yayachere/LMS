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
          <li class="breadcrumb-item">SignUp</li>
          <li class="breadcrumb-item active">Details</li>
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
               
            
                    if (isset($_POST['register'])){ 
 
                  $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                  $str = str_shuffle($str);
                  $passwordd = substr($str, 0,10);
                  $pass=base64_encode($passwordd);
                  $password = md5($passwordd);
                  $stat="Active";
                  $connection = @fsockopen('www.google.com',80); 

                        $query=mysqli_query($conn,"select * from customer_signup where cust_id='$id'")or die(mysqli_error());
                                 $row=mysqli_fetch_array($query);
                              
                                 $fname = $row['fname'];
                                 $mname = $row['mname'];
                                 $lname = $row['lname'];
                                 $user_id = $fname. "".$id;
                                 $address = $row['address'];
                                 $status = $row['status'];                                 
                                 $email = $row['email'];
                                 $phone = $row['phone'];
                                 $gender = $row['gender'];
                                 $kebele_id = $row['kebele_id'];
                                 $age = $row['age'];
                                 $user_type = "customer";
                                 $about_me = "customer";
                                 $created_by = $session_id;
                                 if ($gender == "Female") {
                                   $pro_image = "../Uploads/women.png";
                                 }else {
                                  $pro_image = "../Uploads/male.png";
                                 }
                        $queryss = mysqli_query($conn,"SELECT * from users_account where user_id ='$user_id'");
                        
                        if (!$connection) {
                          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-wifi-off me-1"></i>
                            You have no internet connection!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                                }

                         elseif(mysqli_num_rows($queryss) >= 1)  {
                          echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                            There is an account for this user !!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';

                }else{
                                   
 $subject="Sodo City Vehicle Registration";
 $message = "Dear $fname $lname below is your username and password for sodo city vehicle registration system.<br><br>
 Your User Name : $user_id<br>  
Your Password : $passwordd<br><br>

Please use this information to login to sodo city vehicle registeration system !<br>

DON'T REPLY to this email";
$headers = 'From: sodocityrta@gmail.com'. "\r\n". 'MIME-Version: 1.0'. "\r\n" . 'Content-type: text/html; charset=utf-8';
 
// Send mail by PHP Mail Function
$mail = mail($email, $subject, $message,$headers);

            if (!$mail== true) {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                            Failed to create account Please check your connection!!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
            }
      

            else {
              
                    mysqli_query($conn,"INSERT INTO users_account( user_id,f_name,m_name,l_name,user_type,e_mail,phone_no,pro_image,about_me,password,status,created_by) values('$user_id','$fname','$mname','$lname','$user_type','$email','$phone','$pro_image','$about_me','$password','$stat','$created_by')")or die(mysqli_error($conn));
              mysqli_query($conn,"UPDATE customer_signup set status ='1' where cust_id ='$id'")or die(mysqli_error());
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-1"></i>
                            New '. $user_type. ' Account Created successfully!!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
            }

                }
                           
                    
              }
             if(isset($_POST['delete'])){
               $id = $_GET["ID"];
               $run = mysqli_query($conn,"select * from customer_signup where cust_id = '$id'" ) or die(mysqli_error());
                        $row = mysqli_fetch_array($run); 
                        $fname = $row['fname'];
                        $mname = $row['mname'];
                        $lname = $row['lname']; 
                        $email=$row['email'];
                        $connection = @fsockopen('www.google.com',80);
                        $subject="Sodo City Vehicle Registration"; 
                        $message = "Dear $fname $mname $lname your SignUp for Sodo City Vehicle registeration system is Rejected.<br>
                         It may happen because of your Kebele Identification card or your address.<br>
                        Please read signup rules or contact the cffice for more information.<br> 
                        Please don't replay to this email!!!!!";
                        $headers = 'From: sodocityrta@gmail.com'. "\r\n". 'MIME-Version: 1.0'. "\r\n" . 'Content-type: text/html; charset=utf-8';
                        $mail = mail($email, $subject, $message,$headers);
               if (!$connection) {
                          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-wifi-off me-1"></i>
                            You have no internet connection!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                                }         
               elseif ($mail == true) {
                    mysqli_query($conn,"DELETE from customer_signup where cust_id='$id'")or die(mysqli_error());
                
                   echo' <meta content="2;signup.php" http-equiv="refresh" />';
                   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle-fill me-1"></i>
                      The request has been rejected!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }else {

                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                            Failed to reject signup request! Check your connection and try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                }

                
              }
?>
                      <?php 
                                $query=mysqli_query($conn,"select * from customer_signup where cust_id='$id'")or die(mysqli_error());
                                 $row=mysqli_fetch_array($query);
                              
                                 $fname = $row['fname'];
                                 $mname = $row['mname'];
                                 $lname = $row['lname'];
                                 $user_id = $fname. "".$id;
                                 $address = $row['address'];
                                 $status = $row['status'];
                                 if ($status == 0) {
                                   $status = "Deactive";
                                 }else{
                                   $status = "Active";
                                 }
                                 $email = $row['email'];
                                 $phone = $row['phone'];
                                 $gender = $row['gender'];
                                 $kebele_id = $row['kebele_id'];
                                 $age = $row['age'];
                                 
                                 
                                 
                                ?> 

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $fname. " ". $mname. " ". $lname; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $address; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $status; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $phone; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $email; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Age</div>
                    <div class="col-lg-9 col-md-8"><?php echo $age; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8"><?php echo $gender; ?></div>
                  </div>
                  <div class="row">
                    
              
                    <div class="col-lg-3 col-md-4 label">Kebele_Id</div>
                    <div class="col-lg-9 col-md-8"><a type="button" data-bs-toggle="modal" data-bs-target="#imagemodal">
              <img src="../Uploads/<?php echo $kebele_id; ?>" alt="Profile" width= "200" height="200"></a></div>
                  </div>
                       
  <button type="submit" class="btn btn-success mt-4"name="register" id="register" >Add
  <img src="../Loading _helpintopc.gif" class="loader1" style="display: none;width: 15px">
  </button>
  <button type="submit" class="btn btn-danger mt-4" name="delete" id="delete" >Delete
    <img src="../Loading _helpintopc.gif" class="loader2" style="display: none;width: 15px">
  </button>
                                       
                         </form>
                         <div class="modal fade" id="imagemodal" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Kebele Id Card</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-dark">
                      <center><img src="../Uploads/<?php echo $kebele_id; ?>" alt="Profile" align= "center" ></center>
                    </div>
                
                  </div>
                </div>
              </div><!-- End Full Screen Modal-->

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