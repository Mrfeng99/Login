<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>

    <div class="main-card">

      <div class="left-section">
        <div class="content-text">
          <h1>Daftar</h1>
          <p>Silahkan isi form ini</p>
        </div>
        <img src="regis-logo.png" class="floating-image">
      </div>

      <div class="right-section">
        <div class="form-wrapper">

          <div class="brand">
            <img src="logo.jpg" class="logo">
            <span>Optrixx</span>
          </div>

          <div class="header-text">
            <h2>Sign Up</h2>
            <p>Buat akun baru kamu</p>
          </div>

          <!-- form registernya -->
          <form action="proses_register.php" method="POST">

            <div class="input-group">
              <label>Nama</label>
              <input type="text" name="nama_user" placeholder="Nama Lengkap" required>
            </div>

            <div class="input-group">
              <label>Email</label>
              <input type="email" name="email_user" placeholder="Email" required>
            </div>

            <div class="input-group">
              <label>Password</label>
              <div class="pass-box">
                <input type="password" name="pass1" id="p1" placeholder="••••••••" required>

                <!-- icon mata 1 -->
                <span class="eye-icon" onclick="tombolMata1()">
                                <svg height="20" viewbox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="#A0AEC0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><circle cx="12" cy="12" r="3" stroke="#A0AEC0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle></svg>
                            </span>
              </div>
            </div>

            <div class="input-group">
              <label>Ulangi Password</label>
              <div class="pass-box">
                <input type="password" name="pass2" id="p2" placeholder="••••••••" required>

                <!-- icon mata 2 -->
                <span class="eye-icon" onclick="tombolMata2()">
                                <svg height="20" viewbox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="#A0AEC0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><circle cx="12" cy="12" r="3" stroke="#A0AEC0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle></svg>
                            </span>
              </div>
            </div>

            <button type="submit" class="btn-login">Daftar Akun</button>

            <div class="links">
              <p>Sudah punya akun? <a href="login.php">Login</a></p>
            </div>

          </form>

        </div>
      </div>

    </div>

    <!-- lihat password -->
    <script>
      function tombolMata1() {
        var input = document.getElementById("p1");
        if (input.type === "password") {
          input.type = "text";
        } else {
          input.type = "password";
        }
      }

      function tombolMata2() {
        var input = document.getElementById("p2");
        if (input.type === "password") {
          input.type = "text";
        } else {
          input.type = "password";
        }
      }
    </script>
  </body>

</html>