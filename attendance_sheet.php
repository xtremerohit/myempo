<?php
require 'db.php';

if (!isset($_GET['employee_id'])) {
    header('Location: admin_dashboard.php');
    exit();
}

$employeeId = $_GET['employee_id'];

// Fetch employee details
$stmtEmployee = $conn->prepare("SELECT username, date_of_join FROM employees WHERE id = ?");
$stmtEmployee->bind_param("i", $employeeId);
$stmtEmployee->execute();
$resultEmployee = $stmtEmployee->get_result();
$employee = $resultEmployee->fetch_assoc();
$stmtEmployee->close();

// Fetch attendance records
$stmtAttendance = $conn->prepare("SELECT date, time, location FROM attendance WHERE employee_id = ?");
$stmtAttendance->bind_param("i", $employeeId);
$stmtAttendance->execute();
$resultAttendance = $stmtAttendance->get_result();
$stmtAttendance->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Attendance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Employee Attendance</h2>
        <h3><?php echo $employee['username']; ?></h3>
        <p><strong>Date of Join:</strong> <?php echo $employee['date_of_join']; ?></p>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultAttendance->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
