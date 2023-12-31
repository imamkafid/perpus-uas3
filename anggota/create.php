<?php
   include '../config/koneksi.php';
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $anggota_id = $_POST['anggota_id'];
       $nama = $_POST['nama'];
       $alamat = $_POST['alamat'];
       $email = $_POST['email'];
       $telepon = $_POST['telepon'];
       $sql = "INSERT INTO anggota (anggota_id, nama, alamat, email, telepon) VALUES ('$anggota_id', '$nama', '$alamat', '$email', '$telepon')";
   
       if ($mysqli->query($sql) === TRUE) {
           header("Location: ../anggota");
           exit;
       } else {
           echo "Error: " . $sql . "<br>" . $mysqli->error;
       }
       $mysqli->close();
   }
 require '../head.php';
?>

<main>
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA ANGGOTA</h6>
    </div>
            <div class="p-5">
            <form method="POST">
            <div class="form-group">
                <input type="text" name="anggota_id" class="form-control form-control-user" placeholder="ID Anggota">
            </div>
            <div class="form-group">
                <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama">
            </div>
            <div class="form-group">
                <input type="text" name="alamat" class="form-control form-control-user" placeholder="Alamat">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control form-control-user" placeholder="Email ">
            </div>
            <div class="form-group">
                <input type="number" name="telepon" class="form-control form-control-user" placeholder="Telepon ">
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