<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light bg-light border-bottom">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="dashboard.php" class="nav-link">Home</a>
    </li>
  </ul>

  <!-- Navbar Brand -->
  <a href="#" class="navbar-brand mx-auto text-center">
    <img src="staff_images/logo.png" alt="Logo" class="brand-logo">
    <span class="ml-2 brand-text">Student Management System</span>
  </a>

  <!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-th-large"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="profile.php">
        <i class="fas fa-user-circle dropdown-icon"></i> <span class="dropdown-text">Profile</span>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="changepassword.php">
        <i class="fas fa-cogs dropdown-icon"></i> <span class="dropdown-text">Settings</span>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item text-danger" href="logout.php">
        <i class="fas fa-sign-out-alt dropdown-icon"></i> <span class="dropdown-text">Logout</span>
      </a>
    </div>
  </li>
</ul>

</nav>
<!-- /.navbar -->

<!-- Add the following in the <head> section of your HTML or in a CSS file -->
<style>
  .navbar {
    padding: 0.5rem 1rem;
  }
  .brand-logo {
    width: 50px;
    height: 50px;
    vertical-align: middle;
    border-radius: 50%;
  }
  .brand-text {
    font-family: 'Poppins', sans-serif;
    font-size: 1.6rem;
    font-weight: 600;
    color: #333;
    transition: color 0.3s ease;
  }
  .brand-text:hover {
    color: #007bff;
  }
  .navbar-nav .nav-link {
    font-size: 1.1rem;
    font-weight: 500;
    color: #555;
    transition: color 0.3s ease;
  }
  .navbar-nav .nav-link:hover {
    color: #007bff;
  }
  .dropdown-menu {
    min-width: 200px; /* Adjust width as needed */
  }

  .dropdown-item {
    display: flex;
    align-items: center;
  }

  .dropdown-icon {
    font-size: 1.2rem; /* Adjust icon size */
    margin-right: 10px; /* Space between icon and text */
  }

  .dropdown-text {
    font-size: 1rem; /* Adjust text size if needed */
  }
</style>

<!-- Ensure you have FontAwesome included in your project for the icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Ensure you have Poppins font included -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
