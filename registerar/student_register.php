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
          <li class="breadcrumb-item"><a href="approve_grade.php">grade</a></li>
          <li class="breadcrumb-item active">approve</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
      <div class="row">
        <div class="col-xl-10">
          <div class="card">
            <div class="card-body pt-3">
              <?php
      $id = $_GET['ID'];
      $result = mysqli_query($conn, "SELECT * FROM student where student_id='$id'") or die(mysqli_error());

      $data = mysqli_fetch_array($result);
      $firstName = $data["first_name"];
      $middleName = $data['middle_name'];
      $studentId = $data['student_id'];
      $school = $data['school'];
      $department = $data['department'];
      $program = $data['program'];
      $semisterNumber = $data['semister_number'];
      $nextSemister = $semisterNumber + 1;

      $query = mysqli_query($conn, "SELECT * FROM courses WHERE semister_number = '$nextSemister'") or die(mysqli_error($conn));
      $registrationPrice = 0;
      while($row = mysqli_fetch_array($query)) { 
      $year = $row['year'];
      $semister = $row['semister'];
      $coursePrice = $row['course_price'];
      $registrationPrice += $coursePrice;
      }    

      if(isset($_POST['register'])) {
        
        $query = mysqli_query($conn, "UPDATE student set year = 
        '$year', semister = '$semister', semister_number = '$nextSemister', semister_status = 'registered' where student_id = '$id'") or die(mysqli_error($conn));
        
        if ($query == true) {

          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Success! </strong>Student has been registered successfully !!              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else {

          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Failed! </strong>to register student!!              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        
        }
      
?>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Student Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $firstName. " ". $middleName; ?> </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Student Id</div>
                    <div class="col-lg-9 col-md-8"><?php echo $studentId; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">School</div>
                    <div class="col-lg-9 col-md-8"><?php echo $school; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Department</div>
                    <div class="col-lg-9 col-md-8"><?php echo $department; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Program</div>
                    <div class="col-lg-9 col-md-8"><?php echo $program; ?></div>
                  </div>
              <h5 class="card-title">Register For</h5>
                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Year</div>
                    <div class="col-lg-9 col-md-8"><?php echo $year; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Semister</div>
                    <div class="col-lg-9 col-md-8"><?php echo $semister; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Registration Price</div>
                    <div class="col-lg-9 col-md-8"><?php echo $registrationPrice; ?></div>
                  </div>


                  <form action="#" method="post">               

                      <button type="submit" class="btn btn-primary" name="register" >Register</button>
                      <a href="register_student.php" class="btn btn-dark">Back</a>
                  </form>

                 </div>
                </div>
                </div>
               </div>
              </div><!-- End Bordered Tabs -->
             </div>
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