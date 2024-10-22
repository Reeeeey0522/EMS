<?php
$host = 'localhost';
$db = 'management';
$user = 'root'; // or your db username
$pass = ''; // or your db password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
