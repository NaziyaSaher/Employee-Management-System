<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

include 'C:\Users\91805\OneDrive\Desktop\Xampp\htdocs\employee_management\dp.php';

$id = $_GET['id'];
$sql = "DELETE FROM employees WHERE id = $id";
$conn->query($sql);

header("Location: index.php");
?>
