<?php
include 'includes/db.php';
include('includes/header.php'); 
include('includes/navbar_admin.php'); 

// Ambil data semua jadwal
$result = $conn->query("SELECT * FROM tabel_jadwal");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Daftar Jadwal</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-secondary">
            <tr>
                <th>Kota Awal</th>
                <th>Kota Tujuan</th>
                <th>Tanggal</th>
                <th>No. Kursi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['awal']); ?></td>
                    <td><?= htmlspecialchars($row['tujuan']); ?></td>
                    <td><?= htmlspecialchars($row['tanggal']); ?></td>
                    <td><?= htmlspecialchars($row['kursi']); ?></td>
                    <td>
                        <center><a href="proses_hapus_jadwal.php?id=<?= $row['id_user']; ?>" 
                           onclick="return confirm('Yakin ingin menghapus jadwal ini?')" 
                           class="btn btn-danger btn-sm">Hapus</a></center>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php include('includes/footer.php'); ?>