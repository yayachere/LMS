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

if (isset($_POST['returned'])) {   
    $id = $_GET['ID'];       
    $bookName = test_input($_POST['bookName']);
    $bookCode = test_input(ucfirst($_POST['bookCode']));
    $studentName = test_input(ucfirst($_POST['studentName']));
    $phone = test_input($_POST['phone']);
    $studentId = test_input($_POST['studentId']);
    $returnDate = test_input($_POST['returnDate']);
    $borrowedOn = date('Y-m-d');
    $status = "returned";



      $qry  = mysqli_query($conn,"UPDATE book SET status = '$status' WHERE id = '$id' ")or die(mysqli_error($conn));

      if ($qry == true) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-1"></i>
      Student  '. $studentName. ' returned '.$bookName.' book successfully!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
      }
      else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-1"></i>
      Failed to return book, Please try again!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
      }

}  ?>

<form action="#" method="post"  enctype="multipart/form-data">
    
    <?php 
      $bookName = $bookCode = $studentName = $studentId = $phone = $borrowedOn = $returnDate = $status = "";
      $id = $_GET['ID'];

      $query = mysqli_query($conn, "SELECT * FROM book WHERE id = '$id'");
      $row = mysqli_fetch_assoc($query);
      $bookName = $row['book_name'];
      $bookCode = $row['book_code'];
      $studentName = $row['student_name'];
      $studentId = $row['student_id'];
      $phone = $row['student_phone'];
      $borrowedOn = $row['borrowed_on'];
      $returnDate = $row['return_date'];
      $status = $row['status'];

    ?>
    <div class="form-floating mb-3">
          <h5 class="card-title">Book Name</h5>
          <input type="text" class="form-control" id="bookName" name="bookName" value = "<?php echo $bookName;?>"readonly>
        </div>

    <div class="form-floating mb-3">
      <h5 class="card-title">Book Code</h5>
          <input type="text" class="form-control" id="bookCode" name="bookCode" value = "<?php echo $bookCode;?>"readonly>
        </div>

    <div class="form-floating mb-3">
      <h5 class="card-title">Student Name</h5>
          <input type="text" class="form-control" id="studentName" name="studentName"value = "<?php echo $studentName;?>"readonly>
        </div>

    <div class="form-floating mb-3">
      <h5 class="card-title">Student Id</h5>
          <input type="text" class="form-control" id="studentId" name="studentId" value = "<?php echo $studentId;?>"readonly>
        </div>

    <div class="form-floating mb-3">
      <h5 class="card-title">Student Phone</h5>
          <input type="number" class="form-control" id="phone" name="phone" value = "<?php echo $phone;?>"readonly>
        </div>

    <div class="form-floating mb-3">
      <h5 class="card-title">Borrowed On</h5>
          <input type="text" class="form-control" id="borrowedOn" name="borrowedOn" value = "<?php echo $borrowedOn;?>"readonly>
        </div>

    <div class="form-floating mb-3">
      <h5 class="card-title">Return Date</h5>
          <input type="text" class="form-control" id="returnDate" name="returnDate" value = "<?php echo $returnDate;?>"readonly>
        </div>

    <div class="form-floating mb-3">
      <h5 class="card-title">Borrowing Status</h5>
          <input type="text" class="form-control" id="status" name="status" value = "<?php echo $status;?>"readonly>
        </div>

    <div class="row mb-3 mt-3">
      <div class="col-sm-10 text-center">
        
        <input type="submit" value="Returned" class="btn btn-success" name="returned" >
        <a href="borrowed.php" class="btn btn-danger">Back</a>
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