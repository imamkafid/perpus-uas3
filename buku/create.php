<?php
include '../config/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $buku_id = $_POST['buku_id'];
 $judul = $_POST['judul'];
 $pengarang = $_POST['pengarang'];
 $penerbit = $_POST['penerbit'];
 $tahun_terbit = $_POST['tahun_terbit'];
 $sinopsis = $_POST['sinopsis'];
 $kategori_id = $_POST['kategori_id'];
 $sql = "INSERT INTO buku (buku_id, judul, pengarang, penerbit, tahun_terbit, sinopsis, kategori_id) 
        VALUES ('$buku_id', '$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$sinopsis', '$kategori_id')";

 if ($mysqli->query($sql) === TRUE) {
 header("Location: ../buku"); // Redirect ke tampilan Read setelah berhasil tambah data
 exit;
 } else {
 echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 $mysqli->close();
}
require '../head.php';
?>
<?php 
$sql = "SELECT * FROM kategori";
$result = $mysqli->query($sql);
?>

<main>
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA BUKU</h6>
    </div>
            <div class="p-5">
            <form method="POST">
            <div class="form-group">
                <input type="text" name="buku_id" class="form-control form-control-user" placeholder="ID Buku">
            </div>
            <div class="form-group">
                <input type="text" name="judul" class="form-control form-control-user" placeholder="Judul">
            </div>
            <div class="form-group">
                <input type="text" name="pengarang" class="form-control form-control-user" placeholder="Pengarang">
            </div>
            <div class="form-group">
                <input type="text" name="penerbit" class="form-control form-control-user" placeholder="Penerbit">
            </div>
            <div class="form-group">
                <input type="number" name="tahun_terbit" class="form-control form-control-user" placeholder="Tahun Terbit ">
            </div>
            <div class="form-group">
                <textarea type="text" name="sinopsis" class="form-control form-control-user" placeholder="Sinopsis"></textarea>
            </div>
            <?php 
            if ($result->num_rows > 0) { ?>
            <div class="form-group">
            <select name="kategori_id" class="form-control" placeholder="Kategori">
            <option disabled selected value="">Kategori</option>
       
              <?php while($row = $result->fetch_array()) {; ?>
            <option value="<?php echo $row['kategori_id']; ?>"><?php echo $row['nama_kategori']; ?></option>
            <?php }?>
            </select>
            <?php }?>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" style="background-color:green" placeholder="submit ">
            </div>
            </form>
            </div>
</div>
</div>
</main>
<?php
    require '../foot.php';
?>