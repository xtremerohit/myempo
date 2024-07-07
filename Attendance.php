<?php
// include 'navbar.php';
require 'db.php';

session_start();

if (!isset($_SESSION['employee_id'])) {
    header('Location: empo_login.php');
    exit();
}

$employee_id = $_SESSION['employee_id'];
$date = date('Y-m-d');
$time = date('H:i:s');
$location = 'Office'; // Replace with actual location logic if needed
$action = '';
$alert = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if punched in today
    $stmt = $conn->prepare("SELECT * FROM attendance WHERE employee_id = ? AND date = ? AND action = 'Punch In'");
    $stmt->bind_param("is", $employee_id, $date);
    $stmt->execute();
    $punched_in_today = $stmt->get_result()->fetch_assoc();

    // Check if punched out today
    $stmt = $conn->prepare("SELECT * FROM attendance WHERE employee_id = ? AND date = ? AND action = 'Punch Out'");
    $stmt->bind_param("is", $employee_id, $date);
    $stmt->execute();
    $punched_out_today = $stmt->get_result()->fetch_assoc();

    if (isset($_POST['punch_in']) && !$punched_in_today) {
        $action = 'Punch In';
    } elseif (isset($_POST['punch_out']) && !$punched_out_today) {
        $action = 'Punch Out';
    }

    if ($action) {
        $stmt = $conn->prepare("INSERT INTO attendance (employee_id, date, time, location, action) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $employee_id, $date, $time, $location, $action);
        if ($stmt->execute()) {
            $alert = "Successfully $action at $time";
        } else {
            $alert = "Error: Could not record $action.";
        }
    } else {
        $alert = "You have already punched in or out today.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #000000; /* Black background */
            color: #ffffff; /* White text */
        }
        .card-center {
            width: 100%;
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
            border-radius: 10px; /* Rounded corners */
        }
        .card {
            background-color: #ffffff; /* White card */
            color: #000000; /* Black text inside card */
            border-radius: 10px; /* Rounded corners */
        }
        .navbar {
            background-color: #ffffff; /* White navbar */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="card card-center text-center">
        <div class="card-body">
            <h5 class="card-title">Attendance</h5>
            <p class="card-text" id="datetime"></p>
            <?php if ($alert): ?>
                <div class="alert alert-info"><?php echo $alert; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <button type="submit" name="punch_in" class="btn btn-primary btn-block mt-3" <?php echo $punched_in_today ? 'disabled' : ''; ?>>Punch In</button>
                <button type="submit" name="punch_out" class="btn btn-secondary btn-block mt-3" <?php echo $punched_out_today ? 'disabled' : ''; ?>>Punch Out</button>
            </form>
        </div>
    </div>

    <script>
        function updateTime() {
            var now = new Date();
            var datetime = now.toLocaleString();
            document.getElementById('datetime').innerText = datetime;
        }
        setInterval(updateTime, 1000);
        updateTime(); // Initial call to set the time immediately
    </script>
</body>
</html>
