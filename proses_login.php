<?php
session_start();
include "koneksi.php";

$email = mysqli_real_escape_string($koneksi, $_POST['user']);
$pass  = $_POST['pass'];

// Cari user di database berdasarkan email
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
$user  = mysqli_fetch_array($query);

if ($user) {
    // Autentikasi password
    if (password_verify($pass, $user['password'])) {
        $_SESSION['nama']   = $user['nama'];
        $_SESSION['status'] = "login";
        header("location:dashboard.php");
        exit();
    } else {
        header("location:login.php?pesan=gagal");
        exit();
    }
} else {
    header("location:login.php?pesan=gagal");
    exit();
}
?>
