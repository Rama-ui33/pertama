<?php
include 'includes/db.php';


// Pastikan data dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'];
    $awal = $_POST['awal'];
    $tujuan = $_POST['tujuan'];
    $tanggal = $_POST['tanggal'];
    $kursi  = $_POST['kursi'];

    // Update data ke database
    $stmt = $conn->prepare("UPDATE tabel_jadwal SET awal = ?, tujuan = ?, tanggal = ?, kursi = ? WHERE id_user = ?");
    $stmt->bind_param("sssii", $awal, $tujuan, $tanggal, $kursi, $id_user);

    if ($stmt->execute()) {
        // Redirect ke halaman riwayat admin
        header("Location: riwayat_admin.php?pesan=update_sukses");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal memperbarui data jadwal.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Permintaan tidak valid.</div>";
}
?>
<?php header("Location: riwayat_admin.php");
exit();
?>