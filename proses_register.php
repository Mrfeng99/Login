<?php
include "koneksi.php";

// Mengambil data dari form
$nama  = mysqli_real_escape_string($koneksi, $_POST['nama_user']);
$email = mysqli_real_escape_string($koneksi, $_POST['email_user']);
$p1    = $_POST['pass1'];
$p2    = $_POST['pass2'];

// Cek apakah password dan ulangi password sama
if ($p1 !== $p2) {
    echo "<script>alert('Konfirmasi password tidak cocok!'); window.location.href='register.php';</script>";
    exit();
}

// Enkripsi password agar aman (tidak bisa dibaca admin database)
$password_aman = password_hash($p1, PASSWORD_DEFAULT);

// Cek apakah email sudah pernah didaftarkan atau belum
$cek_email = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");

if (mysqli_num_rows($cek_email) > 0) {
    echo "<script>alert('Email ini sudah terdaftar, silahkan gunakan email lain!'); window.location.href='register.php';</script>";
} else {
    // Masukkan data ke database
    $query = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password_aman')";
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>alert('Akun berhasil dibuat! Silahkan login.'); window.location.href='login.php';</script>";
    } else {
        echo "Gagal daftar: " . mysqli_error($koneksi);
    }
}
?>
