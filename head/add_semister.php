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
          <li class="breadcrumb-item active">Add Semister</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fill Semister Information Below</h5>
              <!--Begin the validation states--->
<?php 

if (isset($_POST['register'])) {   
            
    $year = $_POST['year'];
    $semister = $_POST['semister'];
    $department = $_POST['department'];
    $school = $_POST['school'];
    $program = $_POST['program'];

     $ab = mysqli_query($conn,"SELECT * FROM semister where school = '$school' and department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      } 
                      $id+= 1;   
    $semisterNumber = $id;
               
    $querySemister = mysqli_query($conn, "SELECT * FROM semister WHERE department = '$department' and year = '$year' and semister = '$semister' and program = '$program'") or die(mysqli_error($conn));
    $semisterNumRow = mysqli_num_rows($querySemister);


    if ($semisterNumRow >=1) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed this semister already exists!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }
    else{    

      $insertSemister = mysqli_query($conn,"insert into semister(school,department,year,semister,program,semister_number) values('$school','$department','$year','$semister','$program','$semisterNumber')")or die(mysqli_error($conn));

      if ($insertSemister == true) {

          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Semister '. $semister. ' year '.$year. ' Added successfully to '.$department.' department!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
              }

      else {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed to create new semister!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }

        }}?>

<form action="#" method="post"  enctype="multipart/form-data">
     <?php 

      $queryId = mysqli_query($conn,"SELECT * FROM instructor WHERE user_id = '$session_id'") or die(mysqli_error($conn));
      $row = mysqli_fetch_array($queryId);
      $department = $row['department'];
      $school = $row['school'];

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
          <input type="number" class="form-control" id="year" name="year" placeholder="year" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter year here" required="">
          <label for="floatingInput">Year</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="semister" name="semister" placeholder="semister" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter semister here" required="">
          <label for="floatingInput">Semister</label>
        </div>

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

    <div class="row mb-3 mt-3">
      <div class="col-sm-10 text-center">
        <button type="submit" class="btn btn-primary" name="register" >Add</button>
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