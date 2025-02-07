<?php
include './app/require.php';
include './app/controllers/authController.php';

Util::isUser();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $response = (new authController())->register($_POST);
}

Util::head('Register');
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
            height: 100vh;
            width: 100%;
        }
        .row-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            height: 100vh;
            width: 100%;
            gap: 0.5in;
        }
        .card {
            background-color: #1B1B1D;
            border: 2px solid #70a1ff;
            box-shadow: 0px 0px 45px 4px rgba(0,0,0,0.27);
            width: 45%; 
        }
        .card-body {
            padding: 20px; 
        }
        .card-title {
            color: #2766db; 
            margin-bottom: 20px;
        }
        .form-control {
            background-color: #1B1B1D;
            color: #bdc3c7;
            border: none;
            text-align: center;
            margin-bottom: 10px;
            width: 100%; 
            box-sizing: border-box;
        }
        .btn-outline-primary {
            background-color: transparent;
            color: #70a1ff;
            border: 2px solid #70a1ff;
            width: 100%;
        }
        .btn-outline-primary:hover {
            background-color: rgba(250, 204, 145, 0.1);
        }
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
                    <h4 class="card-title text-center">Register</h4>
                    <?php if (isset($response)) : ?>
                        <div class="alert alert-primary" role="alert">
                            <?= Util::display($response); ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Username" name="username" minlength="3" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-sm" placeholder="Password" name="password" minlength="4" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-sm" placeholder="Confirm password" name="confirmPassword" minlength="4" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="invite Code" name="invCode" required>
                        </div>
                        <button class="btn btn-outline-primary btn-block" name="register" id="submit" type="submit" value="submit">
                            Register
                        </button>
                    </form>
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
        let titles =  ["$","%","&", "S", "S $", "S %", "S &", "S L $", "S L A $", "S L A %","S L A &", "S L A C $", "S L A C K", "S L A C K. V I P"];
        let currentTitleIndex = 0;

        function changeTitle() {
            document.title = titles[currentTitleIndex];
            currentTitleIndex = (currentTitleIndex + 1) % titles.length; 
        }

        setInterval(changeTitle, 1000); 

        particlesJS('pg', {
            particles: {
                number: {
                    value: 80,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: "#FACC91"
                },
                shape: {
                    type: "circle",
                    stroke: {
                        width: 0,
                        color: "#000000"
                    }
                },
                opacity: {
                    value: 0.5,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 3,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 40,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#70a1ff",
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: "none",
                    random: false,
                    straight: false,
                    out_mode: "out",
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: {
                        enable: true,
                        mode: "repulse"
                    },
                    onclick: {
                        enable: true,
                        mode: "push"
                    }
                }
            },
            retina_detect: true
        });
    </script>
</body>
</html>
