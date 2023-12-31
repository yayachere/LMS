<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
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
  <main id="main" class="main">
<div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Mange Slide</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="overflow-x: auto;">
            <div class="card-body">
              <h5 class="card-title">List of Slides</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                      <th>Slide1</th>
                      <th>Slide2</th>
                      <th>Slide3</th>
                      <th>Slide4</th>
                      <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
       <?php 
                  $sta="Off";
                    $querys = mysqli_query($conn,"SELECT * FROM Slide ");
                  $array = array();
                  while($rows = mysqli_fetch_assoc($querys)){
                  $array[] = $rows; 
                  $idnum = $rows['id'];
                  $status=$rows['status'];
                  $pic1=$rows['slide_1'];
                  $pic2=$rows['slide_2'];
                  $pic3=$rows['slide_3'];
                  $pic4=$rows['slide_4'];
          ?>
                        <tr class="gradeX">
                            <td><img style="width:150px;" src="../Uploads/<?php echo $pic1;?>" data-thumb="1.jpg" alt="" /></td>
              <td><img style="width:150px;" src="../Uploads/<?php echo $pic2;?>" data-thumb="toystory.jpg" alt="" /></td>
                            <td><img style="width:150px;" src="../Uploads/<?php echo $pic3;?>" data-thumb="wineries.jpg" alt="" /></td>
                            <td><img style="width:150px;" src="../Uploads/<?php echo $pic4;?>"  alt="" data-transition="slideInLeft" /></td>
              <td class="center">
              <?php 
              if($status==$sta){
              echo '<a  href=" updateslide.php?ID='.$idnum.'" data-toggle="modal" class="btn btn-success mb-1">Activate</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a  href=" deleteslide.php?ID='. $idnum. '" data-toggle="modal" class="btn btn-danger">Delete</a>  ';
              }
              ?>
              </td>
                        </tr> <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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