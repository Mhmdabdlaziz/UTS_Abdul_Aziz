<?php
include 'koneksi.php';

$action = $_GET['action'];

if ($action == 'create') {
    $id = $_POST['id'];
    $nama_sparepart = $_POST['nama_sparepart'];
    $jenis_sparepart = $_POST['jenis_sparepart'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $query = "INSERT INTO sparepart_motor (id, nama_sparepart, jenis_sparepart, harga, stok, tanggal_masuk) VALUES ('$id, '$nama_sparepart', '$jenis_sparepart', '$harga', '$stok', '$tanggal_masuk')";
    $conn->query($query);

    header("Location: index.php");
} elseif ($action == 'delete') {
    $id = $_GET['id'];
    $query = "DELETE FROM sparepart_motor WHERE id = $id";
    $conn->query($query);

    header("Location: index.php");
}
?>