<?php include('header.php');?>

<!DOCTYPE html>
<html lang="en">

<body>

  <!-- ======= Header ======= -->
  <?php include('navbar.php');?>
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
 <?php include('sidebar.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
<nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active ">Dashboard</li>
        </ol>
    <?php $Today = date('y:m:d');
                $new = date('l, F d, Y', strtotime($Today));
                $month = date('F', strtotime($Today));
                echo $new;

                $emp = "employee";
              $query = mysqli_query($conn,"SELECT * FROM news where posted_to = '$emp' order by news_id desc");
                while($rows = mysqli_fetch_assoc($query)){ 
                  $news_id = $rows['news_id'];                
                  $expire = $rows['expire'];
                  $cdate = date('Y-m-d');

                  if ($cdate == $expire) {    
mysqli_query($conn,"Delete from news where news_id='$news_id'") or die(mysqli_error($conn));

                  }
}
                ?> 


      </nav>
    </div><!-- End Page Title -->

     <section class="section">
      <div class="row">
        <div class="col-lg-11">

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Well come to employee page</h4>
              <img src="../assets/img/employees.png" class="col-lg-7">
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