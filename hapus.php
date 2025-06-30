<?php
include 'koneksi.php';
$id = $_GET['id'];

$sql = "DELETE FROM produk WHERE id_produk=$id";

if ($conn->query($sql) === TRUE) {
  header("Location: index.php?pesan=sukses");
  exit();
} else {
  echo "Gagal menghapus data: " . $conn->error;
}

$conn->close();
?>
