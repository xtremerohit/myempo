<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: black;
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: #fff;
            border-radius: 15px;
            margin: 12px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .inner-card {
            background-color: #007BFF;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            color: #fff;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 18px;
            text-decoration: none;
            display: block;
        }
        .inner-card:hover {
            background-color: #0056b3;
        }
        .link {
            margin-top: 20px;
        }
        .link a {
            text-decoration: none;
            color: #007BFF;
        }
        .link a:hover {
            text-decoration: underline;
        }
        .signup-text {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="signup-text">Signup</div>
        <a href="signup.php" class="inner-card">Admin Signup</a>
        <a href="empo_signup.php" class="inner-card">Employee Signup</a>
        <div class="link">
            <p>Already have an account? <a href="index.html">Login here</a></p>
        </div>
    </div>
</body>
</html>
