<?php
include '../config/koneksi.php';
$status = 'dipinjam';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $buku_id = $_POST['buku_id'];
 $anggota_id = $_POST['anggota_id'];
 $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
 $tanggal_kembali = $_POST['tanggal_kembali'];
 $sql = "INSERT INTO peminjaman (buku_id, anggota_id, tanggal_peminjaman, tanggal_kembali, status) VALUES ('$buku_id',
'$anggota_id', '$tanggal_peminjaman', '$tanggal_kembali', '$status')";

 if ($mysqli->query($sql) === TRUE) {
 header("Location: ../peminjaman"); // Redirect ke tampilan Read setelah berhasil tambah data
 exit;
 } else {
 echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 $mysqli->close();
}

 require '../head.php';
?>
<?php 
$sql = "SELECT * FROM buku";
$result = $mysqli->query($sql);
?>
<?php 
$sql = "SELECT * FROM anggota";
$result1 = $mysqli->query($sql);
?>


<main>
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA PEMINJAMAN</h6>
    </div>
            <div class="p-5">
            <form action="create.php" method="POST">
            <?php 
            if ($result->num_rows > 0) { ?>
            <div class="form-group">
            <select name="buku_id" class="form-control" placeholder="Buku">
            <option disabled selected value="">Judul Buku</option>
       
              <?php while($row = $result->fetch_array()) {; ?>
            <option value="<?php echo $row['buku_id']; ?>"><?php echo $row['judul']; ?></option>
            <?php }?>
            </select>
            <?php }?>
            </div>

            <?php 
            if ($result->num_rows > 0) { ?>
            <div class="form-group">
            <select name="anggota_id" class="form-control" placeholder="Anggota">
            <option disabled selected value="">Nama Peminjam</option>
       
              <?php while($row = $result1->fetch_array()) {; ?>
            <option value="<?php echo $row['anggota_id']; ?>"><?php echo $row['nama']; ?></option>
            <?php }?>
            </select>
            <?php }?>
            </div>

            <div class="form-group">
                <input type="date" name="tanggal_peminjaman" class="form-control form-control-user" placeholder="Tanggal Peminjaman">
            </div>
            <div class="form-group">
                <input type="date" name="tanggal_kembali" class="form-control form-control-user" placeholder="Tanggal Kembali ">
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