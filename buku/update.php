<?php
include '../config/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $ID = $_POST['id'];
 $judul = $_POST['judul'];
 $pengarang = $_POST['pengarang'];
 $penerbit = $_POST['penerbit'];
 $tahun_terbit = $_POST['tahun_terbit'];
 $sinopsis = $_POST['sinopsis'];
 $kategori_id = $_POST['kategori_id'];
 $sql = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', sinopsis='$sinopsis', kategori_id='$kategori_id' WHERE buku_id='$ID'";

 if ($mysqli->query($sql) === TRUE) {
 header("Location: ../buku"); // Redirect ke tampilan Read setelah berhasil edit data
 exit;
 } else {
 echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 $mysqli->close();
}
include '../head.php';
$sql2 = "SELECT * FROM kategori";
$id = $_GET['id']; // ID dari buku yang akan diupdate
$sql = "SELECT * FROM buku WHERE buku_id=$id";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
 $row = $result->fetch_array();
 ?>

<main>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT DATA BUKU</h6>
        </div>
        <div class="p-5">
            <form action="update.php"method="POST">
            <div class="form-group">
                  <label >ID Buku:</label>
                <input type="text" class="form-control form-control-user" value="<?php echo $row['buku_id']; ?>" name="id" readonly>
            </div>
            <div class="form-group">
                  <label >Judul:</label>
                <input type="text" name="judul" class="form-control form-control-user" value="<?php echo $row['judul']; ?>"  placeholder="Judul">
            </div>
            <div class="form-group">
                  <label >Pengarang:</label>
                <input type="text" name="pengarang" class="form-control form-control-user" value="<?php echo $row['pengarang']; ?>"  placeholder="Pengarang">
            </div>
            <div class="form-group">
                  <label >Penerbit:</label>
                <input type="text" name="penerbit" class="form-control form-control-user" value="<?php echo $row['penerbit']; ?>"  placeholder="Penerbit">
            </div>
            <div class="form-group">
                  <label >Tahun Terbit:</label>
                <input type="number" name="tahun_terbit" class="form-control form-control-user" value="<?php echo $row['tahun_terbit']; ?>"  placeholder="Tahun Terbit">
            </div>
            <div class="form-group">
                  <label >Sinopsis:</label>
                <textarea type="text" name="sinopsis" class="form-control form-control-user" placeholder="Sinopsis"><?php echo $row['sinopsis']; ?></textarea>
            </div>
            <?php 
            $result = $mysqli->query($sql2);
 
            if ($result->num_rows > 0) { ?>
            <div class="form-group">
                  <label >Kategori:</label>
                <select name="kategori_id" class="form-control">
            
              <?php while($row = $result->fetch_array()) {; ?>
              <option value="<?php echo $row['kategori_id']; ?>"><?php echo $row['nama_kategori']; ?></option>
            <?php }?>
            </select>
            <?php }?>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" style="background-color:green" placeholder="submit">
            </div>
            </form>
        </div>
    </div>
</div>           
</main>
<?php
   };
   include '../foot.php';
?>