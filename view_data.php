<?php
include('koneksi.php');
$sql = "SELECT * FROM sparepart_motor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>id</th><th>nama_sparepart</th><th>jenis_sparepart</th><th>harga</th><th>stok</th><th>tanggal_masuk</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama_sparepart"] . "</td>";
        echo "<td>" . $row["jenis_sparepart"] . "</td>";
        echo "<td>". $row["harga"] ."</td>" ;
        echo "<td>". $row["stok"] ."</td>";
        echo "<td>". $row["tanggal_masuk"] ."</td>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan";
}

$conn->close();
?>
