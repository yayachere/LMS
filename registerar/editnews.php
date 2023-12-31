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
          <li class="breadcrumb-item"><a href="edit_news.php">Edit_News</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
  

        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Edit News</h3>
<?php
                                include('../dbcon.php');                                
                             $id = $_GET['ID'];
                                if (isset($_POST['edit'])){
                                                              
                                $user_id = $session_id;
                                $header = addslashes(ucfirst($_POST['title']));
                                $message = addslashes(ucfirst($_POST['body']));
                                $post_to = $_POST['post_to'];
                                $post_type = $_POST['post_type'];
                                $expire = $_POST['expire'];
                                $tw = date('A');
                                 if ($tw == "AM") {
                                   $updated_on = date("Y-m-d h:i:s");
                                 }else {
                                  $d = strtotime("+0 Hours");                                
                                 $updated_on = date("Y-m-d H:i:s", $d);

                                 }

                    $query = "UPDATE news SET header ='$header', message ='$message', posted_to ='$post_to', updated_on ='$updated_on', type ='$post_type', expire ='$expire', posted_by ='$user_id' WHERE id='$id'"or die(mysqli_error($conn));                                                       
                    if (mysqli_query($conn,$query)) {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle-fill me-1"></i>
                      <strong>Updated!</strong> You have updated news for '.$post_to.' successfully!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }else{  
                     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                            <strong>Failed!</strong> news isn\'t updated!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                  }}

                  if (isset($_POST['delete'])) {
                    $query = "Delete from news where id='$id'" or die(mysqli_error($conn));
                    if(mysqli_query($conn,$query)){
                      echo' <meta content="2;edit_news.php" http-equiv="refresh" />';
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle-fill me-1"></i>
                      <strong>Deleted!</strong> You have deleted news successfully!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';

                    }else{  
                     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                            <strong>Failed!</strong> news isn\'t deleted!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';

                  }}

                  
                            
                                ?>
              <form method="post" action="#" class="row g-3">
                <?php $id = $_GET['ID'];
                $title = $body = $post_to = $post_type = $expire = "";
                $qry = mysqli_query($conn,"SELECT * FROM news where id = '$id'");
                while ($rows = mysqli_fetch_assoc($qry)) {
                  $title = $rows['header'];
                  $body = $rows['message'];
                  $post_to = $rows['posted_to'];
                  $post_type = $rows['type'];
                  $expire = $rows['expire'];
                }

                ?>
                
                            <h5 class="card-title">News Title:</h5>
                            <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter First Name:" value="<?php echo $title; ?>" required>
                    <label for="floatingName">Enter post title here:</label>
                  </div>
                </div>
                <h5 class="card-title">News Body:</h5>
              <div class="row mb-3">
                  <div class="col-12">
                    <textarea class="form-control" style="height: 100px" name="body" required placeholder="Fill your message to be posted here...."><?php echo $body; ?></textarea>
                  </div>
                </div>
                  <h5 class="card-title">Post to:</h5>

                  <div class="form-floating mb-3">
                      <select class="form-select" name="post_to" id="post_to" aria-label="Floating label select example" required>
                        <option value="<?php echo $post_to;?>" selected><?php echo $post_to;?></option>
                        <option value="registerar">Registerar</option>
                        <option value="head">Head</option>
                        <option value="student">Student</option>
                        <option value="instructor">Instructor</option>
                      </select>
                      <label for="type">Post to:</label>
                  </div>
    <h5 class="card-title">Post Type:</h5>

 <div class="form-floating mb-3">
                      <select class="form-select" name="post_type" id="post_type" aria-label="Floating label select example" required>
                        <?php if ($post_type == "warning") {
                          echo '<option value="info">Information</option>';
                          echo '<option value="warning" selected>Warning</option>';
                        }else {
                        echo '<option value="info" selected>Information</option>';
                        echo '<option value="warning" >Warning</option>';
                        } ?>

                      </select>
                      <label for="type">Post Type:</label>
    </div>
    <h5 class="card-title">Expire on:</h5>

 <div class="form-floating mb-3">
                      <select class="form-select" name="expire" id="expire" aria-label="Floating label select example" required>
                        <option value = "<?php echo $expire;?>" selected><?php echo $expire;?></option>
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
                  <button type="submit" class="btn btn-primary" name="edit">Post</button>
                  <button type="submit" class="btn btn-danger" name="delete">Delete</button>
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