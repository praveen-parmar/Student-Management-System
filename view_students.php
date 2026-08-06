<?php
$conn = new mysqli("localhost", "root", "", "student_management_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students ORDER BY student_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>All Students</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Course</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>

        <tr>
            <td><?php echo $row['student_id']; ?></td>
            <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['admission_date']; ?></td>
            <td> <a class="button" href="delete_student.php?id=<?php echo $row['student_id']; ?>" onclick="return confirm('Are you sure?')"> Delete </a> </td>
        </tr>

        <?php
            }
        } else {
        ?>
        <tr>
            <td colspan="7">No students found</td>
        </tr>
        <?php } ?>

    </table>

    <br>
    <a class="button" href="index.php">⬅ Back</a>
</div>

</body>
</html>