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
              <h5 class="card-title">Fill Information Below</h5>
              <!--Begin the validation states--->
<?php

if (isset($_POST['register'])) {   
            
    $bookName = test_input($_POST['bookName']);
    $bookCode = test_input(ucfirst($_POST['bookCode']));
    $studentName = test_input(ucfirst($_POST['studentName']));
    $phone = test_input($_POST['phone']);
    $studentId = test_input($_POST['studentId']);
    $returnDate = test_input($_POST['returnDate']);
    $borrowedOn = date('Y-m-d');


//check if name contains letter and space

 if (!preg_match("/^[a-zA-Z-' ]*$/",$studentName)) {
                          
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle-fill me-1"></i>
        <strong>Failed! </strong>Only letters and white space allowed for name!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }



//check if the student borrowed 2 or more books before

    elseif(mysqli_num_rows(mysqli_query($conn,"select * from book where student_id ='$studentId' and status = 'borrowed'")) >= 2)  {
            
                                       
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            This is student borrowed 2 or more books before !!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

    elseif(mysqli_num_rows(mysqli_query($conn,"select * from book where book_code ='$bookCode' and status = 'borrowed'")) >= 1)  {
            
                                       
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            This book code is borrowed before and didn\'t returned!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

    elseif($phone < 10) {
              echo '<div class="alert alert-danger alert-dismissible fade show">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              Phone Number length must be equal to 10</div>';
        }
               
    else {


      $qry  = mysqli_query($conn,"insert into book( book_name,book_code,student_name,student_id,student_phone,borrowed_on,return_date) values('$bookName','$bookCode','$studentName','$studentId','$phone','$borrowedOn','$returnDate')")or die(mysqli_error($conn));

      if ($qry == true) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-1"></i>
      Borrowed  '. $bookName. ' for '.$studentName.' successfully!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
      }
      else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-1"></i>
      Borrowing  '. $bookName. ' for '.$studentName.' is not successful!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
      }

?>
                          
          <?php  }}  ?>

<form action="#" method="post"  enctype="multipart/form-data">
    
    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="bookName" name="bookName" placeholder="Enter book name here" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter book name here" required="">
          <label for="floatingInput">Book Name</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="bookCode" name="bookCode" placeholder="Enter book code" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter book code here" required="">
          <label for="floatingInput">Book Code</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Enter Student Name" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Student Name here" required="">
          <label for="floatingInput">Student Full Name</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="studentId" name="studentId" placeholder="Enter Student Id" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Student Id" required="">
          <label for="floatingInput">Student Id</label>
        </div>

    <div class="form-floating mb-3">
          <input type="number" class="form-control" id="phone" name="phone" placeholder="0987654321" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Student Phone Number here" required="">
          <label for="floatingInput">Phone Number</label>
        </div>

    <h5 class="card-title">Return Date</h5>

 <div class="form-floating mb-3">
                      <select class="form-select" name="returnDate" id="returnDate" aria-label="Floating label select example" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Selet returning date from the list" required>
                        <option disabled selected></option>
                        <option value="<?php $d = strtotime("+1 Weeks");     
                        echo date("Y-m-d", $d); ?>">1 week later</option>
                        <option value="<?php $d = strtotime("+2 Weeks");     
                        echo date("Y-m-d", $d); ?>">2 week later</option>
                        <option value="<?php $d = strtotime("+1 Months");     
                        echo date("Y-m-d", $d); ?>">1 Month later</option>
                        <option value="<?php $d = strtotime("+2 Months");     
                        echo date("Y-m-d", $d); ?>">2 Month later</option>
                        <option value="<?php $d = strtotime("+5 Months");     
                        echo date("Y-m-d", $d); ?>">5 Month later</option>
                      </select>
                      <label for="type">Return On:</label>
    </div>

    <div class="row mb-3 mt-3">
      <div class="col-sm-10 text-center">
        <button type="submit" class="btn btn-primary" name="register" >Borrow</button>
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