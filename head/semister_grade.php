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

if (isset($_POST['save'])) {   
  
    $save = "save";
    $quiz = $_POST['quiz'];
    $midExam = $_POST['midExam'];
    $practice = $_POST['practice'];
    $assignment = $_POST['price'];
    $final = $_POST['final'];
    $total = $quiz + $midExam + $practice + $final + $assignment;

    $queryAssignedCourse = mysqli_query($conn, "SELECT * FROM assigned_course WHERE year = '$year' and semister = '$semister' and program = '$program' and department = '$department' and course_title = '$courseTitle' and section = '$section'") or die(mysqli_error($conn));

    while($row = mysqli_fetch_assoc($queryAssignedCourse)) {
      $quizWeight = $row['quiz_weight'];
      $midExamWeight = $row['mid_exam_weight'];
      $assignmentWeight = $row['assignment_weight'];
      $practiceWeight = $row['practice_weight'];
      $finalWeight = $row['final_weight'];

    }

    $queryAssignedCourse = mysqli_query($conn, "SELECT * FROM grade WHERE year = '$year' and semister = '$semister' and program = '$program' and department = '$department' and course_title = '$courseTitle' and section = '$section' and student_name = '$studentName' and student_id = '$studentId'") or die(mysqli_error($conn));

    $queryNumRow = mysqli_num_rows($queryAssignedCourse);


    if ($queryNumRow > 0) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed, This student grade already exists with this course, please check updating the grade!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }

    elseif ($quiz > $quizWeight) {
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

      $sql = mysqli_query($conn, "INSERT INTO grade (student_name, student_id,school, department, year, semister, program, section, course_title, course_code, assignment, quiz, practice, mid_exam, final, total, instructor_id,instructor) VALUES ('$studentName','$studentId','$school','$department','$year','$semister','$program','$section','$courseTitle','$courseCode','$assignment','$quiz','$practice','$midExam','$final','$total','$session_id','$save')") or die(mysqli_error($conn));

       if($sql == true) {

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Successfully Assigned '.$courseTitle. ' course to '.$department.' department section '.$section.'!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
       }
       else {

        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed to assign course, please try again!!
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
          <input type="text" class="form-control" id="assignment" name="assignment" placeholder="Assignment Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Assignment Result here">
          <label for="floatingInput">Assignment Result</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="quiz" name="quiz" placeholder="Quiz Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Quiz Result here">
          <label for="floatingInput">Quiz Result</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="midExam" name="midExam" placeholder="Mid Exam Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Mid Exam Result here">
          <label for="floatingInput">Mid Exam Result</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="practice" name="practice" placeholder="Practice Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Practice Result here">
          <label for="floatingInput">Practice Result</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="final" name="final" placeholder="Final Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Final Result here">
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