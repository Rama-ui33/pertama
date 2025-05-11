<?php
session_start();
include('includes/header.php');
include('includes/navbar_user.php');
if(!isset($_SESSION['user']))
?>
<!-- Form Pemesanan Tiket -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Pemesanan Tiket Bus</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4>Pemesanan Tiket Bus + Data Diri</h4>
    </div>
    <div class="card-body">
      <form action="simpan_pemesanan.php" method="POST">
        <h5>Data Perjalanan</h5>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Kota Awal</label>
            <input type="text" name="awal" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Kota Tujuan</label>
            <input type="text" name="tujuan" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Tanggal Berangkat</label>
            <input type="date" name="tanggal" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>No. Kursi</label>
            <input type="number" name="kursi" class="form-control" required>
          </div>
        </div>

        <hr>
        <h5>Data Diri</h5>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="ttl" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Gender</label>
            <select name="gender" class="form-select" required>
              <option value="">Pilih</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-success">Pesan Tiket</button>
      </form>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
</body>
</html>