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
  <!-- ======= Sidebar ======= -->
  <!-- End Sidebar-->
<?php include('sidebar.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Mission & Vision</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fill The Form Below</h5>

   <?php
        $error = 0;
        if (isset($_POST['upload'])){    
            
                    
                                    $en_mission = addslashes(ucfirst($_POST['en_mission']));                             
                                    $en_vission = addslashes(ucfirst($_POST['en_vission']));
                    $status="On";
                    $sta="Off";
                    $querys = mysqli_query($conn,"SELECT * FROM mission where status='$status' ");
                        $rows = mysqli_fetch_array($querys);
                    $id= $rows['id'];
                    mysqli_query($conn,"Update mission set status='$sta' where id='$id'")or die(mysqli_error());
                    mysqli_query($conn,"insert into mission(en_mission,en_vission,user_id,status) values('$en_mission','$en_vission','$session_id','$status')")or die(mysqli_error($conn));
                       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-1"></i>
                            You have changed Mission & Vission Successfully!!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                                                            
    }           
    ?>
              <form action="#" method="post"  enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Mission</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="en_mission" data-bs-toggle="tooltip" data-bs-placement="bottom" title="fill mission content here..." required=""></textarea>
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Vision</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="en_vission" data-bs-toggle="tooltip" data-bs-placement="bottom" title="fill vision content here..." required=""></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10 text-center">
                    <button type="submit" class="btn btn-primary" name="upload">Upload</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

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