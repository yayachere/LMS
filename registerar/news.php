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
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Post_News</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
  

        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Post News</h3>
<?php
                                include('../dbcon.php');                                
                             
                                if (isset($_POST['post'])){
                                                              
                                $user_id = $session_id;
                                $qry = mysqli_query($conn, "SELECT * FROM users_account where user_id = '$user_id'");
                                $rw = mysqli_fetch_assoc($qry);
                                $accountType = $rw['account_type'];

                                $header = addslashes(ucfirst($_POST['title']));
                                $message = addslashes(ucfirst($_POST['body']));
                                $post_to = $_POST['post_to'];
                                $post_type = $_POST['post_type'];
                                $expire = $_POST['expire'];
                                $tw = date('A');
                                 if ($tw == "AM") {
                                   $posted_on = date("Y-m-d h:i:s");
                                 }else {
                                  $d = strtotime("+0 Hours");                                
                                 $posted_on = date("Y-m-d H:i:s", $d);

                                 }                                                        
                    $query = "INSERT INTO news(header,message,posted_to,posted_on,type,expire,posted_by,account_type) values('$header','$message','$post_to','$posted_on','$post_type','$expire',
                      '$user_id','$accountType')"or die(mysqli_error($conn));

                    if (mysqli_query($conn,$query)) {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle-fill me-1"></i>
                      <strong>Sent!</strong> Your have posted news for '.$post_to.' successfully!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }

                    else{  
                     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                            <strong>Failed!</strong> news isn\'t posted!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                  }}
                            
                                ?>
              <form method="post" action="#" class="row g-3">
                
                            <h5 class="card-title">News Title:</h5>
                            <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter First Name:" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fill post title here" required>
                    <label for="floatingName">Enter post title here:</label>
                  </div>
                </div>
                <h5 class="card-title">News Body:</h5>
              <div class="row mb-3">
                  <div class="col-12">
                    <textarea class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fill your message to be posted here" style="height: 100px" name="body" required placeholder="Fill your message to be posted here...."></textarea>
                  </div>
                </div>
                  <h5 class="card-title">Post to:</h5>

 <div class="form-floating mb-3">
                      <select class="form-select" name="post_to" id="post_to" aria-label="Floating label select example" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Choose the users" required>
                        <option disabled selected></option>
                        <option value="hrm">HRM</option>
                        <option value="finance">Finance</option>
                        <option value="registerar">Registerar</option>
                        <option value="head">Head</option>
                        <option value="instructor">Instructor</option>
                        <option value="library">Librarist</option>
                        <option value="student">Student</option>
                        <option value="all">All</option>
                        
                      </select>
                      <label for="type">Post to:</label>
    </div>
    <h5 class="card-title">Post Type:</h5>

 <div class="form-floating mb-3">
                      <select class="form-select" name="post_type" id="post_type" aria-label="Floating label select example" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Choose post type" required>
                        <option disabled selected></option>
                        <option value="info">Information</option>
                        <option value="warning">Warning</option>
                        
                      </select>
                      <label for="type">Post Type:</label>
    </div>
    <h5 class="card-title">Expire on:</h5>

 <div class="form-floating mb-3">
                      <select class="form-select" name="expire" id="expire" aria-label="Floating label select example" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Selet message delete time" required>
                        <option disabled selected></option>
                        <option value="<?php $d = strtotime("+1 Weeks");     
                        echo date("Y-m-d", $d); ?>">1 week later</option>
                        <option value="<?php $d = strtotime("+2 Weeks");     
                        echo date("Y-m-d", $d); ?>">2 week later</option>
                        <option value="<?php $d = strtotime("+1 Months");     
                        echo date("Y-m-d", $d); ?>">1 Month later</option>
                        <option value="<?php $d = strtotime("+2 Months");     
                        echo date("Y-m-d", $d); ?>">2 Month later</option>
                        <option value="<?php $d = strtotime("+5 Months");     
                        echo date("Y-m-d", $d); ?>">5 Month later</option>
                      </select>
                      <label for="type">Expire_on:</label>
    </div>
    <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="post">Post</button>
                  <button type="reset" class="btn btn-secondary">Clear data</button>
                </div>
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