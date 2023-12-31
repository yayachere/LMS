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
          <li class="breadcrumb-item">Appointment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

              <div class="card" style="overflow-x: auto;">
              <div class="card-body">
              <h5 class="card-title">Appointment List</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable table-striped table-bordered table-hover">
                <thead>
           <tr class="table-dark">
        <th>User_Id</th>
        <th>Customer Name</th>       
        <th>Date</th>
        <th>Time</th>
        <th class="head0"><center> Action </center></th>      
      </tr>
                </thead>
                <tbody>
       <?php
 
                                  $querys = mysqli_query($conn,"SELECT * FROM appointment");
                                  $array = array();
                                  while($rows = mysqli_fetch_assoc($querys)){
                                  $array[] = $rows; 
                                 $idd = $rows['id'];
                                 $time =$rows['time'];
                                 $dmmin=mktime(8, 00);
                                 $dmmax=mktime(12, 00);
                                 $mmin = date("h:iA", $dmmin);
                                 $mmax = date("h:iA", $dmmax);
                                  ?>
                        <tr>

                            <td><?php echo $rows['user_id'];?></td>
                            <td><?php echo $rows['fname']. " " . $rows['lname'];?></td>                            
                            <td><?php echo $rows['date'];?></td>
                            <?php if ($time > $mmin && $time < $mmax) { ?>
                              <td><?php echo $time;?> AM</td>
                            <?php }else { ?>
                              <td><?php echo $time;?> PM</td>
                              <?php }?>
                       
                          <td class="text-center"><a  href=" delete_appointment.php?ID=<?php echo $idd;?> " data-toggle="modal" class="btn btn-danger" name="delete"><b>Delete</b></a> </td>

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