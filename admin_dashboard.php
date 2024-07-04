<?php
session_start();
require 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

$admin_id = $_SESSION['admin_id'];

// Fetch details of employees using the admin's employer code
$stmtEmployees = $conn->prepare("SELECT id, username, date_of_join FROM employees WHERE employer_code = ?");
$stmtEmployees->bind_param("s", $_SESSION['unique_code']);
$stmtEmployees->execute();
$resultEmployees = $stmtEmployees->get_result();
$stmtEmployees->close();

// Function to fetch attendance for a specific employee
function fetchAttendance($conn, $employeeId) {
    $stmtAttendance = $conn->prepare("SELECT date, time, location FROM attendance WHERE employee_id = ?");
    $stmtAttendance->bind_param("i", $employeeId);
    $stmtAttendance->execute();
    $resultAttendance = $stmtAttendance->get_result();
    $attendanceData = [];
    while ($row = $resultAttendance->fetch_assoc()) {
        $attendanceData[] = $row;
    }
    $stmtAttendance->close();
    return $attendanceData;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Dashboard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="admin_dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body text-center">
                <h3 class="card-title">Your Unique Code</h3>
                <p class="card-text" style="font-size: 24px; font-weight: bold;"><?php echo $_SESSION['unique_code']; ?></p>
            </div>
        </div>

        <div class="mt-5">
            <h4>Employees using Your Employer Code</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Date of Join</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $resultEmployees->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['date_of_join']; ?></td>
                            <td>
                                <a href="attendance_sheet.php?employee_id=<?php echo $row['id']; ?>" class="btn btn-info">Info</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
