<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home Page" href="index.php">
          <i class="bi bi-house-fill"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User feedback" href="feedback.php">
          <i class="bx bxs-comment-dots"></i>
          <span>Feedback</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Signup requests" href="signup.php">
          <i class="bi bi-person-plus-fill"></i>
          <span>Manage SignUp</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#news-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Manage News</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="news-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Post News for users" href="news.php">
              <i class="bi bi-circle"></i><span>Post News</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit posted news" href="edit_news.php">
              <i class="bi bi-circle"></i><span>Edit News</span>
            </a>
          </li>
        </ul>
      </li>

     <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#mission-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-flag-fill"></i><span>Manage Vision & Mission</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="mission-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add new mission and vision" href="mission.php">
              <i class="bi bi-circle"></i><span>Upload Mission & Vision</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="update mission and vision" href="managemission.php">
              <i class="bi bi-circle"></i><span>Change Mission & Vision</span>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#slide-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-image-fill"></i><span>Manage Slide Photo</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="slide-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add photo slide" href="uploadslide.php">
              <i class="bi bi-circle"></i><span>Upload Slide</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change photo slide" href="manageslide.php">
              <i class="bi bi-circle"></i><span>Change Slide</span>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-circle"></i><span>Manage User Account</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add new user" href="adduser.php">
              <i class="bi bi-circle"></i><span>Add Account</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update user account" href="updateuser.php">
              <i class="bi bi-circle"></i><span>Update Account</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete user account" href="deleteuser.php">
              <i class="bi bi-circle"></i><span>Delete Account</span>
            </a>
          </li>
           <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change account status" href="activateuser.php">
              <i class="bi bi-circle"></i><span>Activate / De-activate</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
    </ul>

  </aside><!-- End Sidebar-->