<?php
session_start();
include('includes/dbconnection.php');

// Check if teacher ID is provided
if (isset($_GET['id'])) {
    $teacher_id = $_GET['id'];

    // Fetch teacher details
    $query = mysqli_query($con, "SELECT * FROM teachers WHERE id='$teacher_id'");
    $teacher = mysqli_fetch_array($query);
} else {
    // Redirect if no ID is provided
    header('Location: teachers_viewlist.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Teacher Details</title>
    <link rel="stylesheet" href="includes/style.css"> <!-- Your main CSS file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Teacher Details</h1>
    <table class="table table-bordered">
        <tr>
            <th>Full Name:</th>
            <td><?php echo htmlentities($teacher['full_name']); ?></td>
        </tr>
        <tr>
            <th>Name with Initials:</th>
            <td><?php echo htmlentities($teacher['name_with_initials']); ?></td>
        </tr>
        <tr>
            <th>Subject:</th>
            <td><?php echo htmlentities($teacher['subject']); ?></td>
        </tr>
        <tr>
            <th>Main Class Teacher:</th>
            <td><?php echo htmlentities($teacher['main_class_teacher']); ?></td>
        </tr>
        <tr>
            <th>Contact No.:</th>
            <td><?php echo htmlentities($teacher['contact_no']); ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo htmlentities($teacher['email']); ?></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><?php echo htmlentities($teacher['address']); ?></td>
        </tr>
    </table>
    <button class="btn btn-primary" onclick="window.print();">Print</button>
    <a href="teacher_list.php" class="btn btn-secondary">Back to Teacher List</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
