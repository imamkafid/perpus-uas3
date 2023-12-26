<?php
include '../config/koneksi.php';
$sql = "SELECT katalog.katalog_id, katalog.buku_id, buku.buku_id, buku.judul, buku.pengarang, buku.penerbit, buku.tahun_terbit, kategori.nama_kategori FROM katalog INNER JOIN buku ON katalog.buku_id=buku.buku_id INNER JOIN kategori ON katalog.kategori_id=kategori.kategori_id";
$result = $mysqli->query($sql);
echo "<a href='create.php'><button>TAMBAH</button></a>";
if ($result->num_rows > 0) {
 echo "<table border='1'>";
 echo "<tr><th>ID Buku</th><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Tahun Terbit</th><th>Nama Kategori</th></tr>";
 while ($row = $result->fetch_assoc()) {
 echo "<tr>";
 echo "<td>".$row["buku_id"]."</td>";
 echo "<td>".$row["judul"]."</td>";
 echo "<td>".$row["pengarang"]."</td>";
 echo "<td>".$row["penerbit"]."</td>";
 echo "<td>".$row["tahun_terbit"]."</td>";
 echo "<td>".$row["nama_kategori"]."</td>";
 echo "<td><td><a href='detail.php?id=".$row["katalog_id"]."'>Detail</a> | <a href='update.php?id=".$row["katalog_id"]."'>Edit</a> | <a
href='delete.php?id=".$row["katalog_id"]."'>Hapus</a></td>";
 echo "</tr>";
 }
 echo "</table>";
} else {
 echo "Tidak ada data katalog.";
}
$mysqli->close();
?>