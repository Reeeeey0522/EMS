<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$query = "SELECT * FROM employees";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif; /* Set a default font */
        }

        .header {
            display: flex; /* Use Flexbox for layout */
            justify-content: space-between; /* Space between elements */
            align-items: center; /* Center items vertically */
            padding: 10px; /* Padding around the header */
            background-color: #f0f0f0; /* Optional background color */
        }

        .header h2 {
            margin: 0; /* Remove default margin */
        }

        .header a {
            text-decoration: none; /* Remove underline */
            color: #0e4296; /* Change link color */
            padding: 8px 16px; /* Add padding around the link */
            border-radius: 4px; /* Rounded corners */
        }

        .header a:hover {
            background-color: #8ba4cc; /* Change background on hover */
            color: white; /* Change text color on hover */
        }

        table {
            width: 100%; /* Full width */
            border-collapse: collapse; /* Collapse table borders */
            margin-top: 20px; /* Space above table */
        }

        th, td {
            border: 1px solid #dddddd; /* Border for table cells */
            text-align: left; /* Align text to the left */
            padding: 8px; /* Padding inside cells */
        }

        th {
            background-color: #f2f2f2; /* Background color for header row */
        }

        .btn{
            border: 1px solid black;
            border-radius: 3px;
            padding: 5px;
            text-decoration: none;
            color: #0e4296;
            background-color: #f0f0f0;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Employee Records</h2>
        <a href="logout.php">Logout</a> <!-- Logout link placed on the right -->
    </div>
    <a class="btn" href="add_employee.php">Add Employee</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
        <?php while ($employee = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $employee['id']; ?></td>
            <td><?php echo $employee['name']; ?></td>
            <td><?php echo $employee['email']; ?></td>
            <td><?php echo $employee['position']; ?></td>
            <td>
                <a class="btn" href="edit_employee.php?id=<?php echo $employee['id']; ?>">Edit</a>
                <a class="btn" href="delete_employee.php?id=<?php echo $employee['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
