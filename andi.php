<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contoh_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Start the session to access session data
session_start();

// Check if the username is set in the session data
if(isset($_SESSION['username'])){
    // Get the username from the session
    $username = $_SESSION['username'];

    // Query untuk mendapatkan data pengguna dari database
    $sql = "SELECT username FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ambil data pengguna
        $row = $result->fetch_assoc();
        $nama_lengkap = $row["username"];
    } else {
        $nama_lengkap = "username";
    }
} else {
    // Redirect the user to the login page if the username is not set in the session data
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public/assets/css/login.css">
    <title>Beranda</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 m-0 p-0">
                <div class="sidebar">
                    <div class="container">
                        <div class="logo d-flex justify-content-center align-items-center">
                            <img src="public/img/logoluwu.png" alt="logoluwu" class="mt-5">
                        </div>
                        <div class="pemerintah mt-3">
                            <h1 class="text-center">Pemerintah Desa Balantang, <br>
                                Kec. Malili Kab. Luwu Timur</h1>
                        </div>
                        <div class="kategori">
                            <h1 class="pl-4">Category</h1>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="layanan d-flex justify-content-center align-items-center">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="pelayanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="pelayananUmum()">
                                <img src="public/img/pelayanan.png" id="layanan" alt="layanan" class="mr-2"> Pelayanan Umum
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="pelayanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="public/img/transaksi.png" id="transaksi" alt="transaksi" class="mr-2"> Transaksi
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="pelayanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="public/img/bantuan.png" id="bantuan" alt="bantuan" class="mr-2"> Bantuan
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="pelayanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="cekTagihanPBB()">
                                <img src="public/img/bantuan.png" id="bantuan" alt="bantuan" class="mr-2"> Cek Tagihan PBB
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="pelayanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="cekPangan()">
                                <img src="public/img/bantuan.png" id="bantuan" alt="bantuan" class="mr-2"> Cek Harga Pangan
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="pelayanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="webgis()">
                                <img src="public/img/bantuan.png" id="bantuan" alt="bantuan" class="mr-2"> Webgis Digital Desa
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="pelayanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="perizinan()">
                                <img src="public/img/bantuan.png" id="bantuan" alt="bantuan" class="mr-2"> Perizinan Terpadu
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="pelayanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="pdam()">
                                <img src="public/img/bantuan.png" id="bantuan" alt="bantuan" class="mr-2"> Cek Tagihan PDAM
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="pelayanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="andi()">
                                <img src="public/img/bantuan.png" id="bantuan" alt="bantuan" class="mr-2"> Pelayanan Digital Desa
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 m-0 p-0">
                <div class="content">
                    <div class="nama m-0 p-0">
                        <h1 class="selamat pl-4">Selamat Datang, <span id="username"><?php echo $nama_lengkap; ?></span>!</h1>
                    </div>
                    <iframe class="full-screen-preview_frame" src="https://online.digitaldesa.id/99.99.99.9999/pelayanan/login" name="preview-frame" frameborder="0" noresize="noresize" data-view="fullScreenPreview" allow="geolocation 'self'; autoplay 'self'">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    // Fungsi untuk menangani klik tombol "Cek Tagihan PBB"
    function pelayananUmum() {
        // Redirect ke halaman cek tagihan PBB
        window.location.href = "beranda.php"; // Ganti dengan URL halaman yang sesuai
    }

        // Fungsi untuk menangani klik tombol "Cek Tagihan PBB"
        function cekTagihanPBB() {
        // Redirect ke halaman cek tagihan PBB
        window.location.href = "pbb.php"; // Ganti dengan URL halaman yang sesuai
    }

     // Fungsi untuk menangani klik tombol "Cek Tagihan PBB"
     function cekPangan() {
        // Redirect ke halaman cek tagihan PBB
        window.location.href = "pangan.php"; // Ganti dengan URL halaman yang sesuai
    }

    // Fungsi untuk menangani klik tombol "Cek Tagihan PBB"
    function webgis() {
        // Redirect ke halaman cek tagihan PBB
        window.location.href = "webgis.php"; // Ganti dengan URL halaman yang sesuai
    }

    // Fungsi untuk menangani klik tombol "Cek Tagihan PBB"
    function perizinan() {
        // Redirect ke halaman cek tagihan PBB
        window.location.href = "perizinan.php"; // Ganti dengan URL halaman yang sesuai
    }

        // Fungsi untuk menangani klik tombol "Cek Tagihan PBB"
        function pdam() {
        // Redirect ke halaman cek tagihan PBB
        window.location.href = "pdam.php"; // Ganti dengan URL halaman yang sesuai
    }
</script>
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
    <script>
    // Create a new SpeechSynthesisUtterance object
    let speech = new SpeechSynthesisUtterance();

    // Set the text to be spoken
    speech.text = "Selamat datang, <?php echo $nama_lengkap; ?>! Di pelayanan digital desa";

    // Menetapkan bahasa untuk sintesis suara (bahasa Indonesia)
    speech.lang = "id-ID";

    // Speak the text when the page loads
    window.speechSynthesis.speak(speech);

    // Event listener untuk mendeteksi perpindahan halaman
    window.addEventListener('beforeunload', function() {
    // Menghentikan sintesis suara saat perpindahan halaman
    window.speechSynthesis.cancel();
});
</script>
</body>
</html>