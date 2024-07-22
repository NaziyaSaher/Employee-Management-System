<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

include 'C:\Users\91805\OneDrive\Desktop\Xampp\htdocs\employee_management\dp.php'; // Ensure db.php is in the same directory as index.php

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = $conn->query("SELECT * FROM employees");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Management</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .profile-img {
            width: 50px;
            height: auto;
            border-radius: 50%;
        }
        @media (max-width: 768px) {
            .profile-img {
                width: 30px;
            }
        }
    </style>
</head>
<body><br>
    <div class="container-fluid">
        <h2 class="text-center">Employee Management</h2><br>
        <a href="add_employee.php" class="btn btn-primary">Add Employee</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Profile Picture</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['firstname'] ?></td>
                            <td><?= $row['lastname'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['position'] ?></td>
                            <td>
                                <?php if ($row['profile_picture']): ?>
                                    <img src="uploads/<?= $row['profile_picture'] ?>" alt="Profile Picture" class="profile-img">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="edit_employee.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_employee.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
