<?php
session_start(); // creating new session
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- MDB icon -->
    <link rel="shortcut icon" href="assets/img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/mdb.min.css" />
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            /* background: linear-gradient(-45deg, #52e4ee, #3caee7, #0c6ac8, #234fd5);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite; */
        }

        /* @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        } */


        .card {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .ocean {
            height: 200px;
            width: 100%;
            overflow: hidden;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .ocean.v01 .wave {
            background: url(assets/img/wave.svg) repeat-x;
        }

        .ocean.v01 {
            transform: rotate(180deg);
            position: absolute;
            top: 0;
            left: 0;
        }

        .wave {
            background: url(assets/img/wave.svg) repeat-x;
            position: absolute;
            bottom: -25px;
            width: 6400px;
            height: 100%;
            animation: wave 7s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
            transform: translate3d(0, 0, 0);
        }

        .wave:nth-of-type(2) {
            bottom: -25px;
            animation: wave 7s cubic-bezier(0.36, 0.45, 0.63, 0.53) -.125s infinite, swell 7s ease -1.25s infinite;
            opacity: 1;
        }

        @keyframes wave {
            0% {
                margin-left: 0;
            }

            100% {
                margin-left: -1600px;
            }
        }

        @keyframes swell {

            0%,
            100% {
                transform: translateY(-25px);
            }

            50% {
                transform: translateY(5px);
            }
        }

        /* Loading Screen */
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            /* Change this to your desired background color */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Loading Animation time */
        #loading-screen {
            transition: opacity 0.25s ease;
            /* Add a transition for opacity */
            opacity: 1;
            /* Start with full opacity */
        }
    </style>

</head>

<body>
        <!--\| Loading Screen -->
<div id="loading-screen">
        <div class="spinner-border" role="status">
        </div>
        <p style="margin-left:10px;font-weight: bold;font-size: 1.8em;">Loading...</p>
    </div>
    <!-- |\ Loading Screen -->
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <!-- <?php var_dump($_SESSION); ?> check if alert is working -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <img src="assets/img/arisu-aris.gif" id="hovering" class="card-img-top rounded-circle mx-auto mt-3" alt="Profile Image" style="width: 150px;">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login</h2>
                        <!-- Display the alert message from the session -->
                        <?php if (isset($_SESSION['alert'])) { ?>
                            <div class="alert alert-danger mt-3">
                                <?php echo $_SESSION['alert']; ?>
                            </div>
                        <?php
                            unset($_SESSION['alert']); // Clear the alert message from session
                        } ?>
                        <!-- Form -->
                        <form action="proses_login.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Login ID</label>
                                <input type="text" class="form-control" id="loginid" name="loginid">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="loginpassword" name="loginpassword">
                            </div>
                            <p class="text-center mt-2">Don't have an account? <a href="register.php">Register here</a></p>
                            <p class="text-center mt-2">Wanna go the the site first? <a href="home.php">Click here</a></p>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MDB Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- music -->
    <audio id="music" loop>
        <source src="assets/audio/Usagi Flap.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <!-- Hovering img audio -->
    <script>
        const img = document.getElementById('hovering');
        const music = document.getElementById('music');

        img.addEventListener('mouseenter', () => {
            music.play();
            music.volume = 0.3;
        });

        img.addEventListener('mouseleave', () => {
            music.pause();
            music.currentTime = 0; // Reset audio to the beginning
        });
    </script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="js.js"></script>
</body>

</html>