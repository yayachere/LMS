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
          <li class="breadcrumb-item">Registration</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="overflow-x: auto;">
            <div class="card-body">
              <h5 class="card-title">Course Table</h5>
              
              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr>
                    <th >Course Title</th>
                    <th >Course Code</th>
                    <th >Credit Hour</th>
                    <th >Assignment</th> 
                    <th >Mid Exam</th>
                    <th >Quiz</th> 
                    <th >Practice</th>
                    <th >Final</th>                        
                  </tr>
                </thead>
                <tbody>
    <?php
          $queryStudent = mysqli_query($conn,"SELECT * FROM student WHERE student_id = 
            '$session_id'") or die(mysqli_error($conn));
          $rows = mysqli_fetch_assoc($queryStudent);
          $school = $rows['school'];
          $department = $rows['department'];
          $year = $rows['year'];
          $semister = $rows['semister'];
          $program = $rows['program'];
          $thisSemister = $rows['semister_number'];

          $queryGrade = mysqli_query($conn, "SELECT * FROM grade WHERE student_id = '$session_id' and year = '$year' and semister = '$semister' and status = 'active'") or die(mysqli_error($conn));

          $numRow = mysqli_num_rows($queryGrade);
          $countCourse = 0;
          $totalCreditHour = 0;
          if(!$numRow > 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-info-circle-fill me-1"></i>
          <strong>Sorry! </strong>You do not have any assessment result in this semister!!              
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          
          }else {

          while($row = mysqli_fetch_array($queryGrade)) { 
          $countCourse++;
          $courseTitle = $row['course_title'];
          $courseCode = $row['course_code'];
          $creditHour = $row['credit_hour'];
          $semisterCreditHour += $creditHour;
    ?>
                <tr>
                    <td><?php echo $courseTitle;?></td>
                    <td><?php echo $courseCode;?></td>
                    <td><?php echo $creditHour;?></td>
                    <td><?php echo $assignment;?></td>
                    <td><?php echo $midExam;?></td>
                    <td><?php echo $quiz;?></td>
                    <td><?php echo $practice;?></td>
                    <td><?php echo $final;?></td>
                </tr> <?php }} ?>
                </tbody>
                <tfooter>
                  <tr class="bg-dark text-light">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th >No. of Courses:<?php echo $countCourse;?></th>
                    <th >Total Credit Hour<?php echo $totalCreditHour;?></th>
                    <th >Year:<?php echo $year;?></th>
                    <th >Semister:<?php echo $semister;?></th>                          
                  </tr>
                </tfooter>
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