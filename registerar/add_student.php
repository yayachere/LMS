<?php include('header.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="../jquery-3.6.0.js"></script>
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
  <!-- ======= Sidebar ======= -->
<?php include('sidebar.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Add_user</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fill The User Information Below</h5>
              <!--Begin the validation states--->
<?php 

if (isset($_POST['register'])) {   
            
    $firstName = test_input(ucfirst($_POST['firstName']));
    $middleName = test_input(ucfirst($_POST['middleName']));
    $lastName = test_input(ucfirst($_POST['lastName']));
    $fullname = $firstName."".$middleName."".$lastName;
    $department = test_input($_POST['department']);
    $gender = test_input($_POST['gender']);
    $school = test_input($_POST['school']);
    $program = $_POST['program'];
    $enrolledOn = date("Y-m-d");
    $year = "1";
    $semister = "1";
    $position = $department." Student";
    $accountStatus = "Active";
    $accountType = "student";
    $yr = date('y');

    if ($gender == "male") {
       $profileImage = "male.png";
     }else {
     $profileImage = "women.png";

     }
    
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $str = str_shuffle($str);
    $passwordd = substr($str, 0,10);
    $pass=base64_encode($passwordd);
    $password = md5($passwordd);


    if($department == "Information Technology" && $program == "regular") {

      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      } 
                      $id+= 1;   
      $studentId = "IT/RE/".$id."/".$yr;
    }
    elseif($department == "Information Technology" && $program == "weekend") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1; 
      $studentId = "IT/WE/".$id."/".$yr;
    }
    elseif($department == "Information Technology" && $program == "summer") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      } 
                      $id+= 1;
      $studentId = "IT/SU/".$id."/".$yr;
    }
    elseif($department == "Information Technology" && $program == "night") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      } 
                      $id+= 1;
      $studentId = "IT/ni/".$id."/".$yr;
    }
    elseif($department == "Information Science" && $program == "regular") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      } 
                      $id+= 1;
      $studentId = "IS/RE/".$id."/".$yr;
    }
    elseif($department == "Information Science" && $program == "weekend") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1; 
      $studentId = "IS/WE/".$id."/".$yr;
    }
    elseif($department == "Information Science" && $program == "night") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1;
      $studentId = "IS/NI/".$id."/".$yr;
    }
    elseif($department == "Information Science" && $program == "summer") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1;
      $studentId = "IS/SU/".$id."/".$yr;
    }
    elseif($department == "Computer Science" && $program == "regular") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1;
      $studentId = "CS/RE/".$id."/".$yr;
    }
    elseif($department == "Computer Science" && $program == "weekend") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1;
      $studentId = "CS/WE/".$id."/".$yr;
    }
    elseif($department == "Computer Science" && $program == "night") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1;
      $studentId = "CS/NI/".$id."/".$yr;
    }
    elseif($department == "Computer Science" && $program == "summer") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1;
      $studentId = "CS/SU/".$id."/".$yr;
    }
    elseif($department == "Software Engineering" && $program == "regular") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1;
      $studentId = "IS/RE/".$id."/".$yr;
    }
    elseif($department == "Software Engineering" && $program == "weekend") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1;
      $studentId = "IS/WE/".$id."/".$yr;
    }
    elseif($department == "Software Engineering" && $program == "night") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1;
      $studentId = "IS/NI/".$id."/".$yr;
    }
    elseif($department == "Software Engineering" && $program == "summer") {
      $ab = mysqli_query($conn,"SELECT * FROM student where department ='$department' and program = '$program'"); 
                      $id=0;
                      while($na= mysqli_fetch_array($ab)){
                      $id++;
                      
                      }
                      $id+= 1;
      $studentId = "IS/SU/".$id."/".$yr;
    }

     $documentName = $_FILES['document']['name'];
     $document = $_FILES['document']['tmp_name'];
     $targetDir = "../Uploads/";
     $targetFile = $targetDir . basename($_FILES["document"]["name"]);
     $documentFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

     //check if student id exists with the same depatment and program
     
     $idRow = "SELECT * FROM student WHERE student_id='$studentId'";
     $result = mysqli_query($conn,$idRow)or die(mysqli_error($conn));
     $num_row = mysqli_num_rows($result);

                  
//check if name contains letter and space

    if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
                          
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle-fill me-1"></i>
        <strong>Failed! </strong>Only letters and white space allowed for name!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

    else if($num_row >= 1) {

        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
          <i class="bi bi-info-circle-fill me-1"></i>
          <strong>Failed! </strong>This Student id '.$studentId. ' already exists!!              
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                    }


    else if($documentFileType != "pdf" && $documentFileType != "doc" && $documentFileType != "docx") {

        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
          <i class="bi bi-info-circle-fill me-1"></i>
          <strong>Failed! </strong>Only<strong> doc, docx AND pdf</strong> file formats are allowed for document field!!              
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                    }
               
    else {

      $student = mysqli_query($conn,"insert into student(student_id,first_name,middle_name,last_name,school,department,year,semister,program,enrolled_on,document,gender,semister_status) values('$studentId','$firstName','$middleName','$lastName','$school','$department','$year','$semister','$program','$enrolledOn','$document','$gender','registered')")or die(mysqli_error($conn));

      $user = mysqli_query($conn,"insert into users_account( user_id,first_name,last_name,account_type,profile_pic,password,account_status,gender) values('$studentId','$firstName','$middleName','$accountType','$profileImage','$password','$accountStatus','$gender')")or die(mysqli_error($conn));

      if ($student == true && $user == true) {
        move_uploaded_file($document,"../Uploads/".$documentName);

          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i>
            New '. $accountType. ' Account Created successfully!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';?>

      <a href='print.php?firstName=<?php echo $firstName;?>&lastName=<?php echo $middleName;?>&userId=<?php echo $studentId;?>&password=<?php echo $passwordd;?>' class="btn btn-success">Print</a>
      
       
                          
          <?php  }
          else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle-fill me-1"></i>
              Failed to register new student!!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          }

        }}  ?>

<form action="#" method="post"  enctype="multipart/form-data">

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="uid" name="firstName" placeholder="Enter First Name" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter first name here" required="">
          <label for="floatingInput">First Name</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="uid" name="middleName" placeholder="Enter Father Name" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Father Name here" required="">
          <label for="floatingInput">Father Name</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="uid" name="lastName" placeholder="Enter Grand Father Name" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Grand Father Name here" required="">
          <label for="floatingInput">Grand Father Name</label>
        </div>

    <div class="form-floating mb-3">
          <input type="text" class="form-control" id="school" name="school" placeholder="Enter schoo here" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter School here" required>
          <label for="floatingInput">School</label>
        </div>

    <div class="form-floating col-md-12 mt-3 mb-3">
          <select class="form-select" name="program" id="program" aria-label="Floating label select example" required>
            <option disabled selected></option>
            <option value="regular">Regular</option>
            <option value="weekend">Weekend</option>
            <option value="night">Night</option>
            <option value="summer">Summer</option>
           
          </select>
          <label for="type">Program:</label>
    </div>

    <div class="form-floating col-md-12 mt-3 mb-3">
          <select class="form-select" name="department" id="department" aria-label="Floating label select example" required>
            <option disabled selected></option>
            <option value="information_technology">Information Technology</option>
            <option value="computer_science">Computer Science</option>
            <option value="information_science">Information Science</option>
            <option value="software_engineering">Software Engineering</option>
           
          </select>
          <label for="type">Department:</label>
    </div>

    <div class="form-floating col-md-12 mt-3 mb-3">
          <select class="form-select" name="gender" id="gender" aria-label="Floating label select example" required>
            <option disabled selected></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
           
          </select>
          <label for="type">Gender:</label>
    </div>

    <div class="form-floating mb-3">
          <input type="file" class="form-control" id="document" name="document" placeholder="Enter Student Document" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Student Document" required>
          <label for="floatingInput">Student Document</label>
    </div>

    <div class="row mb-3 mt-3">
      <div class="col-sm-10 text-center">
        <button type="submit" class="btn btn-primary" name="register" >Register</button>
        <button type="reset" class="btn btn-danger">Clear</button>
      </div>
    </div>

</form><!-- End General Form Elements -->

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
<?php
function test_input($data) {
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
</body>

</html>