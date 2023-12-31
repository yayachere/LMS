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
              <h5 class="card-title">Set Registration Status</h5>
              <!--Begin the validation states--->
<?php 

if (isset($_POST['register'])) {   
               
 $program = $_POST['program'];
 $registration = $_POST['registration'];

 $querySemister = mysqli_query($conn, "SELECT * FROM semister WHERE program = '$program'") or die(mysqli_error($conn));
 $row = mysqli_fetch_array($querySemister);
 $registrationStatus = $row['registration'];

       if($registration == $registrationStatus) {

        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-info-circle-fill me-1"></i>
              <strong>Failed! </strong>'.$program.' registration is already '.$registration.'!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                  }
      else { 
       $query = mysqli_query($conn, "UPDATE semister SET registration = '$registration' where program = '$program'") or die(mysqli_error($conn));
        
          if ($query == true) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-info-circle-fill me-1"></i>
              <strong>Success! </strong>'.$program. ' registration is now '.$registration.'!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                  
          }
          else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-info-circle-fill me-1"></i>
              <strong>Failed! </strong>Failed to '.$registration.' registration for '.$program.' students!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }
         }
 }  ?>

<form action="#" method="post"  enctype="multipart/form-data">

    <div class="form-floating col-md-12 mt-3 mb-3">
          <select class="form-select" name="program" id="program" aria-label="Floating label select example" required>
            <option disabled selected></option>
            <option value="regular">Regular</option>
            <option value="weekend">Weekend</option>
            <option value="night">Night</option>
            <option value="summer">Summer</option>
           
          </select>
          <label for="type">Program:</label>
    </div>

    <div class="form-floating col-md-12 mt-3 mb-3">
          <select class="form-select" name="registration" id="registration" aria-label="Floating label select example" required>
            <option disabled selected></option>
            <option value="open">Open</option>
            <option value="close">Close</option>
           
          </select>
          <label for="type">Registration Status:</label>
    </div>

    <div class="row mb-3 mt-3">
      <div class="col-sm-10 text-center">
        <button type="submit" class="btn btn-primary" name="register" >Submit</button>
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