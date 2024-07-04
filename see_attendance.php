<?php
require 'db.php';
session_start();

if (!isset($_SESSION['admin_uid'])) {
    header('Location: login.php');
    exit();
}

$employee_id = $_GET['employee_id'];
$stmt = $conn->prepare("SELECT date, action FROM attendance WHERE employee_id = ?");
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Attendance for Employee ID: <?php echo $employee_id; ?></h2>
        <div class="card mt-3">
            <div class="card-body">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <p><?php echo $row['date']; ?> - <?php echo $row['action']; ?></p>
                <?php endwhile; ?>
            </div>
        </div>
        <?php
        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
