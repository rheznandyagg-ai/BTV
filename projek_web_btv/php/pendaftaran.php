<?php
// KONEKSI DATABASE
$conn = mysqli_connect("localhost","root","","btv");
if (!$conn) {
    die("Koneksi gagal");
}

// PROSES SIMPAN
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

    echo "<script>alert('Pendaftaran berhasil');</script>";
}
?>

<!-- ===== MODAL PENDAFTARAN ===== -->
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

          <button class="btn btn-primary w-100" name="daftar">
            Daftar Sekarang
          </button>
        </form>

      </div>
    </div>
  </div>
</div>
