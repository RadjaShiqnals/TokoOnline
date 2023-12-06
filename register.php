<?php
session_start(); // creating new session
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- MDB icon -->
    <link rel="shortcut icon" href="assets/img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="assets/css/mdb.min.css" />
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

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
    <title>Registration Form</title>
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
                    <img src="assets/img/arisu-aris.gif" class="card-img-top rounded-circle mx-auto mt-3" alt="Profile Image" style="width: 150px;">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Register</h2>
                        <!-- Display the alert message from the session -->
                        <?php if (isset($_SESSION['alertregsuccess'])) { ?>
                            <div class="alert alert-success mt-3">
                                <?php echo $_SESSION['alertregsuccess']; ?>
                            </div>
                        <?php
                            unset($_SESSION['alertregsucccess']); // Clear the alert message from session
                        } ?>
                        <!-- Display the alert message from the session -->
                        <?php if (isset($_SESSION['alertpw'])) { ?>
                            <div class="alert alert-danger mt-3">
                                <?php echo $_SESSION['alertpw']; ?>
                            </div>
                        <?php
                            unset($_SESSION['alertpw']); // Clear the alert message from session
                        } ?>
                        <!-- Form -->
                        <form action="proses_register.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Login ID</label>
                                <input type="text" class="form-control" id="loginid" name="loginid">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="loginpassword" name="loginpassword">
                            </div>
                            <div class="mb-3">
                                <label for="specialty" class="form-label">Specialty</label>
                                <input type="text" class="form-control" id="specialty" name="specialty">
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age">
                            </div>
                            <p class="text-center mt-2">Already have an account? <a href="login.php">Login here</a></p>
                            <p class="text-center mt-2">Wanna go the the site first? <a href="home.php">Click here</a></p>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js.js"></script>
</body>

</html>