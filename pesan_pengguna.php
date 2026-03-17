<?php
session_start();
include "koneksi.php";

// Proteksi login
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
    <title>Daftar Pesan - Optrixx</title>
    <link rel="stylesheet" href="pesan.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
  </head>

  <body>

    <div class="pesan-wrapper">
      <div class="container-pesan">
        <div class="pesan-header">
          <h2>Daftar Pesan</h2>
          <p>Manajemen pesan masuk dari sistem</p>
        </div>

        <div class="table-container">
          <table class="table-pesan">
            <thead>
              <tr>
                <th>PENGIRIM</th>
                <th>ISI PESAN</th>
              </tr>
            </thead>
            <tbody>

              <!-- Inner join -->
              <?php
$query = "SELECT users.nama, pesan.isi_pesan 
          FROM pesan 
          INNER JOIN users ON pesan.id_user = users.id 
          ORDER BY pesan.id_pesan DESC";
$tampil = mysqli_query($koneksi, $query);
?>

                <?php
   
   if(mysqli_num_rows($tampil) > 0){
                            while($data = mysqli_fetch_array($tampil)){
                                echo "<tr>";
                                echo "<td><span class='user-badge'>" . htmlspecialchars($data['nama']) . "</span></td>";
                                echo "<td><div class='text-konten'>" . htmlspecialchars($data['isi_pesan']) . "</div></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2' style='text-align:center; padding:20px; color:#94a3b8;'>Belum ada pesan masuk.</td></tr>";
                        }
                        ?>
            </tbody>
          </table>
        </div>

        <div class="pesan-footer">
          <a href="dashboard.php">← Kembali ke Dashboard</a>
        </div>
      </div>
    </div>

  </body>

  </html>