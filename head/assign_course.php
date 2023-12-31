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
          <li class="breadcrumb-item">Assign_course</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="overflow-x: auto;">
            <div class="card-body">
              <h5 class="card-title">Assign Course</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                  <thead>
                    <tr>
                        <th> School </th>
                        <th> Department </th>
                        <th> Year </th>
                        <th> Semister</th>
                        <th> Program</th>
                        <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                  $queryId = mysqli_query($conn,"SELECT * FROM instructor WHERE user_id = '$session_id'") or die(mysqli_error($conn));
                  $row = mysqli_fetch_array($queryId);
                  $department = $row['department'];
                  $school = $row['school'];

                    $querys = mysqli_query($conn,"SELECT * FROM semister WHERE department = '$department' and school = '$school'");
                    while($rows = mysqli_fetch_assoc($querys)){                                $id=$rows['id'];
                    $year = $rows['year'];
                    $semister = $rows['semister'];
                    $program = $rows['program'];                  
                   ?>
                        <tr>
                          <td> <?php echo $school;?> </td>
                          <td> <?php echo $department;?> </td>
                          <td> <?php echo $year;?> </td>
                          <td > <?php echo $semister;?> </td>
                          <td> <?php echo $program;?> </td>
                          <td><a  href="course_assign.php?school=<?php echo $school;?>&department=<?php echo $department;?>&year=<?php echo $year;?>&semister=<?php echo $semister;?>&program=<?php echo $program;?>" class="btn btn-success" > Assign </a></td>
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