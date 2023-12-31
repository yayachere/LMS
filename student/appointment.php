<?php include('header.php');?>

<!DOCTYPE html>
<html lang="en">

<body>

  <!-- ======= Header ======= -->
<?php include('navbar.php');?>
  <!-- ======= Sidebar ======= -->
  <!-- End Sidebar-->
<?php include('sidebar.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Appointment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

           <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fill Appointment Form</h5>
 <?php

                                include('../dbcon.php');
                                date_default_timezone_set("Africa/Addis_Ababa");
                                
              if (isset($_POST['enter'])){
                                $user_id = $session_id;
                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $day = $_POST['day'];
                                $time = $_POST['time'];
                                $cdate = date('Y-m-d');
                                $tw = date('A');

                   if ($tw == "AM") {
                     $ctime = date("h:i");
                   }else {
                    $d = strtotime("+0 Hours");                                
                   $ctime = date("H:i", $d);

                   }
                                $appoint_on = date("Y-m-d h:i:s");
                             
                                $query = "SELECT * FROM appointment WHERE date='$day' && time= '$time'";
                                $result = mysqli_query($conn,$query)or die(mysqli_error());
                                $row= mysqli_fetch_array($result);

                if(mysqli_num_rows($result) >= 1)  {
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                    <strong>Failed! </strong>This Appointment is already Taken!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';             

                                
                }elseif (($day) < ($cdate)) {
                   echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                    <strong>Failed! </strong>Incorrect Date Input Please Try Again!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>'; 

                }elseif (($day) == ($cdate) && ($time) <= ($ctime)) {
                  echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                    <strong>Failed! </strong>Incorrect Time Input Please Try Again!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                  
                }
              
                else {

                  $qry = "INSERT INTO appointment(user_id,fname,lname,date,time,appoint_on) values('$user_id','$fname','$lname','$day','$time','$appoint_on')"or die(mysqli_error( $conn));
                  if (mysqli_query($conn, $qry)) {
                          $last_id = mysqli_insert_id($conn);
                     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-1"></i>
                      <strong>Sent!</strong> Your Appointment Added Successfully!<br>
                    Your Id_Number is '.$last_id.'
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                  }
                  else {
                      echo "Error: " . $qry . "<br>" . mysqli_error($conn);
                       }

                            }
                            }

                                ?>
              <!-- Floating Labels Form -->
              <form method="post" action="#" class="row g-3">
                <?php
                       $qu=mysqli_query($conn,"select * from users_account where user_id='$session_id'")or die(mysqli_error($conn));
                        $ro=mysqli_fetch_array($qu);
                        $fname=$ro["f_name"];
                        $lname =$ro["l_name"];
                           ?>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name:" value="<?php echo $fname;?>" >
                    <label for="floatingName">First Name:</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name:" value="<?php echo $lname;?>" >
                    <label for="floatingName">Last Name:</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="day" name="day"
                     min="1979-12-31" placeholder="Choose Date" required="">
                    <label for="floatingName">Choose Date:</label>
                  </div>
                </div>
                   <div class="form-floating mb-3">
                      <select class="form-select" name="time" id="time" aria-label="Floating label select example" required>
                        <option disabled selected></option>
                        <option value="08:30">02:30 - 03:00AM</option>
                        <option value="09:00">03:00 - 03:30AM</option>
                        <option value="09:30">03:30 - 04:00AM</option>
                        <option value="10:00">04:00 - 04:30AM</option>
                        <option value="10:30">04:30 - 05:00AM</option>
                        <option value="11:00">05:00 - 05:30AM</option>
                        <option value="11:30">05:30 - 06:00AM</option>
                        <option value="14:00">08:00 - 08:30PM</option>
                        <option value="14:30">08:30 - 09:00PM</option>
                        <option value="15:00">09:00 - 09:30PM</option>
                        <option value="15:30">09:30 - 10:00PM</option>
                        <option value="16:00">10:00 - 10:30PM</option>
                        <option value="16:30">10:30 - 11:00PM</option>
                      </select>
                      <label for="type">Choose appointment time from the list:</label>
    </div>
           
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="enter">Appoint</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

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