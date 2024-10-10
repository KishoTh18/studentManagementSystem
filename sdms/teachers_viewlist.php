<?php
session_start();
include('includes/dbconnection.php');

// Check if teacher name is provided
$teacher = null;
if (isset($_GET['teacher_name'])) {
    $teacher_name = $_GET['teacher_name'];

    // Fetch teacher details
    $query = mysqli_query($con, "SELECT * FROM teachers WHERE full_name LIKE '%$teacher_name%'");
    $teacher = mysqli_fetch_array($query);
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
    <h1 class="text-center">Teacher Details</h1>
    <form method="GET" action="print_teacher.php" class="mb-4">
        <div class="form-group">
            <label for="teacher_name">Enter Teacher Name:</label>
            <input type="text" class="form-control" id="teacher_name" name="teacher_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php if ($teacher) { ?>
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
    </table>
    <button class="btn btn-primary print-btn" onclick="window.print();">Print</button>
    <?php } ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
