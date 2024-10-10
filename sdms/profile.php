<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid'])==0) {
  header('location:logout.php');
} else {
  if(isset($_POST['submit'])) {
    $eid = $_SESSION['sid'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $name = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $sql = "UPDATE tblusers SET name=:name, username=:username, mobile=:mobile, email=:email, lastname=:lastname WHERE id=:eid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    echo '<script>alert("Profile updated successfully")</script>';
    echo "<script>window.location.href ='profile.php'</script>";
  }
?>

<?php @include("includes/head.php"); ?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php @include("includes/header.php"); ?>
    <!-- /.navbar -->

    <!-- Side bar and Menu -->
    <?php @include("includes/sidebar.php"); ?>
    <!-- /.sidebar and menu -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br>
      <div class="container">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Update User Profile</h6>
          </div>
          <div class="card-body">
            <form method="post">
              <?php
              $eid = $_SESSION['sid'];
              $sql = "SELECT * FROM tblusers WHERE id=:eid";                                  
              $query = $dbh->prepare($sql);
              $query->bindParam(':eid', $eid, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);

              if($query->rowCount() > 0) {
                foreach($results as $row) {    
                  ?>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="text-center">
                        <?php 
                        if($row->userimage == "avatar15.jpg") { ?>
                          <img class="rounded-circle mb-3" src="staff_images/avatar15.jpg" width="150" height="150">
                        <?php 
                        } else { ?>
                          <img class="rounded-circle mb-3" src="staff_images/<?php echo htmlentities($row->userimage); ?>" width="150" height="150">
                        <?php 
                        } ?>
                        <h5 class="font-weight-bold"><?php echo htmlentities($row->name); ?> <?php echo htmlentities($row->lastname); ?></h5>
                        <p class="text-muted"><?php echo htmlentities($row->email); ?></p>
                        <a href="update_userimage.php?id=<?php echo htmlentities($eid); ?>" class="btn btn-primary">Edit Image</a>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="p-3">
                        <h6 class="text-primary mb-3">Edit Profile</h6>
                        <div class="form-group">
                          <label for="firstname">First Name</label>
                          <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo htmlentities($row->name); ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="lastname">Last Name</label>
                          <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo htmlentities($row->lastname); ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlentities($row->email); ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="mobile">Mobile</label>
                          <input type="text" class="form-control" id="mobile" name="mobile" value="0<?php echo htmlentities($row->mobile); ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlentities($row->username); ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="permission">Permission</label>
                          <input type="text" class="form-control" id="permission" name="permission" value="<?php echo htmlentities($row->permission); ?>" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Update Profile</button>
                      </div>
                    </div>
                  </div>
                  <?php 
                }
              } ?>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->

    <?php @include("includes/foot.php"); ?>
    <?php @include("includes/footer.php"); ?>
  </body>
</html>
<?php 
} 
?>
