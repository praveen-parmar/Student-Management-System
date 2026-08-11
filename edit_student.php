<?php

$conn = new mysqli("localhost", "root", "", "student_management_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get student ID
$id = $_GET['id'];

// Fetch student data
$result = $conn->query("SELECT * FROM students WHERE student_id = $id");
$student = $result->fetch_assoc();

// Update student
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE students SET
            first_name='$first',
            last_name='$last',
            gender='$gender',
            course='$course',
            email='$email',
            phone='$phone'
            WHERE student_id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_students.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Edit Student</h1>

    <form method="POST">

        <input type="text" name="first_name"
               value="<?php echo $student['first_name']; ?>" required>

        <input type="text" name="last_name"
               value="<?php echo $student['last_name']; ?>" required>

        <select name="gender" required>
            <option value="Male" <?php if($student['gender']=='Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if($student['gender']=='Female') echo 'selected'; ?>>Female</option>
        </select>

        <input type="text" name="course"
               value="<?php echo $student['course']; ?>" required>

        <input type="email" name="email"
               value="<?php echo $student['email']; ?>">

        <input type="text" name="phone"
               value="<?php echo $student['phone']; ?>">

        <button type="submit">Update Student</button>

    </form>

    <br>

    <a class="button" href="view_students.php">⬅ Back</a>

</div>

</body>
</html>