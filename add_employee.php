<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

include 'C:\Users\91805\OneDrive\Desktop\Xampp\htdocs\employee_management\dp.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $profile_picture = $_FILES['profile_picture']['name'];

    // Ensure the uploads directory exists
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    // Generate a unique file name to avoid overwriting
    $target_file = $target_dir . uniqid() . "_" . basename($profile_picture);
    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);

    // Save the file path in the database
    $sql = "INSERT INTO employees (firstname, lastname, email, phone, position, profile_picture) VALUES ('$firstname', '$lastname', '$email', '$phone', '$position', '$target_file')";
    $conn->query($sql);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4 text-center">Add Employee</h2>
        <form action="add_employee.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="position" name="position" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Employee</button>
        </form>
    </div>
</body>
</html>
