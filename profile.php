<?php

require_once './app/require.php';

Util::isUser();
Util::isBanned();

require_once './app/controllers/userController.php';

$userController = new userController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["updatePassword"])) {
        $error = $userController->updatePassword($_POST);
    }

    if (isset($_POST["addSubscription"])) {
        $error = $userController->addSubscription($_POST);
    }
}

$sub = $userController->getSubscription();

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
            width: 100%;
            min-height: 100vh;
        }
        .row-content {
            display: flex;
            flex-direction: row; /* Key for horizontal layout */
            justify-content: center;
            align-items: flex-start; /* Align to top */
            width: 80%;
            max-width: 1200px;
            margin: 20px auto;
        }
        .left-column {
            width: 50%; /* Adjust as needed */
            padding-right: 10px;
        }
        .right-column {
            width: 50%; /* Adjust as needed */
            padding-left: 10px;
        }
        .card {
            background-color: #1B1B1D;
            border: 2px solid #70a1ff;
            box-shadow: 0px 0px 45px 4px rgba(0,0,0,0.27);
            width: 100%; /* Important: Cards fill column width */
            margin-bottom: 20px;
        }
        .card-body {
            padding: 20px; 
        }
        .card-title {
            color: #2766db; 
            margin-bottom: 20px;
        }
        .alert-primary {
            background-color: #1B1B1D;
            color: #70a1ff;
            border: 2px solid #70a1ff;
        }
        .alert-primary a {
            color: #FACC91;
            text-decoration: none;
        }
        .alert-primary b {
            color: #FACC91; 
        }
        .h5 {
            color: #70a1ff;
        }
        .rounded {
            background-color: #1B1B1D;
            border: 2px solid #70a1ff;
        }
        .text-muted {
            color: #bdc3c7!important;
        }
        .clearfix p {
            color: #bdc3c7;
        }
        #pg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; 
        }
        @media (max-width: 768px) {
            .row-content {
                flex-direction: column;
                align-items: center;
            }
            .left-column, .right-column {
                width: 100%;
                padding: 0;
            }
        }
    </style>
</head>
<body style="background-color:#1B1B1D; color: #bdc3c7; font-family: 'Inconsolata', monospace;">
    <div id="pg"></div>
    <div class="center-container">
        <div class="row-content">

            <div class="left-column">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">Update Password</h4>

                        <form method="POST">

                            <div class="form-group">
                                <input type="password" class="form-control form-control-sm"
                                       placeholder="Current Password" name="currentPassword" required>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control form-control-sm" placeholder="New Password"
                                       name="newPassword" required>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control form-control-sm"
                                       placeholder="Confirm password" name="confirmPassword" required>
                            </div>

                            <button class="btn btn-outline-primary btn-block" name="updatePassword" type="submit"
                                    value="submit">Update
                            </button>

                        </form>

                    </div>
                </div>
            </div>

            <div class="right-column">
                <div class="card">
                    <div class="card-body">
                        <div class="h5 border-bottom border-secondary pb-1"><?= Util::display($user['username']); ?></div>
                        <div class="row">
                            <div class="col-12 clearfix">
                                UID: <p class="float-right mb-0"><?= Util::display($user['uid']); ?></p>
                            </div>
                            <div class="col-12 clearfix">
                                Sub:
                                <p class="float-right mb-0"><?= Util::display(($sub > 0) ? "${sub} days" : '0 days') ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($sub <= 0) : ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Activate Sub</h4>

                            <form method="POST">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Subscription Code" name="subCode" required>
                                </div>

                                <button class="btn btn-outline-primary btn-block" name="addSubscription"
                                        type="submit" value="submit">Activate Sub
                                </button>

                            </form>

                        </div>
                    </div>
                <?php endif; ?>
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
