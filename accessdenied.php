<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
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
  .credits a {
    color: #f2f2f2;
       font-size: 20px;
    text-shadow: 5px 5px 5px;
    text-decoration: underline;
  }
  .credits a:hover {
    text-decoration: none;   

  }
  .glow {
  font-size: 80px;
  color: #fff;
  text-align: center;
  animation: glow 2s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #ddd, 0 0 20px #ddd, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
  }
  
  to {
    text-shadow: 0 0 20px #ddd, 0 0 30px #66FF66, 0 0 40px #66FF66, 0 0 50px #66FF66, 0 0 60px #66FF66, 0 0 70px #66FF66, 0 0 80px #66FF66;
  }
}
    #preloader {
      background: #fff url(Loading_2.gif) no-repeat center center;
      background-size: 10%;
      height: 100vh;
      width: 100%;
      position: fixed;
      z-index: 100;
    }
  </style>
</head>

<body style="background-image: url(Uploads/bg2.jpg);" onpagehide="show()" onpageshow="hide()">
<div id="preloader"></div>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">
<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
<i class="bi bi-x-octagon-fill me-1"></i>
 Wrong UserName or Password Please Try Again.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login<br>
                      <img src="img/vrslogo.png" alt="logo" height="100" width="100" class="rounded-circle"></p>
                  </div>

                  <form action="auth.php" method="post" class="row g-3 needs-validation" novalidate>

                    <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fill your username here" autofocus required>
                    <label for="floatingName">Enter User Name</label>
                    <div class="invalid-feedback">Please enter your User Name!</div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fill your password here" required>
                    <label for="floatingName">Enter Password</label>
                    <div class="invalid-feedback">Please enter your Password!</div>
                  </div>
                </div>

  
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                    </div>

                    <div class="col-4">
                      <p class="small mb-0"><a href="forgot.php">Forgot Password?</a></p>
                    </div>
                  </form>

                </div>
              </div>
            <div class="copyright text-light">
                  &copy; Copyright <strong><span>Sodo City RTA</span></strong>. All Rights Reserved
                </div>
              <div class="credits">

                <a href="mailto:chereyaya16@gmail.com" target="blank">Designed by G8</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>