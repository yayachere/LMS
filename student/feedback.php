
<?php include('header.php');

?>
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
          <li class="breadcrumb-item active">Feedback</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   <section class="section contact">

      <div class="row gy-4">

        <div class="col-md-9">
          <div class="card p-4">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM users_account WHERE user_id = '$session_id'") OR die(mysqli_error($conn));
            $row = mysqli_fetch_array($query);
            $firstName = $row['first_name'];
            $lastName = $row['last_name'];
            $email = $row['email'];
            $user_type = $row['account_type'];
            $fullName = $firstName. " " .$lastName;
    
  
                
                if (isset($_POST['send'])){
                $name = ucwords($_POST['name']);
                $e_mail = $_POST['email'];
                $text = $_POST['msg']; 
                $to_user = $_POST['to_user'];
                $Today = date('y:m:d'); 


                // check if name only contains letters and whitespace
                        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                    <strong>Failed! </strong>Only letters and white space allowed for name!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }
                        elseif ($email == '') {
                          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                    <strong>Failed! </strong>You need to fillout your e_mail address on your profile to send feedback!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }else { 

                $query = "insert into feedback (user_name,to_user,user_type,comment,email,date) values('$name','$to_user','$user_type','$text','$e_mail','$Today')";
                $result = mysqli_query($conn,$query)or die(mysqli_error($conn));
                
                if( $result==1){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle-fill me-1"></i>
                  <strong>Sent!</strong> Your Message Has Been Sent Successfully!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
                else{
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-octagon-fill me-1"></i>
                   <strong>Failed!</strong> Error In Sending Message!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';

                }}}
                ?>

            <form action="#" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-12">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $fullName;?>" readonly>
                </div>

                <div class="col-md-12 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" value="<?php echo $email;?>" readonly>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="msg" rows="6" placeholder="Message" required></textarea>
                </div>
                <div class="form-floating col-md-12 mt-3 mb-3">
          <select class="form-select" name="to_user" id="to_user" aria-label="Floating label select example" required>
            <option disabled selected></option>
            <option value="head">Head</option>
            <option value="instructor">Instructors</option>
          </select>
          <label for="type">Choose User:</label>
    </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit" name="send">Send Message</button>
                </div>

              </div>
            </form>
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