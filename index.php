<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Produk</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #0f172a;
      color: #f8fafc;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container-custom {
      background-color: #1e293b;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 12px 30px rgba(250, 204, 21, 0.5);
      margin-top: 60px;
      margin-bottom: 60px;
    }

    h2 {
      color: #facc15;
      font-weight: 900;
      text-shadow: 1px 1px 5px #eab308;
    }

    .btn-tambah {
      background: linear-gradient(90deg, #facc15 0%, #eab308 100%);
      color: #1e293b;
      font-weight: 700;
      box-shadow: 0 5px 15px rgba(250, 204, 21, 0.7);
      transition: all 0.3s ease;
      border-radius: 10px;
      padding: 12px 24px;
    }

    .btn-tambah:hover {
      background: linear-gradient(90deg, #fde047 0%, #f59e0b 100%);
      color: #1e293b;
      transform: scale(1.1);
      box-shadow: 0 8px 25px rgba(250, 204, 21, 0.9);
    }

    table {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(250, 204, 21, 0.3);
    }

    thead th {
      background-color: #facc15 !important;
      color: #1e293b !important;
      font-weight: 900 !important;
      text-shadow: 1px 1px 2px #d97706;
      border: none !important;
    }

    tbody tr {
      background-color: #f8fafc;
      color: #1e293b;
      transition: background-color 0.3s ease, color 0.3s ease;
      cursor: default;
    }

    tbody tr:hover {
      background-color: #fde68a !important;
      color: #92400e !important;
      box-shadow: 0 0 10px #facc15;
      transform: scale(1.02);
      font-weight: 700;
      cursor: pointer;
    }

    .btn-edit, .btn-delete {
      font-weight: 700;
      padding: 6px 14px;
      border-radius: 8px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.15);
      transition: all 0.25s ease;
      text-shadow: 0 0 2px rgba(0,0,0,0.25);
    }

    .btn-edit {
      background-color: #38bdf8;
      color: white;
    }

    .btn-edit:hover {
      background-color: #0ea5e9;
      box-shadow: 0 5px 20px #38bdf8;
      color: white;
      transform: scale(1.1);
    }

    .btn-delete {
      background-color: #f87171;
      color: white;
    }

    .btn-delete:hover {
      background-color: #ef4444;
      box-shadow: 0 5px 20px #f87171;
      color: white;
      transform: scale(1.1);
    }

    .empty {
      text-align: center;
      font-style: italic;
      color: #475569;
      padding: 20px;
    }

  </style>
</head>
<body>

  <div class="container container-custom shadow-lg">
    <h2 class="text-center mb-4">Daftar Produk</h2>

    <div class="d-flex justify-content-end mb-4">
      <a href="tambah.php" class="btn btn-tambah">+ Tambah Produk</a>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered align-middle text-nowrap mb-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'koneksi.php';
            $sql = "SELECT * FROM produk";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id_produk']}</td>";
                echo "<td>{$row['nama_produk']}</td>";
                echo "<td>Rp " . number_format($row['harga'] * 1000, 0, '', '.') . "</td>";
                echo "<td>{$row['stok']}</td>";
                echo "<td>
                        <a href='edit.php?id={$row['id_produk']}' class='btn btn-edit btn-sm me-2'>Edit</a>
                        <a href='hapus.php?id={$row['id_produk']}' class='btn btn-delete btn-sm' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='5' class='empty'>Belum ada produk</td></tr>";
            }

            $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
