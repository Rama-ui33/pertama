<?php
include('includes/db.php');
include('includes/header.php'); 
include('includes/navbar_admin.php');

$query = "
  SELECT 
    u.id_user, 
    u.nama, 
    u.ttl, 
    u.gender,
    j.awal, 
    j.tujuan, 
    j.tanggal, 
    j.kursi
  FROM tabel_user u
  JOIN tabel_jadwal j ON u.id_user = j.id_user
  ORDER BY j.tanggal DESC
";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Riwayat Pemesanan (Admin)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-dark text-white">
      <h4>Riwayat Pemesanan Tiket (Admin View)</h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead class="table-secondary">
          <tr>
            <th>ID User</th>
            <th>Nama</th>
            <th>TTL</th>
            <th>Gender</th>
            <th>Kota Awal</th>
            <th>Kota Tujuan</th>
            <th>Tanggal</th>
            <th>No. Kursi</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['id_user']) ?></td>
              <td><?= htmlspecialchars($row['nama']) ?></td>
              <td><?= htmlspecialchars($row['ttl']) ?></td>
              <td><?= htmlspecialchars($row['gender']) ?></td>
              <td><?= htmlspecialchars($row['awal']) ?></td>
              <td><?= htmlspecialchars($row['tujuan']) ?></td>
              <td><?= htmlspecialchars($row['tanggal']) ?></td>
              <td><?= htmlspecialchars($row['kursi']) ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
</body>
</html>