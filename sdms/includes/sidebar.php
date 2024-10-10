<?php
// Ensure to start a session and include your database connection here
session_start();
include('db_connection.php'); // Adjust the path to your database connection file
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar</title>
  <!-- FontAwesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Poppins Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
  <style>
    .main-sidebar {
      background-color: #343a40; /* Dark background color */
      transition: width 0.3s ease;
      width: 250px; /* Default width */
    }

    .main-sidebar.sidebar-collapse {
      width: 80px; /* Width when collapsed */
    }

    .brand-link {
      display: flex;
      align-items: center;
      padding: 0.8rem 1rem;
      background: #343a40;
      border-bottom: 1px solid #495057;
    }

    .brand-image {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      opacity: 0.9;
    }

    .brand-text {
      font-family: 'Poppins', sans-serif;
      font-size: 1.2rem;
      font-weight: 600;
      color: black;
      margin-left: 0.5rem;
    }

    .user-panel {
      display: flex;
      align-items: center;
      padding: 1rem;
    }

    .user-panel .image img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      border: 2px solid #ffffff;
      object-fit: cover;
    }

    .user-panel .info {
      margin-left: 0.5rem;
      color: #ffffff;
    }

    .user-panel .info a {
      color: #ffffff;
      font-family: 'Poppins', sans-serif;
      font-size: 1rem;
      font-weight: 500;
    }

    .nav-sidebar .nav-link {
      color: #eaeaea;
      font-family: 'Poppins', sans-serif;
      font-size: 1rem;
      padding: 0.5rem 1rem;
    }

    .nav-sidebar .nav-link:hover {
      background-color: #495057;
      color: #ffffff;
    }

    .nav-sidebar .nav-link.active {
      background-color: #007bff;
      color: #ffffff;
    }

    .nav-header {
      color: #ffffff;
      font-family: 'Poppins', sans-serif;
      font-size: 1.1rem;
      font-weight: 600;
    }

    /* Hide sidebar content when collapsed */
    .main-sidebar.sidebar-collapse .brand-text,
    .main-sidebar.sidebar-collapse .user-panel .info,
    .main-sidebar.sidebar-collapse .nav-sidebar .nav-link p {
      display: none;
    }
  </style>
</head>
<body>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
    <!-- Brand Logo -->
    <!-- <a href="dashboard.php" class="brand-link">
      <img src="company/logo.png" alt="Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Student Details</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php
        $eid = $_SESSION['sid'];
        $sql = "SELECT * FROM tblusers WHERE id=:eid";                                  
        $query = $dbh->prepare($sql);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
          foreach ($results as $row) {    
            ?>
            <div class="image">
              <img class="img-circle elevation-2" src="staff_images/<?php echo htmlentities($row->userimage);?>" alt="User profile picture">
            </div>
            <div class="info d-none d-md-inline">
              <a href="profile.php" class="d-block"><?php echo ($row->name); ?> <?php echo ($row->lastname); ?></a>
            </div>
            <?php 
          }
        } ?>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="add_student.php" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>Add Student</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="student_list.php" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>Manage Students</p>
            </a>
          </li>
          <!-- New Teachers Management Links -->
          <li class="nav-item">
            <a href="add_teacher.php" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Add Teacher</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="manage_teachers.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Manage Teachers</p>
            </a>
          </li>
          <li class="nav-header">SETTINGS & SECURITY</li>
          <li class="nav-item">
            <a href="userregister.php" class="nav-link">
             <i class="nav-icon far fa-user"></i>
             <p>Register User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="auditlog.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>Audit Logs</p>
            </a>
          </li>
          <li class="nav-header">Print Details</li>
          <li class="nav-item">
        <a href="student_print.php" class="nav-link">
            <i class="nav-icon fas fa-print"></i>
            <p>Print Student</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="print_students_by_class.php" class="nav-link">
            <i class="nav-icon fas fa-print"></i>
            <p>Print Students by Class</p>
        </a>
    </li>
    <li class="nav-item">
    <a href="print_teacher.php" class="nav-link">
        <i class="nav-icon fas fa-print"></i>
        <p>Print Teacher</p>
    </a>
</li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Add the following script to handle the sidebar collapse/expand -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const sidebar = document.getElementById('sidebar');

      document.querySelector('.nav-link[data-widget="pushmenu"]').addEventListener('click', function () {
        sidebar.classList.toggle('sidebar-collapse');
      });
    });
  </script>
</body>
</html>
