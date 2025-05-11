<?php
include('includes/db.php');
include('includes/header.php'); 
include('includes/navbar_admin.php');

if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID jadwal tidak ditemukan.</div>";
    exit;
}

$id_jadwal = $_GET['id'];


// Ambil data jadwal dari DB
$stmt = $conn->prepare("SELECT * FROM tabel_jadwal WHERE id_user = ?");
$stmt->bind_param("i", $id_jadwal);
$stmt->execute();
$result = $stmt->get_result();
$jadwal = $result->fetch_assoc();

if (!$jadwal) {
    echo "<div class='alert alert-danger'>Data jadwal tidak ditemukan.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Jadwal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Jadwal</h2>
    <form action="proses_edit_jadwal.php" method="post">
        <input type="hidden" name="id_user" value="<?= $jadwal['id_user'] ?>">

        <div class="mb-3">
            <label for="awal" class="form-label">Kota Awal</label>
            <input type="text" name="awal" class="form-control" value="<?= htmlspecialchars($jadwal['awal']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="tujuan" class="form-label">Kota Tujuan</label>
            <input type="text" name="tujuan" class="form-control" value="<?= htmlspecialchars($jadwal['tujuan']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $jadwal['tanggal'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_kursi" class="form-label">No. Kursi</label>
            <input type="number" name="kursi" class="form-control" value="<?= $jadwal['kursi'] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="dashboard_admin.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>