<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $fullName = $_POST['fullName'];
    $employeeID = $_POST['employeeID'];
    $dateOfJoin = $_POST['dateOfJoin'];
    $employerCode = $_POST['employerCode'];

    $stmt = $conn->prepare("INSERT INTO employees (username, password, full_name, employee_id, date_of_join, employer_code) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $username, $password, $fullName, $employeeID, $dateOfJoin, $employerCode);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Employee account created successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Signup</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Employee Signup</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="employeeID">Employee ID:</label>
                <input type="text" class="form-control" id="employeeID" name="employeeID" required>
            </div>
            <div class="form-group">
                <label for="dateOfJoin">Date of Join:</label>
                <input type="date" class="form-control" id="dateOfJoin" name="dateOfJoin" required>
            </div>
            <div class="form-group">
                <label for="employerCode">Your Employer Code:</label>
                <input type="text" class="form-control" id="employerCode" name="employerCode" required>
            </div>
            <button type="submit" class="btn btn-success">Sign Up</button>
        </form>
    </div>
</body>
</html>
