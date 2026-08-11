<?php

$conn = new mysqli("localhost", "root", "", "student_management_system");

// Check database connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
// Search value
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
// Search query
$sql = "SELECT * FROM students
        WHERE first_name LIKE '%$search%'
        OR last_name LIKE '%$search%'
        OR course LIKE '%$search%'
        ORDER BY student_id DESC";

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

    <!-- Search Form -->

    <form method="GET" style="margin-bottom: 20px;">

        <input
            type="text"
            name="search"
            placeholder="Search by name or course"
            value="<?php echo htmlspecialchars($search); ?>"
        >

        <button type="submit">Search</button>

        <a class="button" href="view_students.php">
            Reset
        </a>

    </form>


    <!-- Students Table -->

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

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

        ?>

        <tr>

            <td>
                <?php echo $row['student_id']; ?>
            </td>

            <td>
                <?php echo $row['first_name'] . " " . $row['last_name']; ?>
            </td>

            <td>
                <?php echo $row['gender']; ?>
            </td>

            <td>
                <?php echo $row['course']; ?>
            </td>

            <td>
                <?php echo $row['email']; ?>
            </td>

            <td>
                <?php echo $row['phone']; ?>
            </td>

            <td>
                <?php echo $row['admission_date']; ?>
            </td>

            <td>
                <a
                class="button"
                 href="edit_student.php?id=<?php echo $row['student_id']; ?>"
>
                    Edit
                </a>
                <br><br>
                <a
                    class="button"
                    href="delete_student.php?id=<?php echo $row['student_id']; ?>"
                    onclick="return confirm('Are you sure you want to delete this student?');"
                >
                
                    Delete
                </a>

            </td>
        </tr>
        <?php
            }
        } else {
        ?>
        <tr>
            <td colspan="8">
                No students found.
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <a class="button" href="index.php">
        ⬅ Back to Home
    </a>
</div>
</body>
</html>