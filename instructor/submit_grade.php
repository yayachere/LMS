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
          <li class="breadcrumb-item">Current_Semister</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="overflow-x: auto;">
            <div class="card-body">
              <h5 class="card-title">Current Courses</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                  <thead>
                    <tr>
                        <th> Course Title </th>
                        <th> Course Code </th>
                        <th> Year </th>
                        <th> Semister</th>
                        <th> Program</th>
                        <th> Section </th>
                        <th> Instructor </th>
                        <th> Student </th>
                        <th> Section </th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                    $querys = mysqli_query($conn,"SELECT * FROM grade WHERE instructor_id = '$session_id' and instructor = 'save'");
                    while($rows = mysqli_fetch_assoc($querys)){
                      $id = $rows['id'];
                      $year = $rows['year'];
                      $semister = $rows['semister'];
                      $program = $rows['program'];
                      $section = $rows['section'];
                      $courseTitle = $rows['course_title'];
                   ?>
                        <tr>
                          <td> <?php echo $rows['course_title'];?> </td>
                          <td> <?php echo $rows['course_code'];?> </td>
                          <td> <?php echo $rows['year'];?> </td>
                          <td> <?php echo $rows['semister'];?> </td>
                          <td> <?php echo $rows['program'];?> </td>
                          <td> <?php echo $rows['section'];?> </td>
                          <td> <?php echo $rows['instructor_id'];?> </td>

                          <td><a  href="submit_student_grade.php?year=<?php echo $year;?>&semister=<?php echo $semister;?>&program=<?php echo $program;?>&section=<?php echo $section;?>" class="btn btn-success" > Student </a></td>

                          <td><a  href="submit_section_grade.php?year=<?php echo $year;?>&semister=<?php echo $semister;?>&program=<?php echo $program;?>&section=<?php echo $section;?>&courseTitle=<?php echo $courseTitle;?>" class="btn btn-success" > Section </a></td>
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