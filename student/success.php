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
            <div class="card-body"  id="printme" name="printme">
              <h5 class="card-title">Payment Details</h5>
              
              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr class="bg-light">
                    <th>Name</th>
                    <th>Value</th>
                  </tr>
                </thead>
                <tbody>
<?php 
             $query = mysqli_query($conn,"SELECT * FROM student WHERE student_id = '$session_id'");
      while($rows = mysqli_fetch_assoc($query)){
        $first_name = $rows['first_name'];
        $last_name = $rows['middle_name'];
        $semisterNumber = $rows['semister_number'];
        $nextSemister = $semisterNumber + 1;
        $school = $rows['school'];
        $department = $rows['department'];
        $program = $rows['program'];
       }
       $total = $_GET['TotalAmount'];
       $buyerId = $_GET['BuyerId'];
       $merchantOrderId = $_GET['MerchantOrderId'];
       $merchantCode = $_GET['MerchantCode'];
       $merchantId = $_GET['MerchantId'];
       $transactionId = $_GET['TransactionId'];
       $transactionCode = $_GET['TransactionCode'];
       $status = $_GET['Status'];
       $currency = $_GET['Currency'];
       $signature = $_GET['Signature'];

       $querys = mysqli_query($conn, "SELECT * FROM semister WHERE semister_number = '$nextSemister'") or die(mysqli_error($conn));
       $data = mysqli_fetch_array($querys);
       $year = $data['year'];
       $semister = $data['semister'];

       mysqli_query($conn, "INSERT INTO payment(first_name,last_name,buyer_id,transaction_id,transaction_code,status,currency,order_id,total,student_id) VALUES ('$first_name','$last_name','$buyerId','$transactionId','$transactionCode','$status','$currency','$merchantOrderId','$total','$session_id')") or die(mysqli_error($conn));

       mysqli_query($conn, "UPDATE student SET semister_status = 'registered', year = '$year', semister = '$semister', semister_number = '$nextSemister' where student_id = '$session_id'") or die(mysqli_error($conn));

    ?>
                <tr>
        <th>Student Name</th>
        <td><?php echo $first_name. " " .$last_name;?></td>
      </tr>
      <tr>
        <th>School</th>
        <td><?php echo $school;?></td>
      </tr>
      <tr>
        <th>Department</th>
        <td><?php echo $department;?></td>
      </tr>
      <tr>
        <th>Year</th>
        <td><?php echo $year;?></td>
      </tr>
      <tr>
        <th>Semister</th>
        <td><?php echo $semister;?></td>
      </tr>
      <tr>
        <th>Program</th>
        <td><?php echo $program;?></td>
      </tr>
      <tr>
        <th>Semister Number</th>
        <td><?php echo $nextSemister;?></td>
      </tr>

      <tr>
        <th>Status</th>
        <td><?php echo $status;?></td>
      </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
</div>
    <h3>You've successfully paid <?php echo $total; ?> Birr Thank you!</h3>
    <button class="btn btn-success" value="Print" id="printme" onClick="printContent('printme')">Print</button>
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
<script type="text/javascript">
       
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>
</body>

</html>