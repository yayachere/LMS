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
              <h5 class="card-title">Are you sure you want to delete this course</h5>
              <!--Begin the validation states--->
<?php 

      $school = $_GET['school'];
      $department = $_GET['department'];
      $year = $_GET['year'];
      $semister = $_GET['semister'];
      $program = $_GET['program'];
      $id = $_GET['ID'];

if (isset($_POST['register'])) {   

      $sql = mysqli_query($conn, "DELETE FROM semister WHERE id = '$id'") or die(mysqli_error($conn));

       if($sql == true) {
        
        echo' <meta content="2;delete_semister.php" http-equiv="refresh" />';
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Successfully deleted semister from '.$department.' department!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
       }
       else {

        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            Failed to delete semister, please try again!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
       }

     
        }?>

<form action="#" method="post"  enctype="multipart/form-data">

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

    <div class="row mb-3 mt-3">
      <div class="col-sm-10 text-center">
        <button type="submit" class="btn btn-danger" name="register" >Delete</button>
        <a href="delete_semister.php" class="btn btn-dark">Back</a>
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