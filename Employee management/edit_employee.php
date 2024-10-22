<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$id = $_GET['id'];
$query = "SELECT * FROM employees WHERE id=$id";
$result = $conn->query($query);
$employee = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];

    $query = "UPDATE employees SET name='$name', email='$email', position='$position' WHERE id=$id";
    $conn->query($query);
    header("Location: employees.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <h2 class="head">Edit Employee</h2>
            <form method="POST">
                <input type="text" name="name" value="<?php echo $employee['name']; ?>" required>
                <input type="email" name="email" value="<?php echo $employee['email']; ?>" required>
                <input type="text" name="position" value="<?php echo $employee['position']; ?>" required>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>

</body>

</html>