<?php
   include '../config/koneksi.php';
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $ID = $_GET['id'];
       $nama = $_POST['nama'];
       $alamat = $_POST['alamat'];
       $email = $_POST['email'];
       $telepon = $_POST['telepon'];
       $sql = "UPDATE anggota SET nama='$nama', alamat='$alamat', email='$email', telepon='$telepon' WHERE anggota_id='$ID'";
   
       if ($mysqli->query($sql) === TRUE) {
           header("Location: ../anggota");
           exit;
       } else {
           echo "Error: " . $sql . "<br>" . $mysqli->error;
       }
   }
   
   include '../head.php';
   
   $id_ = $_GET['id'];
   $sql = "SELECT * FROM `anggota` WHERE anggota_id=$id_";
   $result = $mysqli->query($sql);
   if ($result->num_rows > 0) {
    $row = $result->fetch_array();
?>

<main>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT DATA ANGGOTA</h6>
        </div>
        <div class="p-5">
            <form method="POST">
            <div class="form-group">
                <input type="text" class="form-control form-control-user" value="<?php echo $row['anggota_id']; ?>"  placeholder="ID Anggota" name="id" disabled>
            </div>
            <div class="form-group">
                <input type="text" name="nama" class="form-control form-control-user" value="<?php echo $row['nama']; ?>"  placeholder="Nama">
            </div>
            <div class="form-group">
                <input type="text" name="alamat" class="form-control form-control-user" value="<?php echo $row['alamat']; ?>"  placeholder="Alamat">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control form-control-user" value="<?php echo $row['email']; ?>"  placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" name="telepon" class="form-control form-control-user" value="<?php echo $row['telepon']; ?>"  placeholder="Telepon">
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