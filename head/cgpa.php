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
          <li class="breadcrumb-item"><a href="gpa.php">grade</a></li>
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
      $qry = mysqli_query($conn, "SELECT * FROM instructor WHERE user_id = '$session_id'") or die(mysqli_error($conn));
      $rows = mysqli_fetch_assoc($qry);
      $school = $rows['school'];
      $department = $rows['department'];
      $studentName = $_GET['studentName'];
      $studentId = $_GET['studentId'];
      $program = $_GET['program'];
      $section = $_GET['section'];
      $year = $_GET['year'];
      $semister = $_GET['semister'];
      $semisterNumber = $_GET['semisterNumber'];
      $result = mysqli_query($conn, "SELECT * FROM grade where student_name='$studentName' and student_id = '$studentId' and program = '$program' and section = '$section' and year = '$year' and semister = '$semister'") or die(mysqli_error($conn));
       $semisterCreditHour = 0;
      $semisterGradePoint = 0;

?>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Grade Details</h5>
<?php 

      while($data = mysqli_fetch_array($result)) { 
      $courseTitle = $data['course_title'];
      $creditHour = $data['credit_hour'];
      $gradePoint = $data['grade_point'];
      $grade = $data['grade'];
      $semisterCreditHour += $creditHour;
      $semisterGradePoint += $gradePoint;
      ?>


                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Course Title</div>
                    <div class="col-lg-9 col-md-8"><?php echo $courseTitle; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Credit Hour</div>
                    <div class="col-lg-9 col-md-8"><?php echo $creditHour; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Grade Point</div>
                    <div class="col-lg-9 col-md-8"><?php echo $gradePoint; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Grade</div>
                    <div class="col-lg-9 col-md-8"><?php echo $grade; ?></div>
                  </div>
                  <hr>
<?php } ?>
                  <form action="#" method="post">
                    <input type="hidden" name="semisterGradePoint" value="<?php echo $semisterGradePoint;?>">
                    <input type="hidden" name="semisterCreditHour" value="<?php echo $semisterCreditHour;?>">
                      <button type="submit" class="btn btn-primary" name="approve" >Submit</button>
                      <a href="gpa.php" class="btn btn-dark">Back</a>
                  </form>
<?php

if(isset($_POST['approve'])) {

        
        $querys = mysqli_query($conn, "SELECT * FROM gpa where student_id = '$studentId'") or die(mysqli_error($conn));
        $row = mysqli_fetch_array($querys);
        $totalCreditHour = $row['total_credit_hour'];
        $totalGradePoint = $row['total_grade_point'];
        $totalGradePoint += $semisterGradePoint;
        $totalCreditHour += $semisterCreditHour;
        $sgpa = $semisterGradePoint / $semisterCreditHour;
        $cgpa = $totalGradePoint / $totalCreditHour;

        $checkExist = mysqli_query($conn, "SELECT * FROM gpa where student_id = '$studentId' and year = '$year' and semister = '$semister'") or die(mysqli_error($conn));
        $numRow = mysqli_num_rows($checkExist);

        if ($numRow > 0) {

          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Failed! </strong> gpa is already exists!!              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else { 
          $query = mysqli_query($conn, "INSERT INTO gpa(student_name, student_id, school, department, program, year, semister, semister_credit_hour, total_credit_hour, semister_grade_point, total_grade_point, sgpa, cgpa, semister_number) values ('$studentName', '$studentId', '$school', '$department', '$program', '$year', '$semister', '$semisterCreditHour', '$totalCreditHour', '$semisterGradePoint', '$totalGradePoint', '$sgpa', '$cgpa', '$semisterNumber')") or die(mysqli_error($conn));
          $semStatus = mysqli_query($conn, "UPDATE student SET semister_status = 'completed' where student_id = '$studentId'") or die(mysqli_error($conn));
        
        if ($query == true and $semStatus == true) {

          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Success! </strong>Student gpa has been successfully processed!!              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else {

          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Failed! </strong> Student gpa is failde to process!!              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
       } 
      }
?>
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