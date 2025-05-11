<?php
session_start();
include('includes/db.php');

// Ambil data dari form
$nama = $_POST['nama'];
$ttl = $_POST['ttl'];
$gender = $_POST['gender'];

$awal   = $_POST['awal'];
$tujuan = $_POST['tujuan'];
$tanggal = $_POST['tanggal'];
$kursi = $_POST['kursi'];

// Cek apakah user sudah ada berdasarkan nama dan TTL (atau gunakan email/ID unik di sistem asli)
$query_cek = "SELECT id_user FROM tabel_user WHERE nama = ? AND ttl = ?";
$stmt_cek = $conn->prepare($query_cek);
$stmt_cek->bind_param("ss", $nama, $ttl);
$stmt_cek->execute();
$result_cek = $stmt_cek->get_result();

if ($result_cek->num_rows > 0) {
    $row = $result_cek->fetch_assoc();
    $id_user = $row['id_user'];
} else {
    // Insert user baru
    $query_user = "INSERT INTO tabel_user (id_user, nama, ttl, gender) VALUES (?, ?, ?, ?)";
    $stmt_user = $conn->prepare($query_user);
    $stmt_user->bind_param("ssss", $id_user, $nama, $ttl, $gender);
    $stmt_user->execute();
    $id_user = $stmt_user->insert_id;
}

// Simpan id_user ke session untuk digunakan nanti
$_SESSION['id_user'] = $id_user;

// Simpan data pemesanan ke tabel_jadwal
$query_jadwal = "INSERT INTO tabel_jadwal (id_user, awal, tujuan, tanggal, kursi) VALUES (?, ?, ?, ?, ?)";
$stmt_jadwal = $conn->prepare($query_jadwal);
$stmt_jadwal->bind_param("isssi", $id_user, $awal, $tujuan, $tanggal, $kursi);

if ($stmt_jadwal->execute()) {
    header("Location: riwayat_user.php");
    exit;
} else {
    echo "Gagal menyimpan pemesanan.";
}
?>