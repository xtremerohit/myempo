<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body,html {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: black;
        }
        .container {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            width: 90%;
            max-width: 800px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
            text-decoration: none;
            color: inherit;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card h3 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        #card1{
            background-color: #9BEC00;
        }
        #card2{
            background-color: #AF47D2;
        }
        #card3{
            background-color: #FF8F00;
        }
        #card4{
            background-color: #FFDB00;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="#" class="card" id="card1">
            <h3>Profile</h3>
        </a>
        <a href="#" class="card" id="card2">
            <h3>Attendance</h3>
        </a>
        <a href="#" class="card" id="card3">
            <h3>Payslip</h3>
        </a>
        <a href="#" class="card" id="card4">
            <h3>Message</h3>
        </a>
    </div>
</body>
</html>
