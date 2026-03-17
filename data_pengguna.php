<?php
session_start();
include 'koneksi.php';

// Proteksi login
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit;
}
?>

  <!DOCTYPE html>
  <html lang="id">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna - Optrixx</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dashboard-style.css">
  </head>

  <body>
    <div class="main-card" style="max-width: 800px; width: 95%; height: auto; padding: 25px;">
      <h2 style="color: #1e1b4b; text-align: left; margin-bottom: 5px;">Data Pengguna</h2>
      <p style="color: #64748b; text-align: left; margin-bottom: 20px; font-size: 0.9rem;">Manajemen akun terdaftar dalam sistem</p>

      <!-- Form tambah data -->
      <a href="tambah.php" class="btn-login" style="background: #4f46e5; width: auto; display: inline-block; padding: 10px 20px; margin-bottom: 20px; font-size: 0.85rem;">+ Tambah Data</a>

      <div style="width: 100%; overflow-x: auto; border-radius: 12px; border: 1px solid #eef2ff;">
        <table style="min-width: 600px;">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>

            <!-- Batas per halaman -->
            <?php 
                    $batas = 5;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;	
                    $query_hitung = mysqli_query($koneksi, "SELECT * FROM users");
                    $total_halaman = ceil(mysqli_num_rows($query_hitung) / $batas);
                    $data = mysqli_query($koneksi, "SELECT * FROM users LIMIT $halaman_awal, $batas");
                    $no = $halaman_awal + 1;
                    while($d = mysqli_fetch_array($data)){
                    ?>
              <tr>
                <td style="text-align: center;">
                  <?php echo $no++; ?>
                </td>
                <td><strong><?php echo $d['nama']; ?></strong></td>
                <td>
                  <?php echo $d['email']; ?>
                </td>
                <td style="text-align: center;">
                  <a href="edit.php?id=<?php echo $d['id']; ?>" style="color: #f59e0b; font-weight: 600; text-decoration: none; margin-right: 10px;">Edit</a>
                  <a href="hapus.php?id=<?php echo $d['id']; ?>" style="color: #ef4444; font-weight: 600; text-decoration: none;" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
              </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>

      <!-- Fitur pagination/next -->
      <div class="pagination">
        <?php if($halaman > 1): ?>
          <a href="?halaman=<?php echo $halaman - 1; ?>">« Prev</a>
          <?php endif; ?>
            <?php for($x=1; $x<=$total_halaman; $x++): ?>
              <a href="?halaman=<?php echo $x; ?>" class="<?php echo ($halaman == $x) ? 'active' : ''; ?>">
                <?php echo $x; ?>
              </a>
              <?php endfor; ?>
                <?php if($halaman < $total_halaman): ?>
                  <a href="?halaman=<?php echo $halaman + 1; ?>">Next »</a>
                  <?php endif; ?>
      </div>

      <div style="margin-top: 25px; text-align: center;">
        <a href="dashboard.php" style="text-decoration: none; color: #4f46e5; font-weight: 600; font-size: 0.9rem;">← Kembali ke Dashboard</a>
      </div>
    </div>
  </body>

  </html>