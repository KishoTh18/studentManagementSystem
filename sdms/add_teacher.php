<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $full_name = $_POST['full_name'];
        $name_with_initials = $_POST['name_with_initials'];
        $subject = $_POST['subject'];
        $main_class_teacher = $_POST['main_class_teacher'];
        $contact_no = $_POST['contact_no'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $photo = $_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"], "teachersImages/" . $_FILES["photo"]["name"]);
        $query = mysqli_query($con, "INSERT INTO teachers (full_name, name_with_initials, subject, main_class_teacher, photo, contact_no, email, address) VALUES ('$full_name', '$name_with_initials', '$subject', '$main_class_teacher', '$photo', '$contact_no', '$email', '$address')");
        if ($query) {
            echo "<script>alert('Teacher has been added.');</script>";
            echo "<script>window.location.href = 'add_teacher.php'</script>";
            $msg = "";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<?php @include("includes/head.php"); ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php @include("includes/header.php"); ?>
        <!-- Main Sidebar Container -->
        <?php @include("includes/sidebar.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 style="color: black;">Add Teacher</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Teacher</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="card" style="border: none;">
                                <div class="card-header" style="background-color: #007bff; color: white;">
                                    <h3 class="card-title">Add Teacher</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="card-body" style="padding: 1.5rem;">
                                        <!-- Teacher Details Section -->
                                        <div class="mb-4" style="background-color: #fff; padding: 1.5rem; border-radius: 0.25rem;">
                                            <h5 class="text-primary font-weight-bold">Teacher Details</h5>
                                            <hr>
                                            <div class="form-group">
                                                <label for="full_name">1. Full Name</label>
                                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter full name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="name_with_initials">2. Name with Initials</label>
                                                <input type="text" class="form-control" id="name_with_initials" name="name_with_initials" placeholder="Enter name with initials" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">3. Subject</label>
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="main_class_teacher">4. Main Class Teacher</label>
                                                <!-- <input type="text" class="form-control" id="main_class_teacher" name="main_class_teacher" placeholder="Enter main class teacher"> -->
                                                <select class="form-control" id="main_class_teacher" name="main_class_teacher" placeholder="Select main class teacher">
                                                        <option>Select Class</option>
                                                        <option value="G-1">G-1</option>
                                                        <option value="G-2">G-2</option>
                                                        <option value="G-3">G-3</option>
                                                        <option value="G-4">G-4</option>
                                                        <option value="G-5">G-5</option>
                                                        <option value="G-6">G-6</option>
                                                        <option value="G-7">G-7</option>
                                                        <option value="G-8">G-8</option>
                                                        <option value="G-9">G-9</option>
                                                        <option value="G-10">G-10</option>
                                                        <option value="G-11">G-11</option>
                                                        <option value="G-12">G-12</option>
                                                        <option value="G-13">G-13</option>
                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="photo">5. Teacher Photo</label>
                                                <input type="file" class="form-control-file" id="photo" name="photo" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="contact_no">6. Contact No.</label>
                                                <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter contact number">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">7. Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">8. Address</label>
                                                <textarea class="form-control" id="address" name="address" placeholder="Enter address" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer" style="padding: 1rem;">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php @include("includes/footer.php"); ?>
    </div>
    <!-- ./wrapper -->
    <?php @include("includes/foot.php"); ?>
</body>
</html>
<?php } ?>
