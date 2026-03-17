<?php
include "koneksi.php";

$aksi = $_GET['aksi'];

// Logika Tambah
if ($aksi == "tambah") {
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $query = "INSERT INTO users (nama, email) VALUES ('$nama', '$email')";
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>alert('Data Berhasil Ditambah!'); window.location.href='data_pengguna.php';</script>";
    }
}

// Logika update
elseif ($aksi == "update") {
    $id    = $_POST['id'];
    $nama  = $_POST['nama'];
    $email = $_POST['email'];

    $query = "UPDATE users SET nama='$nama', email='$email' WHERE id='$id'";
    $update = mysqli_query($koneksi, $query);

    if ($update) {
        echo "<script>alert('Data Berhasil Diperbarui!'); window.location.href='data_pengguna.php';</script>";
    } else {
        echo "Gagal Update: " . mysqli_error($koneksi);
    }
}

// Logika Hapus
if ($aksi == "hapus") {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = '$id'";
    $hapus = mysqli_query($koneksi, $query);

    if ($hapus) {
        echo "<script>alert('Data Berhasil Dihapus!'); window.location.href='data_pengguna.php';</script>";
    }
}
?>
