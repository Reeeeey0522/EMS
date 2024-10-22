<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$id = $_GET['id'];
$query = "DELETE FROM employees WHERE id=$id";
$conn->query($query);
header("Location: employees.php");
?>
