<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
    header('location:logout.php');
}

if(isset($_GET['del'])) {
    mysqli_query($con,"DELETE FROM teachers WHERE id = '".$_GET['id']."'");
    $_SESSION['delmsg'] = "Teacher deleted !!";
}
?>
<!DOCTYPE html>
<html>
<?php @include("includes/head.php"); ?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php @include("includes/header.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php @include("includes/sidebar.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Manage Teachers</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Manage Teachers</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card shadow-sm">
                <div class="card-header">
                  <h3 class="card-title">Teacher Details</h3>
                  <div class="card-tools">
                    <a href="add_teacher.php"><button type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Teacher</button></a>                  
                  </div>
                </div>
                <!-- /.card-header -->
                 <!-- Modal for Edit Teacher -->
                <div id="editData" class="modal fade">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-body" id="info_update">
                        <!-- Content from edit_teacher.php will be loaded here dynamically -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Edit Teacher Modal -->

                <!-- Modal for View Teacher Details -->
<div id="editData2" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Teacher Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="info_update2">
                <!-- Content from view_teacher_info.php will be loaded here dynamically -->
                <?php
                session_start();
                error_reporting(0);
                include('includes/dbconnection.php');

                $eid2 = $_POST['edit_id2'];
                $ret2 = mysqli_query($con, "SELECT * FROM teachers WHERE id='$eid2'");
                $teacher = mysqli_fetch_array($ret2);
                ?>

                <div class="card p-3 shadow-lg">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="border rounded-circle p-2" style="width: 160px; height: 160px;">
                                <img src="teachersImages/<?php echo htmlentities($teacher['photo']); ?>" alt="Teacher Image" class="img-fluid rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="text-primary">Teacher Details</h4>
                            <table class="table table-borderless">
                                <tr>
                                    <th class="text-right" style="width: 40%;">Full Name:</th>
                                    <td><?php echo htmlentities($teacher['full_name']); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right">Name with Initials:</th>
                                    <td><?php echo htmlentities($teacher['name_with_initials']); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right">Subject:</th>
                                    <td><?php echo htmlentities($teacher['subject']); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right">Main Class Teacher:</th>
                                    <td><?php echo htmlentities($teacher['main_class_teacher']); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right">Contact Number:</th>
                                    <td><?php echo htmlentities($teacher['contact_no']); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right">Email:</th>
                                    <td><?php echo htmlentities($teacher['email']); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right">Address:</th>
                                    <td><?php echo htmlentities($teacher['address']); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End View Teacher Modal -->


                
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-primary text-white">
                      <tr> 
                        <th>#</th>
                        <th>Teacher Image</th>
                        <th>Teacher Name</th>
                        <th>Subject</th>
                        <th>Main Class Teacher</th>
                        <th>Contact No.</th>
                        <th>Email</th>
                        <th>Actions</th>
                      </tr> 
                    </thead> 
                    <tbody>
                      <?php
                      $query = mysqli_query($con, "SELECT * FROM teachers");
                      $cnt = 1;
                      while($row = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo htmlentities($cnt); ?></td>
                          <td><img src="teachersImages/<?php echo htmlentities($row['photo']); ?>" width="50" height="50" class="img-thumbnail"></td>
                          <td><?php echo htmlentities($row['full_name']); ?></td>
                          <td><?php echo htmlentities($row['subject']); ?></td>
                          <td><?php echo htmlentities($row['main_class_teacher']); ?></td>
                          <td><?php echo htmlentities($row['contact_no']); ?></td>
                          <td><?php echo htmlentities($row['email']); ?></td>
                          <td>
                            <button class="btn btn-info btn-sm edit_data" id="<?php echo $row['id']; ?>" title="Edit Teacher">Edit</button>
                            <button class="btn btn-warning btn-sm edit_data2" id="<?php echo $row['id']; ?>" title="View Teacher">View</button>
                            <a href="manage_teachers.php?id=<?php echo $row['id']; ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</a>
                          </td>
                        </tr>
                      <?php $cnt = $cnt + 1; } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php @include("includes/footer.php"); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <?php @include("includes/foot.php"); ?>

  <!-- Existing HTML content -->

<!-- AJAX for dynamic modal content -->
<script type="text/javascript">
  $(document).ready(function() {
    // Load edit_teacher.php content into the modal
    $(document).on('click', '.edit_data', function() {
      var edit_id = $(this).attr('id');
      $.ajax({
        url: "edit_teacher.php",
        type: "post",
        data: {edit_id: edit_id},
        success: function(data) {
          $("#info_update").html(data);
          $("#editData").modal('show');
        }
      });
    });

    // Load view_teacher_info.php content into the modal
    $(document).on('click', '.edit_data2', function() {
      var edit_id2 = $(this).attr('id');
      $.ajax({
        url: "teachers_viewlist.php", // Make sure this path is correct
        type: "post",
        data: {edit_id2: edit_id2},
        success: function(data) {
          $("#info_update2").html(data);
          $("#editData2").modal('show');
        }
      });
    });

    // Submit the update form via AJAX
    $(document).on('submit', '#update_teacher_form', function(e) {
      e.preventDefault();
      $.ajax({
        url: "edit_teacher.php",
        type: "post",
        data: $(this).serialize(),
        success: function(response) {
          alert('Teacher details updated successfully');
          $('#editData').modal('hide');
          location.reload(); // Reload the page to see the updated details
        },
        error: function() {
          alert('Failed to update teacher details');
        }
      });
    });
  });
</script>

<!-- Existing HTML content -->
</body>
</html>
