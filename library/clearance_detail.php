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
          <li class="breadcrumb-item active">Borrow_Books</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Is this book returned?</h5>
              <!--Begin the validation states--->
<?php

if (isset($_POST['clear'])) {   
    $id = $_GET['ID'];       
    $library = $_POST['library'];
    $studentName = $_POST['studentName'];
    $status = "clear";
    



      $qry  = mysqli_query($conn,"UPDATE clearance SET library = '$status' WHERE id = '$id' ")or die(mysqli_error($conn));

      if ($qry == true) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-1"></i>
      Student  '. $studentName. ' cleared successfully!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
      }
      else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-1"></i>
      Failed to clear student, Please try again!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
      }

}  ?>

<form action="#" method="post"  enctype="multipart/form-data">
    
    <?php 
      $studentName = $studentId = $school = $department = $library = "";
      $id = $_GET['ID'];

      $query = mysqli_query($conn, "SELECT * FROM clearance WHERE id = '$id'");
      $row = mysqli_fetch_assoc($query);
      $studentName = $row['student_name'];
      $studentId = $row['student_id'];
      $school = $row['school'];
      $department = $row['department'];
      $library = $row['library'];

    ?>

    <div class="form-floating mb-3">
      <h5 class="card-title">Student Name</h5>
          <input type="text" class="form-control" id="studentName" name="studentName"value = "<?php echo $studentName;?>"readonly>
        </div>

    <div class="form-floating mb-3">
      <h5 class="card-title">Student Id</h5>
          <input type="text" class="form-control" id="studentId" name="studentId" value = "<?php echo $studentId;?>"readonly>
        </div>

    <div class="form-floating mb-3">
      <h5 class="card-title">Department</h5>
          <input type="text" class="form-control" id="department" name="department" value = "<?php echo $department;?>"readonly>
        </div>

    <div class="form-floating mb-3">
      <h5 class="card-title">School</h5>
          <input type="text" class="form-control" id="school" name="school" value = "<?php echo $school;?>"readonly>
        </div>

    <div class="form-floating mb-3">
      <h5 class="card-title">Library Status</h5>
          <input type="text" class="form-control" id="library" name="library" value = "<?php echo $library;?>"readonly>
        </div>

    <div class="row mb-3 mt-3">
      <div class="col-sm-10 text-center">
        
        <input type="submit" value="Clear" class="btn btn-success" name="clear" >
        <a href="clearance.php" class="btn btn-danger">Back</a>
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