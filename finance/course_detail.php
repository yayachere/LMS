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
  <!-- ======= Sidebar ======= -->
  <!-- End Sidebar-->
<?php include('sidebar.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Courses</li>
          <li class="breadcrumb-item active">Course_detail</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
  

        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">


<?php
 include('../dbcon.php');
                  
        if(isset($_POST['edit'])) {

          $coursePrice = $_POST['coursePrice'];
          $id = $_POST['id'];
          $department = $_POST['department'];

          $query = mysqli_query($conn,"UPDATE courses SET course_price = '$coursePrice' where id = '$id'") or die(mysqli_error($conn));

          if ($query == true) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                            <strong>Success!</strong> Price Updated Successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
          }
          else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                            <strong>Failed!</strong> Course Price isn\'t Updated!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
          }
        }
                                               
?>
              <form method="post" action="#" class="row g-3">
                <?php

                  $school = $_GET['school'];
                    $department = $_GET['department'];
                    $program = $_GET['program'];
                    $year = $_GET['year'];
                    $semister = $_GET['semister'];

                    $querys = mysqli_query($conn,"SELECT * FROM courses where program = '$program' and year = '$year' and semister = '$semister'") or die(mysqli_error($conn));
                    while($rows = mysqli_fetch_array($querys)) {
                        $id=$rows['id']; 
                        $courseTitle = $rows['course_title'];
                        $courseCode = $rows['course_code'];
                        $coursePrice = $rows['course_price'];

                ?>
                
                <h5 class="card-title">Course Title:</h5>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="courseTitle" name="courseTitle"value="<?php echo $courseTitle; ?>" readonly>
                  </div>
                </div>

                <h5 class="card-title">Course Code:</h5>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="courseCoe" name="courseCode" value="<?php echo $courseCode; ?>" readonly>
                  </div>
                </div>

                <h5 class="card-title">Course Price:</h5>
                <div class="col-md-12 mb-1">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="coursePrice" name="coursePrice"  value="<?php echo $coursePrice; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id"  value="<?php echo $id; ?>">
                    <input type="hidden" class="form-control" id="department" name="department"  value="<?php echo $department; ?>">
                  </div>
                </div>
                <hr class="bg-success pt-1">
              <?php } ?>
    <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="edit">Update Price</button>
                  <a href="courses.php" class="btn btn-danger" name="cancel">Back</a>
                </div>
              </form>
            </div>
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