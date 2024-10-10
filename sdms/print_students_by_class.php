<?php
session_start();
include('includes/dbconnection.php');

// Check if class is provided
$students = [];
$class_teacher = '';
if (isset($_GET['class'])) {
    $class = $_GET['class'];

    // Fetch student details by class
    $query = mysqli_query($con, "SELECT * FROM students WHERE class='$class'");
    while ($row = mysqli_fetch_array($query)) {
        $students[] = $row;
    }

    // Fetch class teacher details
    $teacher_query = mysqli_query($con, "SELECT full_name FROM teachers WHERE main_class_teacher='$class'");
    $teacher = mysqli_fetch_array($teacher_query);
    $class_teacher = $teacher['full_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Students by Class</title>
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
    <h1 class="text-center">Students in <?php echo htmlentities($class); ?></h1>
    <form method="GET" action="print_students_by_class.php" class="mb-4">
        <div class="form-group">
            <label for="class">Select Class:</label>
            <select class="form-control" id="class" name="class" required>
                <option value="">Select Class</option>
                <?php for ($i = 1; $i <= 13; $i++) { ?>
                <option value="G<?php echo $i; ?>">G<?php echo $i; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php if (!empty($students)) { ?>
    <h3>Class Teacher: <?php echo htmlentities($class_teacher); ?></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Student Number</th>
                <th>Contact No.</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student) { ?>
            <tr>
                <td><?php echo htmlentities($student['studentName']); ?></td>
                <td><?php echo htmlentities($student['studentno']); ?></td>
                <td><?php echo htmlentities($student['contact_no']); ?></td>
                <td><?php echo htmlentities($student['email']); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <button class="btn btn-primary print-btn" onclick="window.print();">Print</button>
    <?php } ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
