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
      
      $id = $_GET['ID'];
      $quizWeight = $practiceWeight = $midExamWeight = $assignmentWeight = $finalWeight = "";

      $queryAssignedInstructor = mysqli_query($conn, "SELECT * FROM assigned_course WHERE instructor_id = '$session_id' and id = '$id'") or die(mysqli_error($conn));

      while($row = mysqli_fetch_array($queryAssignedInstructor)) { 
      $courseTitle = $row['course_title'];
      $courseCode = $row['course_code'];
      $quizWeight = $row['quiz_weight'];
      $practiceWeight = $row['practice_weight'];
      $midExamWeight = $row['mid_exam_weight'];
      $assignmentWeight = $row['assignment_weight'];
      $finalWeight = $row['final_weight'];
      }
      

if (isset($_POST['submit'])) {   
  
    $save = "save";
    $quiz = $_POST['quiz'];
    $midExam = $_POST['midExam'];
    $practice = $_POST['practice'];
    $assignment = $_POST['assignment'];
    $final = $_POST['final'];
    $total = $quiz + $midExam + $practice + $assignment + $final;

    if($total != 100) {

      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Total mark weight must be equal to 100!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }

    else{ 

      $sql = mysqli_query($conn, "UPDATE assigned_course SET quiz_weight = '$quiz', mid_exam_weight = '$midExam', practice_weight = '$practice', assignment_weight = '$assignment', final_weight = '$final' WHERE instructor_id = '$session_id' and id = '$id'") or die(mysqli_error($conn));

       if($sql == true) {

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Successfully updated '.$courseTitle. ' mark!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
       }
       else {

        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed to update course mark, please try again!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
       }
       
      }
     
        }?>

<form action="#" method="post"  enctype="multipart/form-data">

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="studentName" name="studentName"
          value="<?php echo $courseTitle;?>" readonly>
          <label for="floatingInput">Course Title</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="studentId" name="studentId"
          value="<?php echo $courseCode;?>" readonly>
          <label for="floatingInput">Course Code</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="assignment" name="assignment" placeholder="Assignment Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Assignment Result here" value="<?php echo $assignmentWeight;?>">
          <label for="floatingInput">Assignment Weight</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="quiz" name="quiz" placeholder="Quiz Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Quiz Result here" value="<?php echo $quizWeight;?>">
          <label for="floatingInput">Quiz Weight</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="midExam" name="midExam" placeholder="Mid Exam Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Mid Exam Result here" value="<?php echo $midExamWeight;?>">
          <label for="floatingInput">Mid Exam Weight</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="practice" name="practice" placeholder="Practice Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Practice Result here" value="<?php echo $practiceWeight;?>">
          <label for="floatingInput">Practice Weight</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="final" name="final" placeholder="Final Result" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Final Result here" value="<?php echo $finalWeight;?>">
          <label for="floatingInput">Final Exam Weight</label>
        </div> 

    <div class="row mb-3 mt-3">
      <div class="col-sm-10 text-center">
        <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
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