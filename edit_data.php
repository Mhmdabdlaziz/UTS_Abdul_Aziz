<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM sparepart_motor WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>Data tidak ditemukan</p>";
        echo "<a href='index.php'>Kembali ke halaman utama</a>";
        exit();
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_sparepart = $_POST['nama_sparepart'];
    $jenis_sparepart = $_POST['jenis_sparepart'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $stmt = $conn->prepare("UPDATE sparepart_motor SET nama_sparepart = ?, jenis_sparepart = ?, stok = ?, harga = ?, tanggal_masuk = ? WHERE id = ?");
    $stmt->bind_param("ssiiss", $nama_sparepart, $jenis_sparepart, $stok, $harga, $tanggal_masuk, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('bg/motor.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #ffffff;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7); 
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin-top: 80px;
        }
        h2 {
            color: #ffa500;
        }
        label {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2>Edit Data Barang</h2>
        <form action="edit_data.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
            
            <div class="mb-3 text-start">
                <label for="nama_sparepart" class="form-label">Nama Sparepart</label>
                <input type="text" id="nama_sparepart" name="nama_sparepart" class="form-control" value="<?php echo htmlspecialchars($row['nama_sparepart']); ?>" required>
            </div>
           
            <div class="mb-3 text-start">
                <label for="jenis_sparepart" class="form-label">Jenis Sparepart</label>
                <input type="text" id="jenis_sparepart" name="jenis_sparepart" class="form-control" value="<?php echo htmlspecialchars($row['jenis_sparepart']); ?>" required>
            </div>
            
            <div class="mb-3 text-start">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" id="harga" name="harga" class="form-control" value="<?php echo htmlspecialchars($row['harga']); ?>" required>
            </div>

            <div class="mb-3 text-start">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" id="stok" name="stok" class="form-control" value="<?php echo htmlspecialchars($row['stok']); ?>" required>
            </div>

            <div class="mb-3 text-start">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" value="<?php echo htmlspecialchars($row['tanggal_masuk']); ?>" required>
            </div>
            
            <button type="submit" class="btn btn-warning w-100 mt-3">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary w-100 mt-2">Batal</a>
        </form>
    </div>
</body>
</html>
