-- Membuat database
CREATE DATABASE IF NOT EXISTS db_toko;
USE db_toko;

-- Membuat tabel produk
CREATE TABLE IF NOT EXISTS produk (
  id_produk INT AUTO_INCREMENT PRIMARY KEY,
  nama_produk VARCHAR(100) NOT NULL,
  harga INT NOT NULL,
  stok INT NOT NULL
);
