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
          <li class="breadcrumb-item active">Manage Slide</li>
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
                    $target_dir = "../Uploads/";
                    $image1 = $_FILES['image1']['tmp_name'];
                    $image_name1 = $_FILES['image1']['name'];
                    $image_size1 = getimagesize($_FILES['image1']['tmp_name']);
                    $image_type1 = $_FILES['image1']['type'];
                    $image_error1 = $_FILES['image1']['error'];
                    $target_file1 = $target_dir . basename($_FILES["image1"]["name"]);
                  $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
                    
                    $image2 = $_FILES['image2']['tmp_name'];
                    $image_name2 = $_FILES['image2']['name'];
                    $image_size2 = getimagesize($_FILES['image2']['tmp_name']);
                    $image_type2 = $_FILES['image2']['type'];
                    $image_error2 = $_FILES['image2']['error'];
                    $target_file2 = $target_dir . basename($_FILES["image2"]["name"]);
                  $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
                    
                    $image3 = $_FILES['image3']['tmp_name'];
                    $image_name3 = $_FILES['image3']['name'];
                    $image_size3 = getimagesize($_FILES['image3']['tmp_name']);
                    $image_type3 = $_FILES['image3']['type'];
                    $image_error3 = $_FILES['image3']['error'];
                    $target_file3 = $target_dir . basename($_FILES["image3"]["name"]);
                  $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
                    
                    $image4 = $_FILES['image4']['tmp_name'];
                    $image_name4 = $_FILES['image4']['name'];
                    $image_size4 = getimagesize($_FILES['image4']['tmp_name']);
                    $image_type4 = $_FILES['image4']['type'];
                    $image_error4 = $_FILES['image4']['error'];
                    $target_file4 = $target_dir . basename($_FILES["image4"]["name"]);
                  $imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
      
                if($image_size1==FALSE && $error ==0 || $image_size2==FALSE && $error ==0 ||$image_size3==FALSE && $error ==0 || $image_size4==FALSE && $error ==0 ){
                  echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                            That is not an image!!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                      $error = 1;
                    }
                    else if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" || $imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" || $imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType3 != "gif" || $imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg" && $imageFileType4 != "gif") {
                      echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                      Only<strong>JPG, PNG, JPEG AND GIF</strong> image formats are allowed!!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                      $error = 1;
                    }

                    else if($image_error1 > 0 && $error == 0 || $image_error2 > 0 && $error == 0 || $image_error3 > 0 && $error == 0 || $image_error4 > 0 && $error == 0 ){
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                            There is error in uploading an image. 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                          $error = 1;
                    }
                    else if($error == 0){
                    $status="On";
                    $sta="Off";
                $querys = mysqli_query($conn,"SELECT * FROM Slide where status='$status' ");
                        $rows = mysqli_fetch_array($querys);
                    $id= $rows['id'];
                    mysqli_query($conn,"Update Slide set status='$sta' where id='$id'")or die(mysqli_error());
                    mysqli_query($conn,"insert into Slide( slide_1,slide_2, slide_3,slide_4,user_id,status) values('"."$image_name1"."','"."$image_name2"."','"."$image_name3"."','"."$image_name4"."','$session_id','$status')")or die(mysqli_error());
                   if(move_uploaded_file($image1,"../Uploads/".$image_name1)) {
                    $source = $target_file1;
                    $dest = $source;
                    $size = getimagesize($source);
                    $width = $size[0];
                    $height = $size[1];
                    $rwidth = 275;
                    $rheight = 183;
                    if ($imageFileType1 =='jpeg' || $imageFileType1 == 'jpg') {           
                    $original = imagecreatefromjpeg($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagejpeg($resized, $dest);
                    }elseif ($imageFileType1 =='png') {
                    $original = imagecreatefrompng($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagepng($resized, $dest);
                  }elseif ($imageFileType1 =='gif') {
                    $original = imagecreatefromgif($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagegif($resized, $dest);
                  }
                   }
                    if(move_uploaded_file($image2,"../Uploads/".$image_name2)) {
                    $source = $target_file2;
                    $dest = $source;
                    $size = getimagesize($source);
                    $width = $size[0];
                    $height = $size[1];
                    $rwidth = 275;
                    $rheight = 183;
                    if ($imageFileType2 =='jpeg' || $imageFileType2 == 'jpg') {           
                    $original = imagecreatefromjpeg($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagejpeg($resized, $dest);
                    }elseif ($imageFileType2 =='png') {
                    $original = imagecreatefrompng($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagepng($resized, $dest);
                  }elseif ($imageFileType2 =='gif') {
                    $original = imagecreatefromgif($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagegif($resized, $dest);
                  }
                    }
                    if(move_uploaded_file($image3,"../Uploads/".$image_name3)) {
                    $source = $target_file3;
                    $dest = $source;
                    $size = getimagesize($source);
                    $width = $size[0];
                    $height = $size[1];
                    $rwidth = 275;
                    $rheight = 183;
                    if ($imageFileType3 =='jpeg' || $imageFileType3 == 'jpg') {           
                    $original = imagecreatefromjpeg($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagejpeg($resized, $dest);
                    }elseif ($imageFileType3 =='png') {
                    $original = imagecreatefrompng($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagepng($resized, $dest);
                  }elseif ($imageFileType3 =='gif') {
                    $original = imagecreatefromgif($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagegif($resized, $dest);
                  }
                    }
                    if(move_uploaded_file($image4,"../Uploads/".$image_name4)) {
                      $source = $target_file4;
                    $dest = $source;
                    $size = getimagesize($source);
                    $width = $size[0];
                    $height = $size[1];
                    $rwidth = 275;
                    $rheight = 183;
                    if ($imageFileType4 =='jpeg' || $imageFileType4 == 'jpg') {           
                    $original = imagecreatefromjpeg($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagejpeg($resized, $dest);
                    }elseif ($imageFileType4 =='png') {
                    $original = imagecreatefrompng($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagepng($resized, $dest);
                  }elseif ($imageFileType4 =='gif') {
                    $original = imagecreatefromgif($source);
                    $resized = imagecreatetruecolor($rwidth, $rheight);
                    imagecopyresampled($resized,$original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);
                    imagegif($resized, $dest);
                  }

                    }
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-1"></i>
                            You have changed Home Photo Slide Successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';                                
                    }
                    
                          
    }           
    ?>
    
              <form method="post" action="#" enctype="multipart/form-data">
                <div class="row mb-4">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Slide 1</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="image1" name="image1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Select slide image 1" required>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Slide 2</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="image2" name="image2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Select slide image 2"required>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Slide 3</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="image3" name="image3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Select slide image 3"required>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Slide 4</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="image4" name="image4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Select slide image 4"required>
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