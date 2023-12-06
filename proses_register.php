<?php
session_start();
if ($_POST) {
    $username = $_POST['username'];
    $loginid = $_POST['loginid'];
    $loginpassword = $_POST['loginpassword'];
    $specialty = $_POST['specialty'];
    $age = $_POST['age'];
    if (empty($username) && empty($loginid) && empty($loginpassword) && empty($specialty) && empty($age)) {
        $_SESSION['alertpw'] = "Data tidak boleh kosong";
        header("Location: register.php");
        exit();
    } elseif (empty($loginid)) {
        $_SESSION['alertpw'] = "Login ID tidak boleh kosong";
        header("Location: register.php");
        exit();
    } elseif (empty($username)) {
        $_SESSION['alertpw'] = "Username tidak boleh kosong";
        header("Location: register.php");
        exit();
    } elseif (empty($loginpassword)) {
        $_SESSION['alertpw'] = "Password tidak boleh kosong";
        header("Location: register.php");
        exit();
    } elseif (empty($specialty)) {
        $_SESSION['alertpw'] = "Specialty tidak boleh kosong";
        header("Location: register.php");
        exit();
    } elseif (empty($age)) {
        $_SESSION['alertpw'] = "Age tidak boleh kosong";
        header("Location: register.php");
        exit();
    } else {
        include 'koneksi.php';
        // Check if loginid already exists
        $check_loginid = mysqli_query($conn, "SELECT * FROM user WHERE login = '" . $loginid . "'");
        if (mysqli_num_rows($check_loginid) > 0) {
            $_SESSION['alertpw'] = "Login ID sudah ada";
            header("Location: register.php");
            exit();
        }
        // Check if username already exists
        $check_loginid = mysqli_query($conn, "SELECT * FROM user WHERE username = '" . $username . "'");
        if (mysqli_num_rows($check_loginid) > 0) {
            $_SESSION['alertpw'] = "Username sudah ada";
            header("Location: register.php");
            exit();
        }
        // If loginid is unique, proceed with insertion
        $insert = mysqli_query($conn, "INSERT INTO user (username, login, password, age, specialty) VALUE ('" . $username . "','" . $loginid . "', '" . $loginpassword . "','".$age."','".$specialty."')");
        if ($insert) {
            $_SESSION['alertregsuccess'] = "Sukses membuat akun";
            header("Location: register.php");
            exit();
        } else {
            $_SESSION['alertpw'] = "Gagal membuat akun";
            header("Location: register.php");
            exit();
        }
    }
}
