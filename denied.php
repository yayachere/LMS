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
      background: #fff url(Loading_2.gif) no-repeat center center;
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
          <li class="breadcrumb-item active">Pay Penality</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

           <div class="card">
            <div class="card-body">
              <h5 class="card-title">Penality Information Form</h5>
 <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Failed!</strong> Choose One of The listed Banks!!
  </div>
              <!-- Floating Labels Form -->
              <form method="post" action="banklog.php" class="row g-3 was-validated">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="cid" name="cid" placeholder="Plate Number or License_Id" required="">
                    <label for="floatingName">Plate Number or License_Id</label>
                  </div>
                </div>
               
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="pid" name="pid" placeholder="Penality_Id" required="">
                    <label for="floatingPassword">Penality_Id</label>
                  </div>
                </div>

                  <div class="col-md-12">
                     <div>
                    <label for="lid" class="form-label text-dark">Choose Bank:</label>
                    <input class="form-control mt-2 mb-4" list="bank" name="bank" id="browser" placeholder="Choose Bank" required>
                    <datalist id="bank">
                    <option value="CBE">
                    </datalist>
                    </div>
                  </div>
              
              
             
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="enter">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>
        </div>
         <?php include('aside.php')?>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php');?>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>