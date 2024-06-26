<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST["username"];
    $nik = $_POST["nik"];

    // Establish a connection to the database
    $conn = mysqli_connect("localhost", "root", "", "contoh_database");

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL query to check user credentials
    $sql = "SELECT * FROM users WHERE username='$username' AND nik='$nik'";
    $result = mysqli_query($conn, $sql);

    // Check if a matching record is found in the database
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['username'] = $user['username'];
        // User is authenticated, redirect to beranda.html
        header("Location: beranda.php");
        exit();
    } else {
        // Invalid credentials, display an error message
        echo "<strong>Nama atau No.KTP anda salah!</strong>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="public/assets/css/login.css" />
    <title>Login</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-6 bg-login">
          <div id="bg-hijau">

          </div>
          <div class="container d-flex justify-content-center align-items-center bg-belakang">
            <div>
             <div class="d-flex justify-content-center w-100">
              <img
              src="public/img/logoluwu.png"
              id="logoluwu"
              alt="logoluwu"
              class="mb-5"
            />
             </div>
            <h1 class="text-light text-center font-weight-bold mb-3">
              LAYANAN MANDIRI DESA (LA-MANDI)
            </h1>
            <div id="garis" class="mx-auto mb-3"></div>
            <h3 class="text-light text-center font-weight-bold">
              PEMERINTAH DESA BALANTANG <br />
              KEC. MALILI KAB. LUWU TIMUR
            </h3>
            </div>
          </div>
        </div>
        <div class="col-6 d-flex align-items-center">
          <div class="container">
            <h1 class="text-center font-weight-bold mb-5">Selamat Datang</h1>
          <div class="d-flex justify-content-center">
            <form class="form-masuk" id="loginForm" method="post" action="">
              <div class="form-group">
                <input
                  type="text"
                  name="username"
                  id="username"
                  placeholder="Masukkan Nama (Sesuai KTP)" class="form-control" required
                />
              </div>
              <div class="form-group">
                <input
                  type="number"
                  name="nik"
                  id="nik"
                  placeholder="Masukkan No KTP" class="form-control" required
                />
              </div>
              <button type="submit" class="btn tombol-masuk">Masuk</button>
            </form>
          </div>
          <div class="scan text-center mt-5">
            <a type="button" class="btn tombol-scan" id="scans">
            <div class="d-flex justify-content-center align-items-center h-100 mb-5">
              <div class="d-flex justify-content-center align-items-center">
                <img
                src="public/img/scan.png"
                id="scan"
                alt="scan"
                class="mr-2"
              /><p>Scan KTP</p>
              </div>
            </div>
            <div class="digides-digital">
              <div class="d-flex justify-content-center align-items-center">
                  <img src="public/img/icon.png" id="icon" alt="icon" class="mr-2">
                  <p class="m-0">2023 Powered by <span id="pt">PT Digital Desa Indonesia</span></p>
              </div>
            </div>
            </a>
          </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script>
        var idleTime = 0;

// Fungsi untuk mengatur waktu idle dan mengarahkan kembali ke halaman awal
function resetIdleTime() {
    idleTime = 0;
}

// Event listener untuk mendeteksi aktivitas mouse
document.addEventListener("mousemove", resetIdleTime);

// Event listener untuk mendeteksi aktivitas keyboard
document.addEventListener("keypress", resetIdleTime);

// Fungsi untuk memeriksa waktu idle setiap detik
setInterval(function() {
    idleTime++;
    // Jika tidak ada aktivitas selama 1 menit (60 detik), arahkan kembali ke halaman awal
    if (idleTime >= 60) {
        window.location.href = "video.html"; // Ganti "halaman-awal.html" dengan URL halaman awal Anda
    }
}, 1000); // 1000 milidetik = 1 detik
    </script>
  </body>
</html>
