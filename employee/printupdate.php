<?php require_once ("../dbcon.php"); 
include('header.php')?>
<!DOCTYPE html>
<html lang="en">

<body>

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
          <li class="breadcrumb-item">Add_Vehicle</li>
          <li class="breadcrumb-item active">Print</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sodo City Road Transport Authority.</h5>
              <div class="container mt-3"  id="printme" name="printme">
  <?php
if (isset($_GET['ID']))
  {
    $ID = $_GET['ID'];
    $query = mysqli_query($conn, "SELECT * FROM vehicle where regnum = $ID");
    
    if (mysqli_num_rows($query) > 0) {

      $array = array(); 
      $rows = mysqli_fetch_assoc($query);
      $array[] = $rows;
      $f_name=$rows['f_name'];
      $l_name =$rows["l_name"];
      $plate=$rows['cid'];
      $model=$rows["model"];
      $brand=$rows["brand"];
      $regnum=$rows["regnum"];
      $wheel=$rows["wheel"];
      $km=$rows["driven_kms"];
      $axel=$rows["axel"];
      $updated_on=$rows["up"];
      $registered_on=$rows["date"];

    
    ?>
    <center>
    Sodo City Vehicle Registration and Management System<br> Vehicle Ownership Certificate</center></h3>
    <hr size="5" color="green">
    <center>Owner's Full Name: <b><font color="green"> <?php echo $f_name; echo " "; echo $l_name; ?>,</font></b> 
    <table>
    <tr>
    <td><i><b> Number Plate:</i></b></td>
    <td><u><?php echo $plate;?></u></td>
    </tr>
    <tr>
    <td><i><b> Car Model:</i></b></td>
    <td><u><?php echo $model;?></u></td>

    </tr>
    <tr>
    <td><i><b> Car Type:</i></b></td>
    <td><u><?php echo $wheel;?> Wheel drive</u></td>
    </tr>
    <tr>
    <td><i><b> Registration Number:</i></b></td>
    <td><u><?php echo $regnum;?></u></td>
    
    </tr>
    <tr>
    <td><i><b> Brand:</i></b></td>
    <td><u><?php echo $brand;?></u></td>
    </tr>
    <tr>
    <td><i><b> Model:</i></b></td>
    <td><u><?php echo $model;?></u></td>
    </tr>
    <tr>
    <td><i><b> Driven_KMs:</i></b></td>
    <td><u><?php echo $km;?></u></td>
    </tr>
    <tr>
    <td><i><b> Axel Number:</i></b></td>
    <td><u><?php echo $axel;?></u></td>
    </tr>
    <tr>
    <td><i><b> Updated_On:</i></b></td>
    <td><u><?php echo $updated_on;?></u></td>
    
    </tr>
    <tr>
    <td><i><b> Registered_On:</i></b></td>
    <td><u><?php echo $registered_on;?></u></td>
    
    </tr>
  </table>
    </div>
    <center><p class="mt-3"><input name="print" type="button" class="btn btn-success" value="Print" id="printme" onClick="printContent('printme')"> <a href="updatevehicle.php" class="btn btn-primary">Back</a></p></center>
    
    <?php
  }}
?>
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