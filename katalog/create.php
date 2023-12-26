<?php
include '../config/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $buku_id = $_POST['buku_id'];
 $kategori_id = $_POST['kategori_id'];
 $jumlah = $_POST['jumlah'];
 $sql = "INSERT INTO katalog (buku_id, kategori_id) VALUES ('$buku_id', '$kategori_id')";
for ($i=0; $i < $jumlah; ) { 
    $mysqli->query($sql);
    $i++;
 }
 header("Location: ../katalog");
 $mysqli->close();
}

?>
<form action="create.php" method="POST">
 Buku: <?php 
 $sql = "SELECT buku.*, kategori.* FROM buku LEFT JOIN kategori ON buku.kategori_id=kategori.kategori_id";
 $result = $mysqli->query($sql);
 if ($result->num_rows > 0) {
 echo "<select name='buku_id'>";
 while ($row = $result->fetch_assoc()) {
 echo "<option value='".$row["buku_id"]."'>".$row["judul"]." - ".$row["buku_id"]."</option>";
 }
 echo " </select>";
} else {
 echo "Tidak ada data buku.";
} ?><br>
<?php 
$sql = "SELECT * FROM kategori";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) { ?>
 Kategori: <select name="kategori_id">
       
              <?php while($row = $result->fetch_array()) {; ?>
              <option value="<?php echo $row['kategori_id']; ?>"><?php echo $row['nama_kategori']; ?></option>
       <?php }?>
 </select>
 <?php }?><br>
 Jumlah: <input type="number" name="jumlah"><br>
 <input type="submit" value="Tambah">
</form>