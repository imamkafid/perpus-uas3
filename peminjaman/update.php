<?php
include '../config/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $buku_id = $_POST['buku_id'];
 $anggota_id = $_POST['anggota_id'];
 $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
 $tanggal_kembali = $_POST['tanggal_kembali'];
 $sql = "UPDATE peminjaman SET buku_id='$buku_id', anggota_id='$anggota_id', tanggal_peminjaman='$tanggal_peminjaman', tanggal_kembali='$tanggal_kembali', status='dipinjam' WHERE peminjaman_id='$peminjaman_id'";

 if ($mysqli->query($sql) === TRUE) {
 header("Location: ../peminjaman"); // Redirect ke tampilan Read setelah berhasil edit data
 exit;
 } else {
 echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 $mysqli->close();
}
include '../head.php';
 ?>

<main>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT DATA PEMINJAMAN BUKU</h6>
        </div>
        <div class="p-5">
            <form method="POST">
            <?php 
            $sql3 = "SELECT * FROM buku";
            $result = $mysqli->query($sql3); ?>
            <div class="form-group">
                <label >Judul:</label>
                <select name="buku_id" class="form-control">
            
                <?php 
                if ($result->num_rows > 0) {
                while($row = $result->fetch_array()) {?>
                <option value="<?php echo $row['buku_id']; ?>"><?php echo $row['judul']; ?></option>
                <?php }}?>
            </select>
            </div>

            
            <?php 
            $sql4 = "SELECT * FROM anggota";
            $result = $mysqli->query($sql4); ?>
            <div class="form-group">
                  <label >Nama Peminjam:</label>
                <select name="anggota_id" class="form-control">
            
              <?php
              if ($result->num_rows > 0) {
              while($row = $result->fetch_array()) { ?>
              <option value="<?php echo $row['anggota_id']; ?>"><?php echo $row['nama']; ?></option>
            <?php }}?>
            </select>
            </div>
            <div class="form-group">
                  <label >Tanggal Peminjaman:</label>
                <input type="date" name="tanggal_peminjaman" class="form-control form-control-user" value="<?php echo $row['tanggal_peminjaman']; ?>"  placeholder="Tanggal Peminjaman">
            </div>
            <div class="form-group">
                  <label >Tanggal Kembali:</label>
                <input type="date" name="tanggal_kembali" class="form-control form-control-user" value="<?php echo $row['tanggal_pekembali']; ?>"  placeholder="Tanggal Kembali">
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
   include '../foot.php';
?>