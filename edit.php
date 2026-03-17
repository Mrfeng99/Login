<?php
session_start();
include "koneksi.php";

// Jika tidak ada session user, lempar ke login.php
if (!isset($_SESSION['nama'])) { // Ganti 'username' sesuai nama session login kamu
    header("Location: login.php");
    exit;
}

// Jika tidak ada parameter ID di URL, lempar ke data_pengguna.php
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: data_pengguna.php");
    exit;
}

$id = $_GET['id'];

// Ambil data dan cek ada di database atau tidak
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$row = mysqli_fetch_array($query);

// Jika ID ada di URL tapi tidak ada di database (ID ngasal)
if (!$row) {
    header("Location: data_pengguna.php?pesan=data_tidak_ditemukan");
    exit;
}
?>

  <!DOCTYPE html>
  <html lang="id">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna - Optrixx</title>
    <link rel="stylesheet" href="edit-style.css">
  </head>

  <body>
    <div class="edit-wrapper">
      <div class="edit-card">
        <h2>Edit Pengguna</h2>
        <p>Perbarui informasi akun yang sudah ada.</p>
        <form action="proses_crud.php?aksi=update" method="POST">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <div class="input-field">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
          </div>
          <div class="input-field">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
          </div>
          <button type="submit" class="btn-update">Simpan Perubahan</button>
          <a href="data_pengguna.php" class="btn-cancel">Batal</a>
        </form>
      </div>
    </div>
  </body>

  </html>