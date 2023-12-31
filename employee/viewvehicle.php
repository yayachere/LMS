<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>

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
          <li class="breadcrumb-item">Manage Vehicle</li>
          <li class="breadcrumb-item active">View</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

              <div class="card" style="overflow-x: auto;">
              <div class="card-body">
              <h5 class="card-title">Vehicle Table</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable table-striped table-bordered table-hover">
                <thead>
           <tr class="table-dark">
        <th>Owner's Name</th>
        <th>Brand</th>
        <th>Plate_No</th>
        <th>Reg_No</th> 
        <th>Action</th>     
      </tr>
                </thead>
                <tbody>
       <?php
                    
                                  $querys = mysqli_query($conn,"SELECT * FROM vehicle");
                                  $array = array();
                                  while($rows = mysqli_fetch_assoc($querys)){
                                  $array[] = $rows; 
                                 $idnum = $rows['regnum'];
                                  ?>
                        <tr>
                            <td><?php echo $rows['f_name']. " " . $rows['l_name'];?></td>                           
                            <td><?php echo $rows['brand'];?></td>
                            <td><?php echo $rows['cid'];?></td>
                            <td><?php echo $rows['regnum'];?></td>
                            <td class="text-center"><a  href=" view_details.php?ID=<?php echo $idnum;?> " data-toggle="modal" class="btn btn-success"><b>Details</b></a> </td>
                          

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