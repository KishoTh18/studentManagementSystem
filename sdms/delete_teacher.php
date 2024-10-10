<?php
session_start();
include('includes/dbconnection.php');

// Get the teacher ID from the URL
$teacher_id = intval($_GET['id']);

// Delete teacher data
$sql = "DELETE FROM teachers WHERE id = :id";
$query = $dbh->prepare($sql);
$query->bindParam(':id', $teacher_id, PDO::PARAM_INT);

if($query->execute()) {
    echo "<script>alert('Teacher deleted successfully.');</script>";
    echo "<script>window.location.href ='manage_teachers.php'</script>";
} else {
    echo "<script>alert('Something went wrong, please try again later.');</script>";
    echo "<script>window.location.href ='manage_teachers.php'</script>";
}
?>
