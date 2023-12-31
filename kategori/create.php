<?php
   include '../config/koneksi.php';
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kategori_id = $_POST['kategori_id'];
       $nama_kategori = $_POST['nama_kategori'];
       $sql = "INSERT INTO kategori (kategori_id, nama_kategori) VALUES ('$kategori_id', '$nama_kategori')";
   
       if ($mysqli->query($sql) === TRUE) {
           header("Location: ../kategori");
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
        <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA KATEGORI</h6>
    </div>
            <div class="p-5">
            <form method="POST">
            <div class="form-group">
                <input type="text" name="kategori_id" class="form-control form-control-user" placeholder="Kode">
            </div>
            <div class="form-group">
                <input type="text" name="nama_kategori" class="form-control form-control-user" placeholder="Nama Kategori">
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