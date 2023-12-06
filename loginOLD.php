<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/img/Hololive Logo RadjaShiqnals 1x1.png" type="image/x-icon">
    <style>
        body {
            background-color: gray;
        }

        .btn-color {
            background-color: #0e1c36;
            color: #fff;
        }

        .profile-image-pic {
            height: 200px;
            width: 200px;
            object-fit: cover;
        }

        .cardbody-color {
            background-color: #ebf2fa;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-light mt-5">Login</h2>
                <div class="text-center mb-5 text-light">Made with bootstrap</div>
                <div>
                    <form class="card-body p-lg-5" action="proses_login.php" method="post">
                        <div class="text-center">
                            <img src="assets/img/arisu-aris.gif" class="img-fluid profile-image-pic rounded-circle my-5"
                                id="hovering" alt="profile">
                            <audio id="music" loop>
                                <source src="assets/audio/Usagi Flap.mp3" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="loginid" placeholder="Login User">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="loginpassword" placeholder="password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-primary px-5 mb-5 w-100"
                                id="liveAlertBtn">Login</button>
                        </div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-light">Not
                            Registered? <a href="register.php" class="text-light fw-bold"> Create an
                                Account</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div id="liveAlertPlaceholder"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
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
</body>

</html>