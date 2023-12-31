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
          <li class="breadcrumb-item">Vehicle</li>
          <li class="breadcrumb-item active">Delete</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
    <?php
                   if (isset($_POST['delete'])){
                             $id = $_GET["ID"];

                        $bcs = mysqli_query( $conn,"SELECT * FROM vehicle WHERE regnum='$id'"); 

       if(mysqli_num_rows($bcs) >= 1)  {

             mysqli_query( $conn,"DELETE FROM vehicle WHERE regnum='$id'")
                                or die(mysqli_error( $conn));
                                         
                  echo' <meta content="2;deletevehicle.php" http-equiv="refresh" />';
                  echo '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <i class="bi bi-check-circle-fill me-1"></i>
                            Deleted successfully!!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
      }
       else {

        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                           Failed to delete
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
      } }      ?>
  <form method="post" action="#" class="was-validated">
                         <?php
                        $id = $_GET["ID"]; 
                       $qu=mysqli_query($conn,"select * from vehicle where regnum='$id'")or die(mysqli_error($conn));
                        $ro=mysqli_fetch_array($qu);
                        $fname=$ro["f_name"];
                        $lname =$ro["l_name"];
                        $type=$ro["brand"];
                        $model=$ro["model"];
                        $cid=$ro["cid"];
                      
                           ?>
           <center> <h4 class="text-danger alert-info mt-3 p-3 rounded"><i class="fa fa-microphone"></i> Are You Sure You Want to Delete this record</h4></center>

    <div class="mb-3 mt-3">
      <label for="cid" class="form-label text-dark">Full_Name:</label>
      <input type="text" class="form-control" id="cid" name="cid" value="<?php echo $fname." ".$lname;?>" disabled>
    </div>

    <div class="mb-3 mt-3">
      <label for="cid" class="form-label text-dark">Plate No:</label>
      <input type="number" class="form-control" id="cid" placeholder="Enter Plate number" name="cid" value="<?php echo $ro['cid'];?>" disabled>
    </div>

    <div class="mb-3">
      <label for="pid" class="form-label text-dark">Type:</label>
      <input type="text" class="form-control" id="pid" placeholder="Enter Penality_ID" name="pid" value="<?php echo $ro['brand'];?>" disabled>
    </div>
    <div class="mb-3 mt-3">
      <label for="amount" class="form-label text-dark">model:</label>
      <input type="amount" class="form-control" id="amount" placeholder="Enter Amount of Penality" name="amount" value="<?php echo $ro['model'];?>" disabled>
     
    </div>
  
    
  <button type="submit" class="btn btn-danger" name="delete">Delete</button>
  <a type="button" class="btn btn-primary" href="deletevehicle.php">Cancel</a>
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