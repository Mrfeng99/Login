<?php 
session_start();
include "koneksi.php"; 
$ambil_data = mysqli_query($koneksi, "SELECT * FROM users");
$total_user = mysqli_num_rows($ambil_data);
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit();
}
?>

  <!DOCTYPE html>
  <html lang="id">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Optrixx</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dashboard-style.css">
  </head>

  <body>

    <!-- Dashboard CRUD -->
    <div class="main-card" style="flex-direction: column; height: auto; min-height: 500px; padding: 30px;">

      <div style="background: #4f46e5; color: white; padding: 25px; border-radius: 12px; margin-bottom: 20px;">
        <h2 style="font-size: 1.0rem;">Selamat Datang Kembali!</h2>
        <p1>Senang melihatmu lagi di Optrixx.</p1>
      </div>

      <div style="margin-bottom: 25px; text-align: center;">
        <h2>Halo, <span><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Pengguna'; ?></span></h2>
        <p>Dashboard Admin.</p>
      </div>


      <div style="background: #f3f4f6; padding: 15px; border-radius: 12px; margin: 20px 0;">
        <h3 style="margin: 0; color: #4f46e5; text-align: center;"><?php echo $total_user; ?></h3>
        <p style="margin: 0; font-size: 0.8rem; color: #666;">Total Pengguna Terdaftar</p>
      </div>

      <!-- Form data user -->
      <div style="display: flex; flex-direction: column; gap: 10px;">
        <a href="data_pengguna.php" class="btn-login" style="text-decoration: none; text-align: center;">Lihat Data Pengguna</a>
        <!-- Form tambah user -->
        <a href="tambah.php" class="btn-login" style="text-decoration: none; text-align: center; background: #22c55e;">Tambah Data Baru</a>
        <!-- Pesan user dan inner join -->
        <a href="pesan_pengguna.php" style="text-decoration: none;">
          <button class="btn-login" style="background: #8b5cf6; margin-bottom: 10px;">
            Lihat Pesan Masuk
          </button>
        </a>
        </a>
        <a href="logout.php" class="btn-login" style="text-decoration: none; text-align: center; background: #ef4444; margin-top: 10px;">Logout</a>
      </div>

    </div>

  </body>

  </html>