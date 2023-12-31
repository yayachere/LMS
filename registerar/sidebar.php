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
        <a class="nav-link collapsed" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Withdrawal Page" href="withdraw.php">
          <i class="bi bi-person-plus-fill"></i>
          <span>Withdraw</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#registration-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Manage Registration</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="registration-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="register new student" href="add_student.php">
              <i class="bi bi-circle"></i><span>Add New Student</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="register existing student" href="register_student.php">
              <i class="bi bi-circle"></i><span>Register Existing Student</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="set registration status" href="registration.php">
              <i class="bi bi-circle"></i><span>Registration Status</span>
            </a>
          </li>
        </ul>
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
 

    </ul>

  </aside><!-- End Sidebar-->