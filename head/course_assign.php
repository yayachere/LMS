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

      $school = $_GET['school'];
      $department = $_GET['department'];
      $year = $_GET['year'];
      $semister = $_GET['semister'];
      $program = $_GET['program'];

if (isset($_POST['register'])) {   
  
    $courseTitle = $_POST['courseTitle'];
    $queryCourseCode = mysqli_query($conn, "SELECT * FROM courses where course_title = '$courseTitle'") or die(mysqli_error($conn));
    $row= mysqli_fetch_array($queryCourseCode);
    $courseCode = $row['course_code'];
    $instructor = $_POST['instructor'];
    $section = $_POST['section'];

    $queryAssignedCourse = mysqli_query($conn, "SELECT * FROM assigned_course WHERE year = '$year' and semister = '$semister' and program = '$program' and department = '$department' and course_title = '$courseTitle' and section = '$section'") or die(mysqli_error($conn));
    $queryNumRow = mysqli_num_rows($queryAssignedCourse);


    if ($queryNumRow > 0) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed, This Course is already assigned for this section!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }
    else{ 

      $sql = mysqli_query($conn, "INSERT INTO assigned_course (school, department, year, semister, program, course_title, course_code, instructor, section) values ('$school','$department','$year','$semister','$program','$courseTitle','$courseCode','$instructor','$section')") or die(mysqli_error($conn));

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
     <?php 

      

     ?>
    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="school" name="school"
          value="<?php echo $school;?>" readonly>
          <label for="floatingInput">School</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="department" name="department"
          value="<?php echo $department;?>" readonly>
          <label for="floatingInput">Department</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="year" name="year"
          value="<?php echo $year;?>" readonly>
          <label for="floatingInput">Year</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="semister" name="semister"
          value="<?php echo $semister;?>" readonly>
          <label for="floatingInput">Semister</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="program" name="program"
          value="<?php echo $program;?>" readonly>
          <label for="floatingInput">Program</label>
        </div>
    
    <div class="form-floating col-md-12 mt-3 mb-3">
          <select class="form-select" name="courseTitle" id="courseTitle" aria-label="Floating label select example" required>
            <option disabled selected></option>
            <?php
              $sql = mysqli_query($conn, "SELECT * FROM courses where department = '$department' and year = '$year' and semister = '$semister' and program = '$program'") or die(mysqli_error($conn));
              while($row = mysqli_fetch_assoc($sql)) {
                $courseTitle = $row['course_title'];
            ?>
            <option value="<?php echo $courseTitle;?>"><?php echo $courseTitle;?></option>
            <?php }?>           
          </select>
          <label for="type">Course Title:</label>
    </div>

    <div class="form-floating col-md-12 mt-3 mb-3">
          <select class="form-select" name="instructor" id="instructor" aria-label="Floating label select example" required>
            <option disabled selected></option>
            <?php
              $sql = mysqli_query($conn, "SELECT * FROM instructor where department = '$department' and school = '$school'") or die(mysqli_error($conn));
              while($row = mysqli_fetch_assoc($sql)) {
                $firstName = $row['first_name'];
                $middleName = $row['middle_name'];
                $lastName = $row['last_name'];
                $fullName = $firstName. " ". $middleName. " ". $lastName;
            ?>
            <option value="<?php echo $fullName;?>"><?php echo $fullName;?></option>
            <?php }?>           
          </select>
          <label for="type">Instructor Name:</label>
    </div>

    <div class="form-floating col-md-12 mt-3 mb-3">
          <select class="form-select" name="section" id="section" aria-label="Floating label select example" required>
            <option disabled selected></option>
            <option value="1">Section 1</option>
            <option value="2">Section 2</option>
            <option value="3">Section 3</option>
            <option value="4">Section 4</option>
            <option value="5">Section 5</option>
          </select>
          <label for="type">Section:</label>
    </div>

  

    <div class="row mb-3 mt-3">
      <div class="col-sm-10 text-center">
        <button type="submit" class="btn btn-primary" name="register" >Assign</button>
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