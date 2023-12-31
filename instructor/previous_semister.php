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
          <li class="breadcrumb-item">Previous Student</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="overflow-x: auto;">
            <div class="card-body">
              <h5 class="card-title">Previous Students</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                      <th> Student Name </th>
                      <th> Student Id </th>
                      <th> Year </th>
                      <th> Semister</th>
                      <th> Program</th>
                      <th> Course Title </th>
                      <th> Section </th>
                      <th> Action </th>
                  </tr>
                </thead>
                  <tbody>
                 <?php
    
                    $querys = mysqli_query($conn,"SELECT * FROM grade WHERE instructor_id = '$session_id' and instructor = 'submit' and head = 'declined'") or die(mysqli_error($conn));

                    while($rows = mysqli_fetch_assoc($querys)){
                      $id = $rows['id'];
                      $school = $rows['school'];
                      $department = $rows['department'];
                      $year = $rows['year'];
                      $semister = $rows['semister'];
                      $program = $rows['program'];
                      $section = $rows['section'];
                      $courseTitle = $rows['course_title'];
                      $courseCode = $rows['course_code'];
                      $studentName = $rows['student_name'];
                      $studentId = $rows['student_id'];
                    
                   ?>
                        <tr>
                          <td> <?php echo $studentName;?> </td>
                          <td> <?php echo $studentId;?> </td>
                          <td> <?php echo $year;?> </td>
                          <td> <?php echo $semister;?> </td>
                          <td> <?php echo $program;?> </td>
                          <td> <?php echo $courseTitle;?> </td>
                          <td> <?php echo $section;?> </td>
                          
                          <td><a  href="previous_semister_grade.php?id=<?php echo $id;?>&studentName=<?php echo $studentName;?>&studentId=<?php echo $studentId;?>&school=<?php echo $school;?>&department=<?php echo $department;?>&year=<?php echo $year;?>&semister=<?php echo $semister;?>&program=<?php echo $program;?>&section=<?php echo $section;?>&courseTitle=<?php echo $courseTitle;?>&courseCode=<?php echo $courseCode;?>" class="btn btn-success" > Select </a></td>
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