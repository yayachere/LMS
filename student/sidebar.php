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
        <a class="nav-link collapsed"data-bs-toggle="tooltip" data-bs-placement="bottom" title="News Page" href="news.php">
          <i class="bi bi-newspaper"></i>
          <span>News</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Give us your feedback" href="feedback.php">
          <i class="bi bi-chat-left-text-fill"></i>
          <span>Feedback</span>
        </a>
      </li>

      <?php
       $query = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$session_id'") or die(mysqli_error($conn));
       $row = mysqli_fetch_array($query);
       $program = $row['program'];

       $querySemister = mysqli_query($conn, "SELECT * FROM semister WHERE program = '$program'") or die(mysqli_error($conn));
       $data = mysqli_fetch_array($querySemister);
       $registration = $data['registration'];

       if ($registration == 'open') {
         echo '<li class="nav-item">
        <a class="nav-link collapsed"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Register for the next semister" href="register.php">
          <i class="ri-car-fill"></i>
          <span>Register</span>
        </a>
      </li>';
       }
      ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#news-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Assessment Result</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="news-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="current semister result" href="assessment.php">
              <i class="bi bi-circle"></i><span>Current Semister</span>
            </a>
          </li>
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Transcript for all courses taken" href="transcript.php">
              <i class="bi bi-circle"></i><span>Transcript</span>
            </a>
          </li>
        </ul>
      </li>
      
    </ul>

  </aside><!-- End Sidebar-->