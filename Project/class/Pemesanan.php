<?php
class Pemesanan {
  private $conn;
  private $table_name = "tabel_pemesanan";

  public function __construct($db) {
    $this->conn = $db;
  }

  public function tambahPemesanan($data) {
    $query = "INSERT INTO " . $this->table_name . " (awal, tujuan, tanggal, kursi, id_user, nama, ttl, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    return $stmt->execute($data);
  }

  public function getRiwayatUser($id_user) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id_user = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$id_user]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
    public function getRiwayatAdmin() {
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>
