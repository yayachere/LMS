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
        <a class="nav-link collapsed" data-bs-target="#Instructor-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Head & Instructors</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Instructor-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add New Instructor" href="add_instructor.php">
              <i class="bi bi-circle"></i><span>Add Account</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Instructor Password" href="update_instructor.php">
              <i class="bi bi-circle"></i><span>Update Account</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Instructor" href="delete_instructor.php">
              <i class="bi bi-circle"></i><span>Delete Account</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change Instructor Status" href="activate_instructor.php">
              <i class="bi bi-circle"></i><span>Activate/De-Activate</span>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#officer-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-circle"></i><span>Manage Officer</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="officer-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add new user" href="add_officer.php">
              <i class="bi bi-circle"></i><span>Add Officer</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update user account" href="update_officer.php">
              <i class="bi bi-circle"></i><span>Update Officer</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete user account" href="delete_officer.php">
              <i class="bi bi-circle"></i><span>Delete Officer</span>
            </a>
          </li>
           <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change account status" href="activate_officer.php">
              <i class="bi bi-circle"></i><span>Activate / De-activate</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
    </ul>

  </aside><!-- End Sidebar-->