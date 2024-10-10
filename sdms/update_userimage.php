<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
  header('location:logout.php');
} else{
  if(isset($_POST['submit']))
  {
    $eid=$_SESSION['sid'];
    $userimage=$_FILES["userimage"]["name"];
    move_uploaded_file($_FILES["userimage"]["tmp_name"],"staff_images/".$_FILES["userimage"]["name"]);
    $sql="update tblusers set userimage=:userimage where id=:eid";
    $query=$dbh->prepare($sql);
    $query->bindParam(':userimage',$userimage,PDO::PARAM_STR);
    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();
    if ($query->execute()) {
      echo '<script>alert("Updated successfully")</script>';
      echo "<script>window.location.href ='update_userimage.php'</script>";
    }else{
      echo '<script>alert("Something went wrong, please try again later")</script>';
    }
  }
?>

<?php @include("includes/head.php"); ?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php @include("includes/header.php"); ?>
    <!-- /.navbar -->
    <!-- Sidebar and Menu -->
    <?php @include("includes/sidebar.php"); ?>
    <!-- /.sidebar and menu -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-header bg-primary text-white text-center py-3">
                <h6 class="m-0 font-weight-bold">Update User Image</h6>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <?php
                  $eid=$_SESSION['sid'];
                  $sql="SELECT * from tblusers where id=:eid";                                    
                  $query = $dbh -> prepare($sql);
                  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);

                  if($query->rowCount() > 0) {
                    foreach($results as $row) {    
                  ?>
                  <div class="form-group text-center">
                    <label class="font-weight-bold">Name</label>
                    <input type="text" class="form-control text-center" readonly value="<?php echo $row->name;?> <?php echo $row->lastname;?>">
                  </div>
                  <div class="form-group text-center">
                    <label class="font-weight-bold">Current Image</label>
                    <div class="d-flex justify-content-center mt-2">
                      <?php 
                      if($row->userimage=="avatar15.jpg") { ?>
                        <img class="rounded-circle" src="staff_images/avatar15.jpg" alt="" width="150" height="150">
                      <?php } else { ?>
                        <img class="rounded-circle" src="staff_images/<?php echo $row->userimage;?>" width="150" height="150"> 
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="font-weight-bold">Upload New Image</label>
                    <input type="file" name="userimage" id="userimage" class="form-control-file">
                  </div>
                  <?php } } ?>
                  <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4" name="submit">
                      <i class="fa fa-upload"></i> Update Image
                    </button>
                    <button type="button" class="btn btn-secondary px-4" onclick="prevStep()">Previous</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
    <?php @include("includes/foot.php"); ?>
    <?php @include("includes/footer.php"); ?>
    
    <script>
      let currentStep = 1;

      function showStep(step) {
        const steps = document.querySelectorAll('.step');
        steps.forEach((stepElement, index) => {
            stepElement.style.display = (index + 1 === step) ? 'block' : 'none';
        });
      }

      function nextStep() {
        if (currentStep < document.querySelectorAll('.step').length) {
            currentStep++;
            showStep(currentStep);
        }
      }

      function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        } else {
            window.location.href = 'profile.php';
        }
      }

      // Show the first step initially
      showStep(currentStep);
    </script>
</body>
</html>
<?php } ?>
