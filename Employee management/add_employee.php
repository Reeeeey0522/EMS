<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];

    $query = "INSERT INTO employees (name, email, position) VALUES ('$name', '$email', '$position')";
    $conn->query($query);
    header("Location: employees.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <h2 class="head">Add Employee</h2>
            <form method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="position" placeholder="Position" required>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>

</body>

</html>