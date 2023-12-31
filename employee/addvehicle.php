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
          <li class="breadcrumb-item">Vehicle</li>
          <li class="breadcrumb-item active">Register</li>
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
                             $error = 0;
                            if (isset($_POST['add'])){      
                        
                                        $f_name=test_input(ucfirst($_POST['fname']));
                                        $l_name=test_input(ucfirst($_POST['lname']));
                                        $fullname = $f_name."".$l_name;
                                        $cid=test_input($_POST['cid']);
                                        $model=test_input($_POST['model']);
                                        $brand=test_input($_POST['brand']);
                                        $date = $_POST['date'];
                                        $wheel=test_input($_POST['wheel']);
                                        $km = test_input($_POST['km']);
                                        $axel = test_input($_POST['axel']);
                                        $user_id = test_input($session_id);

// check if name only contains letters and whitespace
                  if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                    <strong>Failed! </strong>Only letters and white space allowed for name!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }
                  else{
                             
              $abcs = mysqli_query( $conn,"SELECT * FROM vehicle");

    if(mysqli_num_rows($abcs) >= 1)  {

             $querys = "SELECT * FROM vehicle WHERE cid='$cid' ";
              $results = mysqli_query( $conn,$querys)or die(mysqli_error());
              $num_rows = mysqli_num_rows($results);
         if($num_rows>=1){
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                    This Plate Number is already Registered!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';               
                             }
          else{
            
                 $qry = "INSERT INTO vehicle(f_name,l_name,cid,model,brand,driven_kms,axel,date,wheel,up,emp_id) values('$f_name','$l_name','$cid','$model','$brand','$km','$axel','$date','$wheel','$date','$user_id')"or die(mysqli_error( $conn));

                 if (mysqli_query($conn,$qry)) {
                   $last_id = mysqli_insert_id($conn);
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-1"></i>
                            New Car Registered successfully! !
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';?>

                  <a href='print.php?ID=<?php echo $last_id;?>' class="btn btn-success">Print</a> 
                 
                 <?php }
                 else {
                      echo "Error: " . $qry . "<br>" . mysqli_error($conn);
                       }
                                            
       }}
       else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                            Registration Failed!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';


}} } ?>

  <form method="post" action="#">
    <div class="mb-3 mt-3">
      <label for="name" class="form-label text-dark">Owner's Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Owner's Name" name="fname" required>
     
    </div>
    <div class="mb-3 mt-3">
      <label for="name" class="form-label text-dark">Last Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Last Name" name="lname" required>
     
    </div>
    <div class="mb-3 mt-3">
      <label for="cid" class="form-label text-dark">Plate No:</label>
      <input type="number" class="form-control" id="cid" placeholder="Enter Plate number" name="cid" required>
     
    </div>
    <div class="mb-3">
      <label for="brand" class="form-label text-dark">Brand</label>
      <input type="text" class="form-control" id="brand" placeholder="Enter Brand" name="brand" required>
    </div>
    <div class="mb-3 mt-3">
      <label for="model" class="form-label text-dark">Model:</label>
      <input type="text" class="form-control" id="model" placeholder="Enter Car Model" name="model" required>
     
    </div>
    <div class="mb-3 mt-3">
      <label for="cid" class="form-label text-dark">Driven KM(s):</label>
      <input type="number" class="form-control" id="km" placeholder="Enter Driven kilometers" name="km" required>
     
    </div>
    <div class="mb-3 mt-3">
      <label for="cid" class="form-label text-dark">Axel Number:</label>
      <input type="text" class="form-control" id="axel" placeholder="Enter Axel Number" name="axel" required>
     
    </div>
    <div class="mb-3 mt-3">
      <label for="date" class="form-label text-dark">Date:</label>
      <input type="date" class="form-control" id="date" name="date" required>
     
    </div>
    <div class="form-floating mb-3">
                      <select class="form-select" name="wheel" id="wheel" aria-label="Floating label select example" required>
                        <option disabled selected></option>
                        <option value="2WD">2Wheel Drive</option>
                        <option value="3WD">3Wheel Drive</option>
                        <option value="4WD">4Wheel Drive</option>
                        <option value="6WD">6Wheel Drive</option>
                        <option value="Other">Other</option>
                      </select>
                      <label for="type">Choose Car Type from the list:</label>
    </div>
  <button type="submit" class="btn btn-primary" name="add">Register</button>
  <button type="reset" class="btn btn-danger">Clear Data</button>
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