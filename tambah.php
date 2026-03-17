<?php
session_start();
include "koneksi.php";

// Proteksi Login: Jika tidak ada session user, tendang ke login.php
if (!isset($_SESSION['nama'])) { 
    // Pastikan 'email' sesuai dengan email session saat login
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tambah Pengguna - Optrixx</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="tambah-style.css">
   </head>
   <body>
      <!-- Form tambah user -->
      <div class="tambah-container">
         <div class="tambah-card">
            <h2>Tambah Pengguna</h2>
            <p class="subtitle">Silakan isi formulir di bawah untuk mendaftarkan pengguna baru.</p>
            <form action="proses_crud.php?aksi=tambah" method="POST">
               <div class="input-group-tambah">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama" placeholder="Contoh: Budi Santoso" required>
               </div>
               <div class="input-group-tambah">
                  <label>Email</label>
                  <input type="email" name="email" placeholder="contoh@mail.com" required>
               </div>
               <div class="action-buttons">
                  <button type="submit" class="btn-simpan">Simpan Data</button>
                  <a href="data_pengguna.php" class="btn-kembali">Kembali ke Tabel</a>
               </div>
            </form>
         </div>
      </div>
   </body>
</html>
