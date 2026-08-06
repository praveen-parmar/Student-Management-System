<?php
$conn = new mysqli("localhost", "root", "", "student_management_system");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first = $_POST["first_name"];
    $last = $_POST["last_name"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO students(first_name,last_name,gender,course,email,phone,admission_date)
            VALUES('$first','$last','$gender','$course','$email','$phone',CURDATE())";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student Added Successfully');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Add Student</h1>

    <form method="POST">

        <input type="text" name="first_name" placeholder="First Name" required>

        <input type="text" name="last_name" placeholder="Last Name" required>

        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <input type="text" name="course" placeholder="Course" required>

        <input type="email" name="email" placeholder="Email">

        <input type="text" name="phone" placeholder="Phone Number">

        <button type="submit">Save Student</button>

    </form>

    <br>

    <a class="button" href="index.php">⬅ Back</a>
</div>

</body>
</html>