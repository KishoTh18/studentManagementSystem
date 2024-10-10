<?php
session_start();
include('includes/dbconnection.php');

// Check if student ID is provided
$student = null;
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Fetch student details
    $query = mysqli_query($con, "SELECT * FROM students WHERE studentno='$student_id'");
    $student = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Student Details</title>
    <link rel="stylesheet" href="includes/style.css"> <!-- Your main CSS file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin: 20px;
        }
        .print-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Student Details</h1>
    <form method="GET" action="student_print.php" class="mb-4">
        <div class="form-group">
            <label for="student_id">Enter Student ID:</label>
            <input type="text" class="form-control" id="student_id" name="student_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php if ($student) { ?>
    <table class="table table-bordered">
        <tr>
            <th>Full Name:</th>
            <td><?php echo htmlentities($student['studentName']); ?></td>
        </tr>
        <tr>
            <th>Student Number:</th>
            <td><?php echo htmlentities($student['studentno']); ?></td>
        </tr>
        <tr>
            <th>Class:</th>
            <td><?php echo htmlentities($student['class']); ?></td>
        </tr>
        <tr>
            <th>Contact No.:</th>
            <td><?php echo htmlentities($student['contact_no']); ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo htmlentities($student['email']); ?></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><?php echo htmlentities($student['address']); ?></td>
        </tr>
    </table>
    <button class="btn btn-primary print-btn" onclick="window.print();">Print</button>
    <?php } ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
