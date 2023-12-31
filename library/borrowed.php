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
          <li class="breadcrumb-item">Books</li>
          <li class="breadcrumb-item">Borrowed_books</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="overflow-x: auto;">
            <div class="card-body">
              <h5 class="card-title">Borrowed Books</h5>
        
              <!-- Table with stripped rows -->
              <table class="table datatable">
                  <thead>
                    <tr>
                        <th> Student Name </th>
                        <th> Student Id </th>
                        <th> Book Name </th>
                        <th> Book Code</th>
                        <th> Borrowed on</th>
                        <th> Return Date </th>
                        <th> Status </th>
                        <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                    $querys = mysqli_query($conn,"SELECT * FROM book WHERE status = 'borrowed'");
                    while($rows = mysqli_fetch_assoc($querys)){
                        
                        $id=$rows['id'];                  
                   ?>
                        <tr>
                          <td> <?php echo $rows['student_name'];?> </td>
                          <td> <?php echo $rows['student_id'];?> </td>
                          <td> <?php echo $rows['book_name'];?> </td>
                          <td > <?php echo $rows['book_code'];?> </td>
                          <td> <?php echo $rows['borrowed_on'];?> </td>
                          <td> <?php echo $rows['return_date'];?> </td>
                          <td> <?php echo $rows['status'];?> </td>
                          <td><a href="borrowed_detail.php?ID=<?php echo $id;?>" class="btn btn-success">Detail</td>
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