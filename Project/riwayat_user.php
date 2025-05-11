<?php
session_start();
include('includes/header.php');
include('includes/navbar_user.php');
include('includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Pemesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Riwayat Pemesanan Tiket Anda</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Kota Awal</th>
              <th>Kota Tujuan</th>
              <th>Tanggal Keberangkatan</th>
              <th>No. Kursi</th>
            </tr>
          </thead>
          <?php 
        $query = "SELECT * FROM tabel_jadwal ORDER BY id_user ASC";
        $result = mysqli_query($conn, $query);
        
        if(!$result) {
            die("Belum ada pemesanan tiket" . mysqli_error($conn));
        }
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id_user']}</td>";
            echo "<td>{$row['awal']}</td>";
            echo "<td>{$row['tujuan']}</td>";
            echo "<td>{$row['tanggal']}</td>";
            echo "<td>{$row['kursi']}</td>";
        } ?>
        </tablel>
    </div>
  </div>
</div>
</body>
</html>
