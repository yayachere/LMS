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
      $result = mysqli_query($conn, "SELECT * FROM grade where id='$id'") or die(mysqli_error());

      $data = mysqli_fetch_array($result);
      $studentName = $data["student_name"];
      $studentId = $data['student_id'];
      $school = $data['school'];
      $department = $data['department'];
      $year = $data['year'];
      $semister = $data['semister'];
      $program = $data['program'];
      $courseTitle = $data['course_title'];
      $courseCode = $data['course_code'];
      $assignment = $data['assignment'];
      $quiz = $data['quiz'];
      $practice = $data['practice'];
      $midExam = $data['mid_exam'];
      $final = $data['final'];
      $total = $data['total'];
      $creditHour = $data['credit_hour'];

      if(isset($_POST['approve'])) {

        $decision = $_POST['decision'];

        if ($decision == 'approved') {
          
          if ($total < 35) {
            $grade = 'F';
          }
          elseif ($total < 40) {
            $grade = 'FX';
          }
          elseif ($total < 45) {
            $grade = 'D';
          }
          elseif ($total < 50) {
            $grade = 'C-';
          }
          elseif ($total < 60) {
            $grade = 'C';
          }
          elseif ($total < 65) {
            $grade = 'C+';
          }
          elseif ($total < 70) {
            $grade = 'B-';
          }
          elseif ($total < 75) {
            $grade = 'B';
          }
          elseif ($total < 80) {
            $grade = 'B+';
          }
          elseif ($total < 85) {
            $grade = 'A-';
          }
          elseif ($total < 90) {
            $grade = 'A';
          }
          else {
            $grade = 'A+';
          }

          switch ($grade) {
            case 'A+':
            case 'A':
              $gradePoint = $creditHour * 4;
              break;

            case 'A-':
              $gradePoint = $creditHour * 3.75;
              break;

            case 'B+':
              $gradePoint = $creditHour * 3.5;
              break;

            case 'B':
              $gradePoint = $creditHour * 3;
              break;

            case 'B-':
              $gradePoint = $creditHour * 2.75;
              break;

            case 'C+':
              $gradePoint = $creditHour * 2.5;
              break;

            case 'C':
              $gradePoint = $creditHour * 2;
              break;

            case 'C-':
              $gradePoint = $creditHour * 1.75;
              break;

            case 'D':
              $gradePoint = $creditHour * 1.5;
              break;
            
            default:
              $gradePoint = '';
              break;
          }
        
        $query = mysqli_query($conn, "UPDATE grade set head = 
        '$decision', grade = '$grade',grade_point = '$gradePoint' where id = '$id'") or die(mysqli_error($conn));
        
        if ($query == true) {

          $querySemister = mysqli_query($conn, "SELECT * FROM grade where student_id = '$studentId' and head = 'pending' and year = '$year' and semister = '$semister'") or die(mysqli_error($conn));
          $numRow = mysqli_num_rows($querySemister);

          if (!$numRow > 0) {
            mysqli_query($conn, "UPDATE student SET semister_status = 'approved' where student_id = '$studentId'") or die(mysqli_error($conn));
          }

          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Success! </strong>Student grade has been '.$decision.'!!              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else {

          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Failed! </strong> Student grade isn\'t '.$decision.'!!              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        
        }else {
          
          $query = mysqli_query($conn, "UPDATE grade set head = 
        '$decision' where id = '$id'") or die(mysqli_error($conn));
        
        if ($query == true) {

          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Success! </strong>Student grade has been '.$decision.'!!              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else {

          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Failed! </strong>Student grade isn\'t '.$decision.'!!              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        }
      }
?>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Student Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $studentName ?> </div>
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
      
                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Year</div>
                    <div class="col-lg-9 col-md-8"><?php echo $year; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Semister</div>
                    <div class="col-lg-9 col-md-8"><?php echo $semister; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Course Title</div>
                    <div class="col-lg-9 col-md-8"><?php echo $courseTitle; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Course Code</div>
                    <div class="col-lg-9 col-md-8"><?php echo $courseCode; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Assignment</div>
                    <div class="col-lg-9 col-md-8"><?php echo $assignment; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Quiz</div>
                    <div class="col-lg-9 col-md-8"><?php echo $quiz; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Practice</div>
                    <div class="col-lg-9 col-md-8"><?php echo $practice; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Mid Exam</div>
                    <div class="col-lg-9 col-md-8"><?php echo $midExam; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Final Exam</div>
                    <div class="col-lg-9 col-md-8"><?php echo $final; ?></div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Total</div>
                    <div class="col-lg-9 col-md-8"><?php echo $total; ?></div>
                  </div>

                  <form action="#" method="post">
                    <div class="form-floating col-md-12 mt-3 mb-3">
                    <select class="form-select" name="decision" id="decision" aria-label="Floating label select example" required>
                      <option disabled selected></option>
                      <option value="approved">Approved</option>
                      <option value="declined">Declined</option>
                                        
                    </select>
                    <label for="type">Decision:</label>
              </div>

                      <button type="submit" class="btn btn-primary" name="approve" >Submit</button>
                      <a href="approve_grade.php" class="btn btn-dark">Back</a>
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