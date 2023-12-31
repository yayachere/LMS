<?php include('header.php');?>

<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
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
            <div class="card-body"><br>
 <?php

 function test_input($data) {
                          $data = trim($data);
                          $data = stripslashes($data);
                          $data = htmlspecialchars($data);
                          return $data;
                              }
                            $id = $_GET["ID"];

                             $error = 0;
                            if (isset($_POST['update'])){      
                                        
                                        $f_name=test_input(ucfirst($_POST['fname']));
                                        $l_name=test_input(ucfirst($_POST['lname']));
                                        $fullname = $f_name."".$l_name;
                                        $km = test_input($_POST['km']);            
                                        $date =$_POST['date'];

            // check if name only contains letters and whitespace
                  if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                    <strong>Failed! </strong>Only letters and white space allowed for name!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }
                  else{
                        

                $abcs = mysqli_query( $conn,"SELECT * FROM vehicle WHERE regnum='$id'");

                  if(mysqli_num_rows($abcs) >= 1)  {

                    $qu=mysqli_query($conn,"select * from vehicle where regnum='$id'")or die(mysqli_error($conn));
                        $ro=mysqli_fetch_array($qu);
                        $up=$ro["up"];
                        if ($date<= $up) {
                         echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                    <strong>Update Failed!</strong> Invalid Year Input!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }
                      else{   
                      mysqli_query( $conn,"UPDATE vehicle SET f_name='$f_name',l_name='$l_name',driven_kms= '$km',up='$date' where regnum='$id'")or die(mysqli_error( $conn));
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-1"></i>
                            Vehicle information updated successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';?>

                      <a href='printupdate.php?ID=<?php echo $id;?>' class="btn btn-success">Print</a> 
                                           
  <?php }}
       else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                            Update Failed! <br>This Car Is not Registered!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';

      }}}


                                
                               ?>
  <form method="post" action="#">
                       <?php
                        $id = $_GET["ID"]; 
                       $qu=mysqli_query($conn,"select * from vehicle where regnum='$id'")or die(mysqli_error($conn));
                        $ro=mysqli_fetch_array($qu);
                        $fname=$ro["f_name"];
                        $lname =$ro["l_name"];
                           ?>
    <div class="mb-3 mt-3">
      <label for="name" class="form-label text-dark">Owner's Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Owner's Name" name="fname" value="<?php echo $fname;?>" required>
      <div class="mb-3 mt-3">
      <label for="name" class="form-label text-dark">Last Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Owner's Last Name" name="lname" value="<?php echo $lname;?>" required>
     
    </div>
    <div class="mb-3 mt-3">
      <label for="cid" class="form-label text-dark">Driven KM(s):</label>
      <input type="number" class="form-control" id="km" placeholder="Enter Driven kilometers" name="km" required>
     
    </div>
    <div class="mb-3 mt-3">
      <label for="date" class="form-label text-dark">Udated_on:</label>
      <input type="date" class="form-control" id="date" name="date" required>
     
    </div>
      
  <button type="submit" class="btn btn-primary" name="update">Update</button>
  <a class="btn btn-danger" href="updatevehicle.php">Cancel</a>
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