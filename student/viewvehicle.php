<?php include('header.php');
include('../dbcon.php');?>

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
          <li class="breadcrumb-item active">Appointment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

           <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fill Vehicle Information Below</h5>

              <!-- Floating Labels Form -->
              <form method="post" action="#" class="row g-3">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="plate" name="plate" placeholder="Enter Number Plate:" required="">
                    <label for="floatingName">Number Plate:</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="regnum" name="regnum" placeholder="Enter registration number:" required="">
                    <label for="floatingName">Registration Number:</label>
                  </div>
                </div>
   
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="enter">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->
<?php 
                                if (isset($_POST['enter'])){
                                $plate = $_POST['plate'];
                                $regnum = $_POST['regnum'];
                            
                                $query = "SELECT * FROM vehicle WHERE cid='$plate' && regnum= '$regnum'";
                                $result = mysqli_query($conn,$query)or die(mysqli_error());
                                $row= mysqli_fetch_array($result);

                if(mysqli_num_rows($result) < 1)  {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                   <strong>Failed! </strong>There is no vehicle information with this number plate and registration number!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';            
                  }
              
                else {

                 $querys = mysqli_query($conn,"SELECT * FROM Vehicle WHERE cid = '$plate' && regnum = '$regnum'");
                                  
                    while($rows = mysqli_fetch_assoc($querys)){
                      $fname = $rows['f_name'];
                      $lname = $rows['l_name'];
                      $model = $rows['model'];
                      $regnum = $rows['regnum'];?>

                      <h6>Owner's Name: <?php echo $fname . " ". $lname?></h6>
                      <h6>Car Model: <?php echo $model;?></h6>
                      <a href='vehicle_info.php?ID=<?php echo $regnum;?>' class="btn btn-success">More</a><br><br>

                           <?php }}}?>
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