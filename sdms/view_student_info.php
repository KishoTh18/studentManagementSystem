<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$eid2 = $_POST['edit_id2'];

// Fetch student details
$ret2 = mysqli_query($con, "SELECT * FROM students WHERE id='$eid2'");
$student = mysqli_fetch_array($ret2);

// Fetch teacher details for the student's class
$teacherQuery = mysqli_query($con, "
    SELECT * FROM teachers 
    WHERE main_class_teacher = '" . mysqli_real_escape_string($con, $student['class']) . "'");
$teacher = mysqli_fetch_array($teacherQuery);
?>

<div class="card p-3">
    <div class="row">
        <!-- Student Image -->
        <div class="col-md-4 text-center">
            <img src="studentimages/<?php echo htmlentities($student['studentImage']);?>" width="100" height="100" class="img-thumbnail">
        </div>
        
        <!-- Student Details -->
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <th>Student Number:</th>
                    <td><?php echo htmlentities($student['studentno']); ?></td>
                </tr>
                <tr>
                    <th>Names:</th>
                    <td><?php echo htmlentities($student['studentName']); ?></td>
                </tr>
                <tr>
                    <th>Class:</th>
                    <td><?php echo htmlentities($student['class']); ?></td>
                </tr>
                <tr>
                    <th>Contact No.:</th>
                    <td>0<?php echo htmlentities($student['contactno']); ?></td>
                </tr>
                <tr>
                    <th>Parent Name:</th>
                    <td><?php echo htmlentities($student['parentName']); ?></td>
                </tr>
                <tr>
                    <th>Parent Relation:</th>
                    <td><?php echo htmlentities($student['relation']); ?></td>
                </tr>
                <?php if ($teacher): ?>
                <tr>
                    <th>Class Teacher:</th>
                    <td><?php echo htmlentities($teacher['full_name']); ?></td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <div class="text-center mt-3">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
