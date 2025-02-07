<?php

require_once './app/require.php';

Util::isUser();
Util::isBanned();

require_once './app/controllers/cheatController.php';
require_once './app/controllers/userController.php';

$userController = new userController;
$cheatData = (new cheatController)->getCheatData();

$userCount = $userController->getCount();
$newestUser = $userController->getNew();
$hasSub = $userController->getSubscription() > 0;

Util::head($user['username']);
Util::navbar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S L A C K. V I P</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/odometer.css">
    <link rel="stylesheet" href="css/boxydesigns.css">
    <link rel="stylesheet" href="css/side.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style>
        body {
            background-color: #1B1B1D;
            color: #bdc3c7;
            font-family: 'Inconsolata', monospace;
            overflow: hidden; 
        }
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            /* Remove fixed height */
            width: 100%;
            min-height: 100vh; /* Ensure full viewport height */
        }
        .row-content {
            display: flex;
            flex-direction: column; /* Stack content vertically */
            width: 80%; /* Adjust width as needed */
            max-width: 1200px; /* Set a maximum width */
            margin: 20px auto; /* Center the content */
        }
        .card {
            background-color: #1B1B1D;
            border: 2px solid #70a1ff;
            box-shadow: 0px 0px 45px 4px rgba(0,0,0,0.27);
            margin-bottom: 20px; /* Add spacing between cards */
        }
        .card-body {
            padding: 20px; 
        }
        .card-title {
            color: #2766db; 
            margin-bottom: 20px;
        }
        /* Style the alert messages */
        .alert-primary {
            background-color: #1B1B1D; /* Match card background */
            color: #70a1ff; /* Match card border color */
            border: 2px solid #70a1ff;
        }
        /* Style the links within alerts */
        .alert-primary a {
            color: #FACC91; /* Example link color */
            text-decoration: none;
        }
        .alert-primary b {
            color: #FACC91; /* Example link color */
        }
        /* Style the statistics and status information */
        .h5 {
            color: #70a1ff;
        }
        .rounded {
            background-color: #1B1B1D;
            border: 2px solid #70a1ff;
        }
        .text-muted {
            color: #bdc3c7 !important; /* Override Bootstrap's default */
        }
        .clearfix p {
            color: #bdc3c7;
        }
        /* ... (rest of your CSS) ... */
        #pg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; 
        }
    </style>
</head>
<body style="background-color:#1B1B1D; color: #bdc3c7; font-family: 'Inconsolata', monospace;">
    <div id="pg"></div>
    <div class="center-container">
        <div class="row-content">

            <div class="card">
                <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                        Welcome back,
                        <a href="<?= BASE_PATH; ?>profile.php"><b><?= Util::display($user['username']) ?></b></a>.
                    </div>
                </div>
            </div>

             <div class="card">
                <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                        Warning, Software is still being developed, if you want to pre-order, you can make a ticket on the main
                        <a href="<?= BASE_PATH; ?>gotoforum.php"><b>forum</b></a>.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="h5 border-bottom border-secondary pb-1"><i class="fas fa-chart-area"></i> Statistics</div>
                    <div class="row text-muted">
                        <div class="col-12 clearfix">
                            Users: <p class="float-right mb-0"><?= Util::display($userCount); ?></p>
                        </div>
                        <div class="col-12 clearfix">
                            Latest User: <p class="float-right mb-0"><?= Util::display($newestUser); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="h5 border-bottom border-secondary pb-1"><i class="fas fa-exclamation-circle"></i> Status</div>
                    <div class="row text-muted">
                        <div class="col-12 clearfix">
                            Status: <p class="float-right mb-0"><?= Util::display($cheatData->status); ?></p>
                        </div>
                        <div class="col-12 clearfix">
                            Version: <p class="float-right mb-0"><?= Util::display($cheatData->version); ?></p>
                        </div>
                        <?php if (Util::display($cheatData->status) == 'Detected') : ?>
                            <?php if ($hasSub) : ?>
                                <div class="col-12 text-center pt-1">
                                    <div class="border-top border-secondary pt-1">
                                        Loader is down for maintenance, sorry for the inconvenience.
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (Util::display($cheatData->status) == 'Undetected') : ?>
                            <?php if ($hasSub) : ?>
                                <div class="col-12 text-center pt-1">
                                    <div class="border-top border-secondary pt-1">
                                        <a href="/download.php">Download Loader</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="js/partis.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/boxy.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
    <script>
        // ... (your JavaScript code) ...
    </script>
</body>
</html>
