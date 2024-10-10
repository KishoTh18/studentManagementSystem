<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $names = $_POST['names'];
        $age = $_POST['age'];
        $studentno = $_POST['studentno'];
        $sex = $_POST['sex'];
        $class = $_POST['class'];
        $stream = $_POST['stream'];
        $parentname = $_POST['parentname'];
        $relation = $_POST['relation'];
        $ocupation = $_POST['ocupation'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $nextphone = $_POST['nextphone'];
        $country = $_POST['country'];
        $district = $_POST['district'];
        $state = $_POST['state'];
        $village = $_POST['village'];
        $photo = $_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"], "studentimages/" . $_FILES["photo"]["name"]);
        $query = mysqli_query($con, "INSERT INTO students(studentno, StudentName, class, stream, age, gender, email, parentName, relation, occupation, country, district, state, village, contactno, nextphone, studentImage) 
        VALUES ('$studentno', '$names', '$class', '$stream', '$age', '$sex', '$email', '$parentname', '$relation', '$ocupation', '$country', '$district', '$state', '$village', '$phone', '$nextphone', '$photo')");
        
        if ($query) {
            echo "<script>alert('Student has been registered.');</script>";
            echo "<script>window.location.href = 'add_student.php'</script>";
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
                            <h1>Add Student</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Student</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Student</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Multi-step Form -->
                                        <div id="student-form">
                                            <!-- 1. Student Details Section -->
                                            <div class="form-step" id="step-1">
                                                <h5 class="text-primary font-weight-bold">1. Student Details</h5>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="studentno">1. Student No.</label>
                                                    <input type="text" class="form-control" id="studentno" name="studentno" placeholder="Enter student No" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="names">2. Full Name</label>
                                                    <input type="text" class="form-control" id="names" name="names" placeholder="Names" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="age">3. Age</label>
                                                    <input type="number" class="form-control" id="age" name="age" placeholder="Age" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sex">4. Gender</label>
                                                    <select class="form-control" id="sex" name="sex" required>
                                                        <option>Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="class">5. Class</label>
                                                    <select class="form-control" id="class" name="class" required>
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
                                                    <label for="stream">6. Stream <span class="text-muted">(optional)</span></label>
                                                    <select class="form-control" id="stream" name="stream">
                                                        <option>Select Stream</option>
                                                        <option value="West">Arts</option>
                                                        <option value="East">Commerce</option>
                                                        <option value="B-Tech">B-Tech</option>
                                                        <option value="Maths">Maths</option>
                                                        <option value="Bio">Bio</option>
                                                        <option value="E-Tech">E-Tech</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="photo">7. Student Photo</label>
                                                    <input type="file" class="form-control-file" id="photo" name="photo" required>
                                                </div>
                                                <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                                            </div>

                                            <!-- 2. Parent Details Section -->
                                            <div class="form-step" id="step-2" style="display:none;">
                                                <h5 class="text-primary font-weight-bold">2. Parent Details</h5>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="parentname">1. Parent Name</label>
                                                    <input type="text" class="form-control" id="parentname" name="parentname" placeholder="Enter Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="relation">2. Relationship</label>
                                                    <select class="form-control" id="relation" name="relation" required>
                                                        <option>Select Relationship</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Uncle">Uncle</option>
                                                        <option value="Aunt">Aunt</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ocupation">3. Occupation</label>
                                                    <select class="form-control" id="ocupation" name="ocupation" required>
                                                        <option>Occupation</option>
                                                        <option value="Doctor">Doctor</option>
                                                        <option value="Engineer">Engineer</option>
                                                        <option value="Businessman">Businessman</option>
                                                        <option value="Teacher">Teacher</option>
                                                        <option value="Driver">Driver</option>
                                                        <option value="Software Developer">Software Developer</option>
                                                        <option value="Farmer">Farmer</option>
                                                        <option value="Pilot">others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">4. Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">5. Phone No-1: </label>
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone 1" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nextphone">6. Phone No-2: </label>
                                                    <input type="text" class="form-control" id="nextphone" name="nextphone" placeholder="Phone 2" required>
                                                </div>
                                                <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                                                <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                                            </div>

                                            <!-- 3. Address Section -->
                                            <div class="form-step" id="step-3" style="display:none;">
                                                <h5 class="text-primary font-weight-bold">3. Address</h5>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="country">1. Country</label>
                                                    <select class="form-control" id="country" name="country" required>
                                                        <option>Select Country</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="district">2. Province </label>
                                                    <input type="text" class="form-control" id="district" name="district" placeholder="Province" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="state">3. District</label>
                                                    <input type="text" class="form-control" id="state" name="state" placeholder="District" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="village">4. Home Address</label>
                                                    <input type="text" class="form-control" id="village" name="village" placeholder="Village" required>
                                                    <br><br>
                                                </div>
                                                <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                                                <br>
                                                <br>
                                                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php @include("includes/footer.php"); ?>
    </div>
    <!-- ./wrapper -->

    <script>
        let currentStep = 1;

        function showStep(step) {
            document.querySelectorAll('.form-step').forEach((element) => {
                element.style.display = 'none';
            });
            document.getElementById('step-' + step).style.display = 'block';
        }

        function nextStep() {
            if (currentStep < 3) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }

        // Show the first step initially
        showStep(currentStep);
    </script>
</body>
</html>
<?php } ?>
