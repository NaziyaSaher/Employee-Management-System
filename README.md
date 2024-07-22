# Employee-Management-System

## Overview
The Employee Management Web Application is a simple yet functional system designed to manage employee data within an organization. The application provides a user-friendly interface for performing CRUD (Create, Read, Update, Delete) operations on employee records, along with user session management and file uploading capabilities.

## Features

### User Authentication:

A login page to authenticate users before they can access the employee management functionalities.
Session management to maintain the user's logged-in state.

### Employee Management:

Create: A form to add new employees, including fields for first name, last name, email, phone, position, and profile picture.
Read: A page that displays a list of all employees with their details and profile pictures.
Update: Option to edit an employee's details.
Delete: Option to delete an employee.
File Upload: Capability to upload profile pictures for employees. Uploaded pictures are stored in a directory on the server, and the file path is saved in the database.
Responsive Design: The application uses Bootstrap to ensure responsiveness, making it usable on various devices such as desktops, laptops, tablets, and smartphones.

## Technical Stack

### Frontend:
HTML, CSS, JavaScript
Bootstrap for responsive design
### Backend:
PHP for server-side scripting
MySQL for the database

## Project Structure
index.php: The main page that lists all employees and provides options to add, edit, and delete employees.
login.php: The login page where users can authenticate themselves.
add_employee.php: The page with a form to add a new employee.
edit_employee.php: The page to edit an existing employee's details.
delete_employee.php: The script to delete an employee.
db.php: The script to connect to the MySQL database.
uploads/: Directory where uploaded profile pictures are stored.
styles.css: Custom CSS file for additional styling.

## Database Schema
Database Name: employee_management
Table Name: employees


CREATE DATABASE employee_management;
USE employee_management;
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    email VARCHAR(100),
    phone VARCHAR(15),
    position VARCHAR(50),
    profile_picture VARCHAR(100)
);


## Setup and Execution

### Install XAMPP:
Download and install XAMPP from the official website.
Start Apache and MySQL from the XAMPP Control Panel.

### Set Up Project Directory:
Create a directory named employee_management in the htdocs directory of your XAMPP installation.
Place all project files (index.php, login.php, add_employee.php, edit_employee.php, delete_employee.php, db.php, styles.css, etc.) in the employee_management directory.

### Create Database and Table:
Open your web browser and navigate to http://localhost/phpmyadmin/.
Create a database named employee_management.
Create the employees table using the provided schema.

### Configure Database Connection:
Ensure db.php contains the correct database connection details.

### Run the Application:
Navigate to http://localhost/employee_management/ in your web browser.
Login using the credentials set up or insert a user directly into the database for the first login.
Use the application to manage employee records.

This Employee Management Web Application provides a solid foundation for managing employee data and can be further enhanced with additional features as needed.
