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
          <li class="breadcrumb-item">Mission & Vision</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="overflow-x: auto;">
            <div class="card-body">
              <h5 class="card-title">List of Mission and Vision</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable table-bordered table-striped">
                <thead>
                  <tr>
                       <th>Mission</th>
                      <th>Vision</th>
                      <th>ACTION</th> 
                  </tr>
                </thead>
                <tbody>
       <?php 
                  $sta="Off";
                    $querys = mysqli_query($conn,"SELECT * FROM mission ");
                  $array = array();
                  while($rows = mysqli_fetch_assoc($querys)){
                  $array[] = $rows; 
                  $idnum = $rows['id'];
                  $status=$rows['status'];
                  $pic1=$rows['en_mission'];                  
                  $pic2=$rows['en_vission'];
                  
                  
          ?>
                        <tr class="gradeX">
                             <td><?php echo $pic1;?></td>
                            <td><?php echo $pic2;?></td>
                            
                            
              <td class="center">
              <?php 
              if($status==$sta){
              echo '<a  href=" updatemission.php?ID='.$idnum.'" data-toggle="modal" class="btn btn-success">Activate</a>&nbsp;&nbsp;&nbsp;&nbsp;<br>
                    <a  href=" deletemission.php?ID='.$idnum.'" data-toggle="modal" class="btn btn-danger">Delete</a>  ';
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