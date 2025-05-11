<?php
class Jadwal {
  private $conn;
  private $table_name = "tabel_jadwal";

  public function __construct($db) {
    $this->conn = $db;
  }

  public function getAllJadwal() {
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function editJadwal($data) {
    $query = "UPDATE " . $this->table_name . " SET kota_awal = ?, jota_tujuan = ?, tanggal = ?, jumlah_kursi = ?, waktu_pesan = ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    return $stmt->execute($data);
  }

  public function hapusJadwal($id) {
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    return $stmt->execute([$id]);
  }
}
?>
