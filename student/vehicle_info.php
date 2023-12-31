<?php include('header.php');?>

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
          <li class="breadcrumb-item">Update</li>
          <li class="breadcrumb-item active">Vehicle</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
 <?php
                            $id = $_GET["ID"];

                             $error = 0;
                            if (isset($_POST['update'])){      
                                        
                                        $f_name=$_POST['fname'];
                                        $l_name=$_POST['lname'];            
                                       $date =$_POST['date'];                                                                         
                $abcs = mysqli_query( $conn,"SELECT * FROM vehicle WHERE regnum='$id'");

                  if(mysqli_num_rows($abcs) >= 1)  {

                    $qu=mysqli_query($conn,"select * from vehicle where regnum='$id'")or die(mysqli_error($conn));
                        $ro=mysqli_fetch_array($qu);
                        $up=$ro["up"];
                        if ($date<= $up) {
                         echo '<div class="alert alert-danger alert-dismissible fade show">
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>Update Failed!</strong> Invalid Year Input!</div>';
                        }
                      else{   
                      mysqli_query( $conn,"UPDATE vehicle SET f_name='$f_name',l_name='$l_name',up='$date' where regnum='$id'")or die(mysqli_error( $conn));
                        echo '<div class="alert alert-success alert-dismissible fade show">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      Car Updated successfully!</div>';
                                           
  }}
       else {
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  Update Failed! <br>This Car Is not Registered!</div>';
      }}


                                
                               ?>
  <form method="post" action="#" class="was-validated">
                       <?php
                        $id = $_GET["ID"]; 
                       $qu=mysqli_query($conn,"select * from vehicle where regnum='$id'")or die(mysqli_error($conn));
                        $ro=mysqli_fetch_array($qu);
                        $fname=$ro["f_name"];
                        $lname =$ro["l_name"];
                        $model = $ro['model'];
                        $plate = $ro['cid'];
                        $regnum = $ro['regnum'];
                        $brand = $ro['brand'];
                        $wheel = $ro['wheel'];
                        $km=$ro["driven_kms"];
                        $axel=$ro["axel"];
                        $updated_on = $ro['up'];
                        
                           ?>
    <center>
    SODO CITY Vehicle Registration System<br> Vehicle Information</center></h3>
    <hr size="5" color="green">
    <center>Dear <b><font color="green"> <?php echo $fname; echo " "; echo $lname; ?>,</font></b> 
    The following is full information about your vehicle. 
    <table>
    <tr>
    <td><i><b> Owner's Full Name: </i></b></td>
    <td><u><?php echo $fname. " " . $lname;?></u></td>
    </tr>
    <tr>
    <td><i><b> model:</i></b></td>
    <td><u><?php echo $model;?></u></td>
    </tr>
    <tr>
    <td><i><b> Brand:</i></b></td>
    <td><u><?php echo $brand;?></u></td>
    </tr>
    <tr>
    <td><i><b> Registration No:</i></b></td>
    <td><u><?php echo $regnum;?></u></td>
    </tr>
    <tr>
    <td><i><b> Wheel:</i></b></td>
    <td><u><?php echo $wheel;?></u></td>
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
    <td><i><b> Updated_on:</i></b></td>
    <td><u><?php echo $updated_on;?></u></td>
    </tr>
    <tr>
    <td><i><b> Plate Number:</i></b></td>
    <td><u><?php echo $plate;?></u></td>
    </tr>
  </table>
    </div>
    <center><p class="mt-3"><a href="viewvehicle.php" class="btn btn-primary">Back</a></p>
    </center>
  </form>
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