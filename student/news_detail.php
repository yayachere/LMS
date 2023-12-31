<?php include('header.php');?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  .time-right {
  float: right;
  color: #aaa;
}
</style>
<body>

  <!-- ======= Header ======= -->
  <?php include('navbar.php');?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
   <?php include('sidebar.php');?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">SignUp</li>
          <li class="breadcrumb-item active">Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-10">

          <div class="card">
            <div class="card-body pt-3">
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
 <form action="#" class="form-horizontal" id="form_sample_1" method="post" 
           enctype="multipart/form-data">

                      <?php 
                      $id = $_GET["ID"];
                      $time_ago = $_GET["time"];
                      $updated_on = $_GET['update'];
                                $query=mysqli_query($conn,"select * from news where id='$id'")or die(mysqli_error($conn));
                                 $row=mysqli_fetch_array($query);
                              
                                 $header = $row['header'];
                                 $body = $row['message'];
                                 $from = $row['posted_by'];
                               
                                ?> 


  <div class="row">
    <div class="col-lg-9 col-md-8"> <h5 class="text-dark" style="text-decoration: underline;"><?php echo $header; ?></h5></div>
  </div>

  <div class="row">
    <div class="col-lg-9 col-md-8"> <?php echo $body; ?></div>
  </div>

  <div class="row">
    <div class="col-lg-9 col-md-8">Posted by: <?php echo $from; ?></div>
  </div>
  <div class="row">
    <div class="col-lg-9 col-md-8 time-right">
 <?php 
     if ($updated_on == null) {
       echo "Posted: $time_ago";
     }else {
      echo "Updated: $time_ago";
     }
      
 ?> 
 </div>
  </div>

                  
                       
  
  <a class="btn btn-dark mt-4" href="news.php">Back</a>
                                       
                         </form>                        
                </div>

              </div><!-- End Bordered Tabs -->

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