<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
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
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
 <?php include('sidebar.php');?>
  <main id="main" class="main">
<div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Registration</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="overflow-x: auto;">
            <div class="card-body">
              <h5 class="card-title">Course Table</h5>
              
              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr>
                    <th >Course Title</th>
                    <th >Course Code</th>
                    <th >Credit Hour</th>
                    <th >Course Price</th>                          
                  </tr>
                </thead>
                <tbody>
    <?php
          $querys = mysqli_query($conn,"SELECT * FROM student WHERE student_id = 
            '$session_id' and semister_status = 'completed'") or die(mysqli_error($conn));
          $rows = mysqli_fetch_assoc($querys);
          $school = $rows['school'];
          $department = $rows['department'];
          $program = $rows['program'];
          $thisSemister = $rows['semister_number'];
          $nextSemister = $thisSemister + 1;
          $prefix = "LMS";
          $tx_ref = $prefix . '_' . bin2hex(random_bytes(5)) . '_' .  date('d-m-y_h-i-s');

          $query = mysqli_query($conn, "SELECT * FROM courses WHERE school = '$school' and department = '$department' and program = '$program' and semister_number = '$nextSemister'") or die(mysqli_error($conn));
          $countCourse = 0;
          $totalCreditHour = 0;
          $totalPrice = 0;

          while($row = mysqli_fetch_array($query)) { 
          $countCourse++;
          $courseTitle = $row['course_title'];
          $courseCode = $row['course_code'];
          $creditHour = $row['credit_hour'];
          $coursePrice = $row['course_price'];
          $totalCreditHour += $creditHour;
          $totalPrice += $coursePrice; 
    ?>
                <tr>
                    <td><?php echo $courseTitle;?></td>
                    <td><?php echo $courseCode;?></td>
                    <td><?php echo $creditHour;?></td>
                    <td class="center"><?php echo $coursePrice;?></td>
                </tr> <?php } ?>
                </tbody>
                <tfooter>
                  <tr class="bg-dark text-light">
                    <th >No. of Courses <?php echo $countCourse;?></th>
                    <th >Total Credit Hour <?php echo $totalCreditHour;?></th>
                    <th >Total Price <?php echo $totalPrice;?></th>
                    <th ><center>
            <form method="post" action="https://www.yenepay.com/checkout/">
            <input type="hidden" name="process" value="Express">
            <input type="hidden" name="successUrl" value="http://localhost/LMS/student/success.php">
            <input type="hidden" name="ipnUrl" value="http://localhost/LMS/student/ipn.php">
            <input type="hidden" name="cancelUrl" value="http://localhost/LMS/student/index.php">
            <input type="hidden" name="merchantId" value="17506">
            <input type="hidden" name="merchantOrderId" value="<?= $tx_ref;?>">
            <input type="hidden" name="expiresAfter" value="24">
            <input type="hidden" name="itemId" value='<?= $session_id;?>'>
            <input type="hidden" name="itemName" value='<?= $department." semister". $thisSemister. " registration";?>'>
            <input type="hidden" name="unitPrice" value="<?= $totalPrice;?>">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="discount" value="0">
            <input type="hidden" name="handlingFee" value="0">
            <input type="hidden" name="deliveryFee" value="0">
            <input type="hidden" name="tax1" value="0">
            <input type="hidden" name="tax2" value="0">
            <button type="submit" class = "btn btn-success">Pay with express</button>
        </form></center></th>                          
                  </tr>
                </tfooter>
              </table>
              <!-- End Table with stripped rows -->

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