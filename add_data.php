<?php
include 'koneksi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_sparepart = $_POST['nama_sparepart'];
    $jenis_sparepart = $_POST['jenis_sparepart'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

  
    $sql = "INSERT INTO sparepart_motor (id, nama_sparepart, jenis_sparepart, harga, stok, tanggal_masuk) VALUES ('$id', '$nama_sparepart', '$jenis_sparepart','$harga', '$stok', '$tanggal_masuk')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Sparepart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
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
            position: relative;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin-top: 50px;
        }
        .form-label, h2 {
            color: #ffb400;
        }
        .btn-succes{             
            display: inline-block;
            outline: 0;
            border: 0;
            cursor: pointer;
            font-weight: 600;
            color: #fff;
            font-size: 14px;
            height: 38px;
            padding: 8px 24px;
            border-radius: 50px;
            background-image: linear-gradient(180deg,#7c8aff,#3c4fe0);
            box-shadow: 0 4px 11px 0 rgb(37 44 97 / 15%), 0 1px 3px 0 rgb(93 100 148 / 20%);
            transition: all .2s ease-out;               
            box-shadow: 0 8px 22px 0 rgb(37 44 97 / 15%), 0 4px 6px 0 rgb(93 100 148 / 20%);
        }   
    </style>
</head>
<body>
    <div class="container my-5">
    <h2 style="text-align: center;">Tambah Data</h2>
        <form action="add_data.php" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" id="id" name="id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama_sparepart" class="form-label">Nama Sparepart</label>
                <input type="text" id="nama_sparepart" name="nama_sparepart" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis_sparepart" class="form-label">Jenis Sparepart</label>
                <input type="text" id="jenis_sparepart" name="jenis_sparepart" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" id="harga" name="harga" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" id="harga_jual" name="harga_jual" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-contorl" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>