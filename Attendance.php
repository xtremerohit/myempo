<?php
session_start();
require 'db.php';

if (!isset($_SESSION['employee_id'])) {
    header('Location: empo_login.php');
    exit();
}

$employee_id = $_SESSION['employee_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];

    $stmt = $conn->prepare("INSERT INTO attendance (employee_id, date, time, location, action) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $employee_id, $date, $time, $location, $action);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Attendance recorded successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Attendance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Attendance</h5>
                <p id="datetime" class="card-text"></p>
                <button id="punchIn" class="btn btn-primary">Punch In</button>
                <button id="punchOut" class="btn btn-danger">Punch Out</button>
                <div id="alert" class="alert mt-3" style="display: none;"></div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function updateDateTime() {
                const now = new Date();
                $('#datetime').text(now.toLocaleString());
            }

            setInterval(updateDateTime, 1000);

            function sendAttendance(action) {
                const now = new Date();
                const date = now.toISOString().split('T')[0];
                const time = now.toTimeString().split(' ')[0];
                const location = 'Your Location'; // Update with actual location if needed

                $.ajax({
                    url: 'attendance.php',
                    type: 'POST',
                    data: {
                        action: action,
                        date: date,
                        time: time,
                        location: location
                    },
                    success: function (response) {
                        const res = JSON.parse(response);
                        $('#alert').removeClass('alert-danger alert-success').addClass(res.status === 'success' ? 'alert-success' : 'alert-danger').text(res.message).show();
                        setTimeout(() => {
                            $('#alert').hide();
                        }, 3000);
                    }
                });
            }

            $('#punchIn').click(function () {
                sendAttendance('Punch In');
            });

            $('#punchOut').click(function () {
                sendAttendance('Punch Out');
            });
        });
    </script>
</body>
</html>
