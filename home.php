<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
    body {
        background-color: #f5f5f5;
    }

    .card {
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    #bgpurple {
        background-color: #6f42c1;
    }

    #bggreen {
        background-color: #28a745;
    }

    #bgblue {
        background-color: #007bff;
    }

    #bgorange {
        background-color: #fd7e14;
    }

    #bgred {
        background-color: #dc3545;
    }

    .card-link {
        text-decoration: none;
    }

    .glass-button {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }

    .glass-button:hover {
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.2);
        transform: translateY(-2px);
    }

    .glass-button .card-text {
        color: black;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-6 col-md-4 mb-4">
                <a href="rewards.php" class="card-link">
                    <div class="card text-center p-3 bg-purple text-white glass-button" id="bgpurple">
                        <h5>Pay Slip</h5>
                        <!-- <p class="card-text">Rewards</p> -->
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 mb-4">
                <a href="spends.php" class="card-link">
                    <div class="card text-center p-3 bg-green text-white glass-button" id="bggreen">
                        <h5>Profile</h5>
                        <!-- <p class="card-text">₹0</p> -->
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-8 mb-4">
                <a href="pay_bills.php" class="card-link">
                    <div class="card text-center p-3 bg-purple text-white glass-button" id="bgpurple">
                        <h5>Attendance</h5>
                        <p class="card-text">See Your Attendance Or Punch In/ Punch out</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 mb-4">
                <a href="autopay.php" class="card-link">
                    <div class="card text-center p-3 bg-blue text-white glass-button" id="bgblue">
                        <h5>Documents</h5>
                        <p class="card-text">See All Docs</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 mb-4">
                <a href="credit_score.php" class="card-link">
                    <div class="card text-center p-3 bg-orange text-white glass-button" id="bgorange">
                        <h5>Info</h5>
                        <p class="card-text"></p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 mb-4">
                <a href="top_offers.php" class="card-link">
                    <div class="card text-center p-3 bg-red text-white glass-button" id="bgred">
                        <h5>Leaves</h5>
                        <p class="card-text">Apply Here</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 mb-4">
                <a href="top_offers.php" class="card-link">
                    <div class="card text-center p-3 bg-red text-white glass-button" id="bgred">
                        <h5>LogOut</h5>
                        <p class="card-text">account</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-8 mb-4">
                <a href="pay_bills.php" class="card-link">
                    <div class="card text-center p-3 bg-purple text-white glass-button" id="bgpurple">
                        <h5>Rise Your ideas</h5>
                        <p class="card-text">chat anonymously online</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
