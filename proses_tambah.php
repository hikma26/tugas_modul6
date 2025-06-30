<?php
include 'koneksi.php';

$nama = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$sql = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', $harga, $stok)";

if ($conn->query($sql) === TRUE) {
  header("Location: index.php?pesan=sukses");
  exit();
} else {
  echo "Gagal menambahkan data: " . $conn->error;
}

$conn->close();
?>
