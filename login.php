<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Optrixx</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

  <div class="main-card">
    <div class="left-section">
      <div class="content-text">
        <h1>Latihan</h1>
        <p>Halaman Login Firman</p>
      </div>
      <img src="gambar.jpeg" alt="gambar" class="floating-image">
    </div>

    <div class="right-section">
      <div class="form-wrapper">
        <div class="brand">
          <img src="logo.jpg" alt="Logo" class="logo">
          <span>Optrixx</span>
        </div>

        <div class="header-text">
          <h2>Login</h2>
          <p>Masuk ke akun kamu</p>
          
          <?php 
          // Menampilkan pesan kesalahan jika login gagal
          if(isset($_GET['pesan'])){
              if($_GET['pesan'] == "gagal"){
                  echo "<div style='color: #ef4444; background: #fee2e2; padding: 10px; border-radius: 8px; font-size: 0.8rem; margin-bottom: 15px; border: 1px solid #fecaca;'>
                          Email atau password salah!
                        </div>";
              } else if($_GET['pesan'] == "belum_login"){
                  echo "<div style='color: #f59e0b; background: #fef3c7; padding: 10px; border-radius: 8px; font-size: 0.8rem; margin-bottom: 15px;'>
                          Silahkan login terlebih dahulu.
                        </div>";
              }
          }
          ?>
        </div>

        <form action="proses_login.php" method="POST">
          <div class="input-group">
            <label>Email</label>
            <input type="email" name="user" placeholder="email@example.com" required>
          </div>

          <div class="input-group">
            <label>Password</label>
            <div class="pass-box">
              <input type="password" name="pass" id="pass" placeholder="••••••••" required>
              <span class="eye-icon" onclick="lihatPassword()" style="cursor: pointer;">
                <!-- ikon mata hasil tanya AI -->
                <svg height="20" viewbox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="#A0AEC0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
								<circle cx="12" cy="12" r="3" stroke="#A0AEC0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle></svg>
              </span>
            </div>
          </div>

          <button type="submit" class="btn-login">Login</button>

  <!-- Link registrasi -->
          <div class="links">
            <p>No Account Yet? <a href="register.php">Get Yours Now</a></p>
          </div>
        </form>

        <div class="footer-links">
          <span>Privacy Policy</span>
          <span>Terms</span>
          <span>FAQ</span>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Fungsi untuk lihat password
    function lihatPassword() {
      var x = document.getElementById("pass");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

</body>
</html>
