<?php
session_start();

if ($_POST) {
    $loginid = $_POST['loginid'];
    $loginpassword = $_POST['loginpassword'];

    if (empty($loginid) && empty($loginpassword)) {
        $_SESSION['alert'] = "Login dan Password tidak boleh kosong";
        header("Location: login.php");
        exit();
    } elseif (empty($loginpassword)) {
        $_SESSION['alert'] = "Password tidak boleh kosong";
        header("Location: login.php");
        exit();
    }
    elseif (empty($loginid)) {
        $_SESSION['alert'] = "Login ID tidak boleh kosong";
        header("Location: login.php");
        exit();
    } else {
        include "koneksi.php";
        $qry_login = mysqli_query($conn, "SELECT * from user where login = '" . $loginid . "'");
        if (mysqli_num_rows($qry_login) > 0) {
            $dt_login = mysqli_fetch_array($qry_login);
            if ($loginpassword == $dt_login['password']) {
                $_SESSION['id_user'] = $dt_login['id_user'];
                $_SESSION['username'] = $dt_login['username'];
                $_SESSION['age'] = $dt_login['age'];
                $_SESSION['specialty'] = $dt_login['specialty'];
                $_SESSION['status_login_tokoonline'] = true;
                header("location: home.php");
                exit();
            } else {
                // Password Salah
                $_SESSION['alert'] = "Password salah";
                header("Location: login.php");
                exit();
            }
        } else {
            // Login ID tidak terdaftar
            $_SESSION['alert'] = "Login tidak terdaftar";
            header("Location: login.php");
            exit();
        }
    }
}
?>
