<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM sparepart_motor WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>