<?php
include 'includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM tabel_jadwal WHERE id_user = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: hapus_jadwal.php?msg=berhasil");
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID jadwal tidak ditemukan.";
}
?>