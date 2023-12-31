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
          <li class="breadcrumb-item active">Assign Course</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fill Course Information Below</h5>
              <!--Begin the validation states--->
<?php 
      
      $id = $_GET['id'];  
      $studentName = $_GET['studentName'];
      $studentId = $_GET['studentId'];
      $school = $_GET['school'];
      $department = $_GET['department'];
      $year = $_GET['year'];
      $semister = $_GET['semister'];
      $program = $_GET['program'];
      $section = $_GET['section'];
      $courseTitle = $_GET['courseTitle'];
      $courseCode = $_GET['courseCode'];
      $query = mysqli_query($conn, "SELECT * FROM grade WHERE id = '$id' and instructor_id = '$session_id'") or die(mysqli_error($conn));
      $row = mysqli_fetch_array($query);
      $quiz = $row['quiz'];
      $assignment = $row['assignment'];
      $practice = $row['practice'];
      $midExam = $row['mid_exam'];
      $final = $row['final'];

if (isset($_POST['save'])) {   
  
    $save = "save";
    $quiz = $_POST['quiz'];
    $midExam = $_POST['midExam'];
    $practice = $_POST['practice'];
    $assignment = $_POST['assignment'];
    $final = $_POST['final'];
    if($quiz == '') {
      $quiz = 0;
    }
    if($midExam == '') {
      $midExam = 0;
    }
    if($practice == '') {
      $practice = 0;
    }
    if($assignment == '') {
      $assignment = 0;
    }
    if($final == '') {
      $final = 0;
    }
    $total = $quiz + $midExam + $practice + $final + $assignment;

    $queryAssignedCourse = mysqli_query($conn, "SELECT * FROM assigned_course WHERE year = '$year' and semister = '$semister' and program = '$program' and department = '$department' and course_title = '$courseTitle' and section = '$section'") or die(mysqli_error($conn));

    while($row = mysqli_fetch_assoc($queryAssignedCourse)) {
      $quizWeight = $row['quiz_weight'];
      $midExamWeight = $row['mid_exam_weight'];
      $assignmentWeight = $row['assignment_weight'];
      $practiceWeight = $row['practice_weight'];
      $finalWeight = $row['final_weight'];

    }
    
    if ($quiz > $quizWeight) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed, Quiz result is greater than quiz weight, please try again!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }

    elseif ($midExam > $midExamWeight) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed, Mid Exam result is greater than Mid Exam weight, please try again!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }

    elseif ($practice > $practiceWeight) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed, practice result is greater than practice weight, please try again!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }

    elseif ($assignment > $assignmentWeight) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed, assignment result is greater than assignment weight, please try again!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }

    elseif ($final > $finalWeight) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed, final result is greater than final weight, please try again!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }
    else{ 

      $sql = mysqli_query($conn, "UPDATE grade SET quiz = '$quiz', assignment = '$assignment', mid_exam = '$midExam', practice = '$practice', final = '$final', total = '$total'") or die(mysqli_error($conn));

       if($sql == true) {

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Successfully Updated student grade!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
       }
       else {

        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed to update grade, please try again!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
       }
       

     
        }}?>

<form action="#" method="post"  enctype="multipart/form-data">

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="studentName" name="studentName"
          value="<?php echo $studentName;?>" readonly>
          <label for="floatingInput">Student Full Name</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="studentId" name="studentId"
          value="<?php echo $studentId;?>" readonly>
          <label for="floatingInput">Student Id</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="assignment" name="assignment" placeholder="Assignment Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Assignment Result here" value="<?php echo $assignment;?>">
          <label for="floatingInput">Assignment Result</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="quiz" name="quiz" placeholder="Quiz Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Quiz Result here" value="<?php echo $quiz;?>">
          <label for="floatingInput">Quiz Result</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="midExam" name="midExam" placeholder="Mid Exam Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Mid Exam Result here" value="<?php echo $midExam;?>">
          <label for="floatingInput">Mid Exam Result</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="practice" name="practice" placeholder="Practice Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Practice Result here" value="<?php echo $practice;?>">
          <label for="floatingInput">Practice Result</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="final" name="final" placeholder="Final Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Final Result here" value="<?php echo $final;?>">
          <label for="floatingInput">Final Exam Result</label>
        </div> 

    <div class="row mb-3 mt-3">
      <div class="col-sm-10 text-center">
        <button type="submit" class="btn btn-primary" name="save" >Save</button>
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
</body>

</html>