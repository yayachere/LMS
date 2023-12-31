  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Home Page" class="logo d-flex align-items-center">
        <img src="../assets/img/vrslogo.png" alt="">
        <span class="d-none d-lg-block">Employee Page</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Toggle sidebar"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <?php

                  $result = mysqli_query($conn, "SELECT * FROM users_account where user_id='$session_id'") or die(mysqli_error());
                  $data = mysqli_fetch_array($result);
                  $pic = $data["pro_image"];
                  ?>
            <img src="../Uploads/<?php echo $pic; ?>" alt="Profile" class="rounded-circle" width = "50" height = "50">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $data['f_name'] . " " . $data['l_name']; ?> </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo $data['f_name'] . " " . $data['l_name']; ?> </h6>
              <span> <?php echo ucfirst($data['user_type']); ?> </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a type="button" class="dropdown-item d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#disablebackdrop">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
<div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                 <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-danger">Logout?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      are you sure you want to logout from this account?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-bs-dismiss="modal" >No</button>
                      <a href="logout.php" type="button" class="btn btn-danger">Yes</a>
                    </div>
                  </div>
                </div>
              </div><!-- End Disabled Backdrop Modal-->

  </header><!-- End Header -->
