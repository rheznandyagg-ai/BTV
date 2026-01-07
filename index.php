<?php
// ================== KONEKSI DATABASE ==================
$conn = mysqli_connect("localhost","root","","btv");
if (!$conn) {
    die("Koneksi database gagal");
}

// ================== PROSES PENDAFTARAN ==================
if (isset($_POST['daftar'])) {
    $nama   = $_POST['nama'];
    $nim    = $_POST['nim'];
    $prodi  = $_POST['prodi'];
    $email  = $_POST['email'];
    $divisi = $_POST['divisi'];
    $alasan = $_POST['alasan'];

    mysqli_query($conn,"INSERT INTO pendaftaran VALUES(
        NULL,
        '$nama',
        '$nim',
        '$prodi',
        '$email',
        '$divisi',
        '$alasan'
    )");

    echo "<script>alert('Pendaftaran berhasil!');</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>BINA DARMA TV</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../assets/logo.png" width="60"> BINA DARMA TV
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="#profilModal">Profil</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="#beritaModal">Berita</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="#videoModal">Video</a></li>
                <li class="nav-item">
                    <button class="btn btn-warning btn-sm ms-2"
                        data-bs-toggle="modal"
                        data-bs-target="#daftarModal">
                        Daftar BTV
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- SLIDER -->
<div id="sliderBTV" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../assets/slide1.jpg" class="d-block w-100">
            <div class="carousel-caption">
                <h2>BINA DARMA TV</h2>
                <p>Media Kreatif Mahasiswa</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../assets/slide2.jpg" class="d-block w-100">
            <div class="carousel-caption">
                <h2>Informasi Kampus</h2>
                <p>Berita & Dokumentasi</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../assets/slide3.jpg" class="d-block w-100">
            <div class="carousel-caption">
                <h2>Video Kreatif</h2>
                <p>Karya Mahasiswa</p>
            </div>
        </div>
    </div>
</div>

<!-- CONTENT -->
<div class="container my-5">
    <div class="row text-center">

        <div class="col-md-4" data-aos="fade-up">
            <div class="card p-4 shadow">
                <h4>Berita</h4>
                <p>Informasi kegiatan mahasiswa dan kampus.</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#beritaModal">Lihat Berita</button>
            </div>
        </div>

        <div class="col-md-4" data-aos="fade-up">
            <div class="card p-4 shadow">
                <h4>Video</h4>
                <p>Dokumentasi dan karya visual.</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal">Lihat Video</button>
            </div>
        </div>

        <div class="col-md-4" data-aos="fade-up">
            <div class="card p-4 shadow">
                <h4>Kolaborasi</h4>
                <p>Wadah kreativitas mahasiswa.</p>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#daftarModal">
                    Daftar Sekarang
                </button>
            </div>
        </div>

    </div>
</div>

<!-- ================== MODAL PENDAFTARAN ================== -->
<div class="modal fade" id="daftarModal">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <h4 class="text-center mb-3">Pendaftaran BINA DARMA TV</h4>

        <form method="POST">
          <input class="form-control mb-2" name="nama" placeholder="Nama Lengkap" required>
          <input class="form-control mb-2" name="nim" placeholder="NIM" required>
          <input class="form-control mb-2" name="prodi" placeholder="Program Studi" required>
          <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>

          <select class="form-control mb-2" name="divisi" required>
            <option value="">Pilih Divisi</option>
            <option>Reporter</option>
            <option>Kameramen</option>
            <option>Editor</option>
            <option>Presenter</option>
          </select>

          <textarea class="form-control mb-3" name="alasan" placeholder="Alasan bergabung" required></textarea>

          <button class="btn btn-primary w-100" name="daftar">Daftar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- MODAL VIDEO -->
<div class="modal fade" id="videoModal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="ratio ratio-16x9">
          <video controls>
            <source src="../assets/videoplayback.mp4" type="video/mp4">
          </video>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PROFIL -->
<div class="modal fade" id="profilModal">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <img src="../assets/profilteam.jpeg" class="img-fluid rounded w-50">
        <h5 class="mt-3">Tim Bina Darma TV</h5>
        <p>Kreativitas dan kolaborasi mahasiswa.</p>
      </div>
    </div>
  </div>
</div>

<!-- SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ once:true, duration:1000 });</script>

</body>
</html>
