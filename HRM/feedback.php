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
          <li class="breadcrumb-item">Feedback</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="overflow-x: auto;">
            <div class="card-body">
              <h5 class="card-title">Feedback Table</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                  <thead>
                    <tr>
                        <th> Sender Name </th>
                        <th> Subject </th>
                        <th> Comment </th>
                        <th> E-mail</th>
                        <th> Date</th>
                        <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                    $querys = mysqli_query($conn,"SELECT * FROM Feedback WHERE to_user = 'hrm'");
                    while($rows = mysqli_fetch_assoc($querys)){
                    $array[] = $rows; 
                                    $id=$rows['id'];                  
                   ?>
                        <tr>
                          <td name="occ_on"> <?php echo $rows['user_name'];?> </td>
                          <td name="occ_on"> <?php echo $rows['subject'];?> </td>
                          <td name="occ_on"> <?php echo $rows['comment'];?> </td>
                          <td > <?php echo $rows['email'];?> </td>
                          <td name="event_for"> <?php echo $rows['date'];?> </td>
                          <td><a  href="deletefeedback.php?ID=<?php echo $id;?>" class="btn btn-danger" > Delete </a></td>
                        </tr><?php } ?>
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