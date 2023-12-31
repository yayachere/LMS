<?php require_once ("../dbcon.php"); 
include('header.php')?>
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
          <li class="breadcrumb-item">Add_users</li>
          <li class="breadcrumb-item active">Print</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User Name & Password of Sodo City TVET Website.</h5>
              <div class="container mt-3"  id="printme" name="printme">
  <?php

    $usrnm = $_GET['userId'];
    $empnm = $_GET['firstName'];
    $pswrd = $_GET['password'];
    $emplnm = $_GET['lastName'];
    
    ?>
    <center>
    SODO CITY TVET COLLEGE<br> USERNAME AND PASSWORD</center></h3>
    <hr size="5" color="green">
    <center>Dear <b><font color="green"> <?php echo $empnm; echo " "; echo $emplnm; ?>,</font></b> 
    the following is your own password and userid, use it to login to the system. 
    <table>
    <tr>
    <td><i><b> Userid:</i></b></td>
    <td><u><?php echo $usrnm;?></u></td>
    </tr>
    <tr>
    <td><i><b> Password:</i></b></td>
    <td><u><?php echo $pswrd;?></u></td>
    </tr>
  </table>
    </div>
    <center><p class="mt-3"><input name="print" type="button" class="btn btn-success" value="Print" id="printme" onClick="printContent('printme')"> <a href="add_instructor.php" class="btn btn-primary">Back</a></p></center>
    
   
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