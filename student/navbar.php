  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Student Home Page">
        <img src="../assets/img/vrslogo.png" alt="logo">
        <span class="d-none d-lg-block">Student Page</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <?php
function time_ago_function($database_time) {

  $time_ago = strtotime($database_time);
  $current_time = time();
  $time_differ = $current_time - $time_ago;
  $seconds = $time_differ;
  $minutes = round($seconds/ 60);
  $hours = round($seconds/ 3600);
  $days = round($seconds/ 86400 );
  $weeks = round($seconds/ 604800);
  $months = round($seconds/ 2629440);
  $years = round($seconds/ 31553280);

  if ($seconds <= 60) {
    return "just now";
}elseif ($minutes <= 60) {
  if ($minutes == 1) {
    return "a minute ago";
  }else {
    return "$minutes minutes ago";
  }
}elseif ($hours <= 24) {
  if ($hours == 1) {
    return "an hour ago";
  }else {
    return "$hours hours ago";
  }
}elseif ($days <= 7) {
  if ($days == 1) {
    return "yesterday";
  }else {
    return "$days days ago";
  }
}elseif ($weeks <= 4.3) {
  if ($weeks == 1) {
    return "a week ago";
}else {
  return "$weeks weeks ago";
}
}elseif ($months <= 12) {
  if ($months == 1) {
    return "a month ago";
  }else {
    return "$months months ago";
  }
}else {
  if ($years == 1) {
    return "a year ago";
  }else {
    return "$years years ago";
  }
}
}
                  $result = mysqli_query($conn, "SELECT * FROM users_account where user_id='$session_id'") or die(mysqli_error());
                  $data = mysqli_fetch_array($result);
                  $pic = $data["profile_pic"];
                  ?>
            <img src="../Uploads/<?php echo $pic; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $data['first_name'] . " " . $data['last_name']; ?> </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo $data['first_name'] . " " . $data['last_name']; ?> </h6>
              <span> <?php echo $data['account_type']; ?> </span>
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
