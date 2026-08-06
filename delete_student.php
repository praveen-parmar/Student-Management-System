<?php
$conn = new mysqli("localhost", "root", "", "student_management_system");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE student_id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_students.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}