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
            width: 100%;
            min-height: 100vh;
        }
        .row-content {
            display: flex;
            width: 80%;
            max-width: 1200px;
            margin: 20px auto;
        }
        .column {
            flex: 1;
            padding: 10px;
        }
        .card {
            background-color: #1B1B1D;
            border: 2px solid #70a1ff;
            box-shadow: 0px 0px 45px 4px rgba(0,0,0,0.27);
            margin-bottom: 20px;
            text-align: center;
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
            color: #bdc3c7 !important;
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
        .button-custom {
             background-color: #1B1B1D;
              color: #70a1ff;
                border: 2px solid #70a1ff;
             padding: 12px 24px;
             font-size: 16px;
              font-family: 'Inconsolata', monospace;
             text-transform: uppercase;
              letter-spacing: 1px;
              cursor: pointer;
             transition: all 0.3s ease-in-out;
              box-shadow: 0px 0px 15px rgba(112, 161, 255, 0.5);
              border-radius: 5px;
             outline: none; /* Remove default focus outline */
}

.button-custom:hover {
    background-color: #70a1ff;
    color: #1B1B1D;
    box-shadow: 0px 0px 20px rgba(112, 161, 255, 0.8);
}

.button-custom:active {
    transform: scale(0.95);
}
    .custom-alert {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #1B1B1D;
    color: #70a1ff;
    border: 2px solid #70a1ff;
    padding: 15px 20px;
    font-family: 'Inconsolata', monospace;
    font-size: 16px;
    border-radius: 5px;
    box-shadow: 0px 0px 15px rgba(112, 161, 255, 0.5);
    opacity: 0;
    transform: translateY(-20px);
    transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    z-index: 9999;
}

.custom-alert.show {
    opacity: 1;
    transform: translateY(0);
}

    </style>
</head>
<body style="background-color:#1B1B1D; color: #bdc3c7; font-family: 'Inconsolata', monospace;">
    <div id="pg"></div>
    <div class="center-container">
        <div class="row-content">

            <div class="column">
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

            <div class="column">
<script>
    function showCustomAlert(luaName, buttonElement) {
        let alertBox = document.getElementById("customAlert");
        alertBox.innerText = "Linked " + luaName + " to your UID"; 
        alertBox.classList.add("show");

        setTimeout(() => {
            alertBox.classList.remove("show");
        }, 3000);

        moveToActiveLua(luaName, buttonElement);
    }

    function moveToActiveLua(luaName, buttonElement) {
        let activeLuaSection = document.getElementById("activeLuas");

        // Check if already added
        let existingItems = activeLuaSection.getElementsByTagName("div");
        for (let i = 0; i < existingItems.length; i++) {
            if (existingItems[i].querySelector("p").innerText === luaName) {
                return; 
            }
        }

        // Create new container for active LUA
        let luaContainer = document.createElement("div");
        luaContainer.style.display = "flex";
        luaContainer.style.alignItems = "center";
        luaContainer.style.justifyContent = "space-between";

        // Create LUA name element
        let newLua = document.createElement("p");
        newLua.innerText = luaName;
        newLua.style.color = "#70a1ff"; 

        // Create [+] button
        let restoreButton = document.createElement("button");
        restoreButton.innerText = "[-]";
        restoreButton.style.background = "none";
        restoreButton.style.border = "none";
        restoreButton.style.color = "#FACC91";
        restoreButton.style.fontSize = "16px";
        restoreButton.style.cursor = "pointer";
        restoreButton.onclick = function() {
            moveToSlackScripts(luaName, luaContainer, buttonElement);
        };

        // Append elements
        luaContainer.appendChild(newLua);
        luaContainer.appendChild(restoreButton);
        activeLuaSection.appendChild(luaContainer);

        // Hide the button in Slack Scripts
        buttonElement.style.display = "none";
    }

    function moveToSlackScripts(luaName, luaContainer, buttonElement) {
        // Remove from "Your active LUAS"
        luaContainer.remove();

        // Show button again in "Slack Scripts"
        buttonElement.style.display = "inline-block";
    }
</script>


<div class="card">
    <div class="card-body">
        <h5 class="card-title">Slack© Scripts</h5>
        <div id="customAlert" class="custom-alert">Linked LUA to your UID</div>

        <button class="button-custom" onclick="showCustomAlert('Slack Legit-bot', this)">Slack LegitBot</button>
        <br><br>
        <button class="button-custom" onclick="showCustomAlert('FC2 ESP', this)">FC2 ESP</button> 
        <br><br>
        <button class="button-custom" onclick="showCustomAlert('Slack Misc', this)">Slack Misc</button> 
    </div>
</div>



<div class="card">
    <div class="card-body">
        <h5 class="card-title">Your active LUAS</h5>
        <div id="activeLuas"></div> <!-- Scripts will be added here -->
    </div>
</div>


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Other users shared LUAS</h5>
                        <p>This is the custom LUAS section.</p>
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
</body>
</html>
