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
        <a class="nav-link collapsed"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Student Feedback" href="feedback.php">
          <i class="bi bi-plus-square-fill"></i>
          <span>Feedback</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Course List" href="courses.php">
          <i class="bi bi-plus-square-fill"></i>
          <span>Courses</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#grade-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Manage Grade</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="grade-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add Current Semister Grade" href="current_semister.php">
              <i class="bi bi-circle"></i><span>Add Current Semister</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Current Semister Grade" href="update_current_semister.php">
              <i class="bi bi-circle"></i><span>Update Current Semister</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Submit Grade" href="submit_grade.php">
              <i class="bi bi-circle"></i><span>Submit Grade</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Previous Semister" href="previous_semister.php">
              <i class="bi bi-circle"></i><span>Previous Semister</span>
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
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Post News for students" href="news.php">
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