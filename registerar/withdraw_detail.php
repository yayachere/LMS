<?php include('header.php');?>
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
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
   <?php include('sidebar.php');?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Withdraw</li>
          <li class="breadcrumb-item active">Withdraw_detail</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
      <div class="row">
        <div class="col-xl-10">
          <div class="card">
            <div class="card-body pt-3">
              <?php
      $id = $_GET['ID'];
      $result = mysqli_query($conn, "SELECT * FROM withdraw where id='$id'") or die(mysqli_error());

      $data = mysqli_fetch_array($result);
      $studentName = $data["student_name"];
      $studentId = $data['student_id'];
      $school = $data['school'];
      $department = $data['department'];
      $gender = $data['gender'];
      $year = $data['year'];
      $semister = $data['semister'];
      $reason = $data['reason'];
      $date = $data['date'];
      $time_ago = time_ago_function($date);


      if(isset($_POST['approve'])) {

        $decision = $_POST['decision'];

        $query = mysqli_query($conn, "UPDATE withdraw set registerar = 
        '$decision' where id = '$id'") or die(mysqli_error($conn));
        
        if ($query == true) {

          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Success! </strong>Withdrawal request has been '.$decision.'!!              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else {

          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Failed! </strong> Withdrawal request isn\'t '.$decision.'!!              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
      }
?>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h4 class="card-title">Student Full Name</h4>
                  <h5 class="small fst-italic"><?php echo $studentName; ?></h5>

                  <h5 class="card-title">Student Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $studentName ?> </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Student Id</div>
                    <div class="col-lg-9 col-md-8"><?php echo $studentId; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">School</div>
                    <div class="col-lg-9 col-md-8"><?php echo $school; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Department</div>
                    <div class="col-lg-9 col-md-8"><?php echo $department; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8"><?php echo $gender; ?></div>
                  </div>

                
                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Year</div>
                    <div class="col-lg-9 col-md-8"><?php echo $year; ?></div>
                  </div>

                

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Semister</div>
                    <div class="col-lg-9 col-md-8"><?php echo $semister; ?></div>
                  </div>

                

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Reason</div>
                    <div class="col-lg-9 col-md-8"><?php echo $reason; ?></div>
                  </div>

                

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date</div>
                    <div class="col-lg-9 col-md-8"><?php echo $time_ago; ?></div>
                  </div>

                  <form action="#" method="post">
                    <div class="form-floating col-md-12 mt-3 mb-3">
                    <select class="form-select" name="decision" id="decision" aria-label="Floating label select example" required>
                      <option disabled selected></option>
                      <option value="approved">Approved</option>
                      <option value="delined">Declined</option>
                    
                     
                    </select>
                    <label for="type">Decision:</label>
              </div>

                      <button type="submit" class="btn btn-primary" name="approve" >Submit</button>
                      <button type="reset" class="btn btn-danger">Reset</button>
                  </form>

                 </div>
                </div>
                </div>
               </div>
              </div><!-- End Bordered Tabs -->
             </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- ======= Footer ======= -->
  <?php include('footer.php');?>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>