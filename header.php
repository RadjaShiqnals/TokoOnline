<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- MDB icon -->
    <link rel="shortcut icon" href="assets/img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap">
    <!-- MDB -->
    <link rel="stylesheet" href="assets/css/mdb.min.css" />
    <link rel="stylesheet" href="style.css">
    <title>Shiqnals Market</title>
</head>

<body>
    <!--\| Loading Screen -->
<div id="loading-screen">
        <div class="spinner-border" role="status">
        </div>
        <p style="margin-left:10px;font-weight: bold;font-size: 1.8em;">Loading...</p>
    </div>
    <!-- |\ Loading Screen -->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#2109ae;">
        <div class="container">
            <a class="navbar-brand" href="home.php">Shiqnals Market</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="belanja.php">Belanja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="keranjang.php">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="histori_pembelian.php">Transaksi</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <?php if (isset($_SESSION['username'])) { ?>
                    <span class="text-light me-2">Welcome 
                    <span class="text-light me-2" id="username"><?php echo $_SESSION['username']; ?></span></span>
                    <a class="btn btn-outline-light me-2 login-btn" href="profile.php">Profile</a>
                    <a class="btn btn-outline-light me-2 login-btn" href="logout.php">Logout</a>
                <?php } else { ?>
                    <a class="btn btn-outline-light me-2 login-btn" href="login.php">
                        <i class="fas fa-home"></i> Login
                    </a>
                <?php } ?>
                <a class="btn btn-outline-light register-btn" href="register.php">Register</a>
            </div>

    </nav>