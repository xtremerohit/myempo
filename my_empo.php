<?php
require 'db.php';
session_start();

if (!isset($_SESSION['admin_uid'])) {
    header('Location: login.php');
    exit();
}

$admin_uid = $_SESSION['admin_uid'];
$stmt = $conn->prepare("SELECT unique_code FROM admins WHERE firebase_uid = ?");
$stmt->bind_param("s", $admin_uid);
$stmt->execute();
$stmt->bind_result($uniqueCode);
$stmt->fetch();
$stmt->close();

$stmt = $conn->prepare("SELECT username, full_name, date_of_join, employee_id FROM employees WHERE employer_code = ?");
$stmt->bind_param("s", $uniqueCode);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Employees</title>
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
        <h2>My Employees</h2>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['username']; ?></h5>
                    <p class="card-text">Full Name: <?php echo $row['full_name']; ?></p>
                    <p class="card-text">Date of Join: <?php echo $row['date_of_join']; ?></p>
                    <p class="card-text">Employee ID: <?php echo $row['employee_id']; ?></p>
                    <a href="see_attendance.php?employee_id=<?php echo $row['employee_id']; ?>" class="btn btn-primary">See Attendance</a>
                </div>
            </div>
        <?php endwhile; ?>
        <?php
        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
