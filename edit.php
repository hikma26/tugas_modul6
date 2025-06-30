<?php
include 'koneksi.php';

$id = intval($_GET['id']);
$sql = "SELECT * FROM produk WHERE id_produk=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Produk</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #0f172a;
      color: #f8fafc;
      padding: 40px 15px;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-container {
      background-color: #1e293b;
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
      max-width: 480px;
      width: 100%;
    }

    h2 {
      color: #facc15;
      font-weight: 700;
      text-align: center;
      margin-bottom: 30px;
      letter-spacing: 1px;
    }

    label {
      font-weight: 600;
      color: #e2e8f0;
    }

    .form-control {
      background-color: #f8fafc;
      color: #1e293b;
      border-radius: 8px;
      border: 1px solid #475569;
      padding: 12px 15px;
      font-size: 14px;
      transition: border-color 0.25s ease;
    }
    .form-control:focus {
      border-color: #facc15;
      box-shadow: 0 0 6px #facc15aa;
      outline: none;
    }

    .btn-update {
      background-color: #facc15;
      color: #1e293b;
      font-weight: 700;
      padding: 12px 28px;
      border-radius: 12px;
      border: none;
      transition: background-color 0.3s ease, transform 0.2s ease;
      cursor: pointer;
      box-shadow: 0 4px 6px rgba(250, 204, 21, 0.3);
    }
    .btn-update:hover {
      background-color: #eab308;
      transform: scale(1.05);
      box-shadow: 0 6px 10px rgba(250, 204, 21, 0.5);
    }

    .btn-back {
      background-color: #64748b;
      color: white;
      font-weight: 600;
      padding: 12px 28px;
      border-radius: 12px;
      text-align: center;
      text-decoration: none;
      box-shadow: 0 3px 10px rgba(0,0,0,0.25);
      transition: background-color 0.3s ease, transform 0.2s ease;
      display: inline-block;
      margin-left: 12px;
    }
    .btn-back:hover {
      background-color: #475569;
      transform: scale(1.05);
      color: white;
    }

    .btn-group {
      margin-top: 30px;
      display: flex;
      justify-content: center;
      gap: 12px;
      flex-wrap: wrap;
    }
  </style>
</head>
<body>

  <div class="form-container shadow">
    <h2>Edit Produk</h2>
    <form action="proses_edit.php" method="post">
      <input type="hidden" name="id_produk" value="<?php echo htmlspecialchars($row['id_produk']); ?>" />

      <div class="mb-3">
        <label for="nama_produk" class="form-label">Nama Produk:</label>
        <input
          type="text"
          id="nama_produk"
          name="nama_produk"
          class="form-control"
          value="<?php echo htmlspecialchars($row['nama_produk']); ?>"
          required
        />
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga:</label>
        <input
          type="number"
          id="harga"
          name="harga"
          class="form-control"
          value="<?php echo htmlspecialchars($row['harga']); ?>"
          required
        />
      </div>

      <div class="mb-3">
        <label for="stok" class="form-label">Stok:</label>
        <input
          type="number"
          id="stok"
          name="stok"
          class="form-control"
          value="<?php echo htmlspecialchars($row['stok']); ?>"
          required
        />
      </div>

      <div class="btn-group">
        <input type="submit" class="btn-update" value="Update" />
        <a href="index.php" class="btn-back">Kembali</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
