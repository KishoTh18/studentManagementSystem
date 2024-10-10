<?php  
session_start();
include('includes/dbconnection.php');

if (isset($_POST['edit_id'])) {
    $teacher_id = $_POST['edit_id'];

    // Fetch teacher details
    $query = mysqli_query($con, "SELECT * FROM teachers WHERE id='$teacher_id'");
    $row = mysqli_fetch_array($query);
    $photo = !empty($row['photo']) ? 'teachersImages/' . $row['photo'] : 'staticImages/default-teacher.jpg';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
            margin-top: 20px;
        }
        .card {
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }
        .photo-preview {
            text-align: center;
            margin-bottom: 20px;
        }
        .photo-preview img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px; /* Rectangular view */
            border: 2px solid #007bff; /* Blue border for the profile picture */
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            width: 100%;
            border-radius: 4px; /* Rounded corners for inputs */
        }
        .btn-success {
            width: 100%; /* Full width for the button */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <h5 class="text-center mb-4">Edit Teacher Details</h5>
            <div class="photo-preview">
                <img src="<?php echo $photo; ?>" alt="Teacher Image" class="img-thumbnail">
            </div>
            <form method="POST" id="update_teacher_form">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="form-group mb-3">
                    <label for="full_name">Teacher Name</label>
                    <input type="text" name="full_name" class="form-control" value="<?php echo $row['full_name']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control" value="<?php echo $row['subject']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="main_class_teacher">Main Class Teacher</label>
                    <input type="text" name="main_class_teacher" class="form-control" value="<?php echo $row['main_class_teacher']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="contact_no">Contact No.</label>
                    <input type="text" name="contact_no" class="form-control" value="<?php echo $row['contact_no']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Teacher</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
} elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $subject = $_POST['subject'];
    $main_class_teacher = $_POST['main_class_teacher'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];

    // Update query
    $update_query = "UPDATE teachers SET full_name='$full_name', subject='$subject', main_class_teacher='$main_class_teacher', contact_no='$contact_no', email='$email' WHERE id='$id'";
    mysqli_query($con, $update_query);
    
    echo '<script>alert("Teacher details updated successfully!"); window.location="manage_teachers.php";</script>';
}
?>
