
<?php
   include '../config/koneksi.php';
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $ID = $_GET['id'];
       $nama_kategori = $_POST['nama'];
       $sql = "UPDATE kategori SET kategori_id='$ID', nama_kategori='$nama_kategori' WHERE kategori_id='$ID'";
   
       if ($mysqli->query($sql) === TRUE) {
           header("Location: ../kategori");
           exit;
       } else {
           echo "Error: " . $sql . "<br>" . $mysqli->error;
       }
   }
   
   include '../head.php';
   
   $id_ = $_GET['id'];
   $sql = "SELECT * FROM `kategori` WHERE kategori_id=$id_";
   $result = $mysqli->query($sql);
   if ($result->num_rows > 0) {
    $row = $result->fetch_array();
?>

<main>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT DATA KATEGORI</h6>
        </div>
        <div class="p-5">
            <form method="POST">
            <div class="form-group">
                <input type="text" class="form-control form-control-user" value="<?php echo $row['kategori_id']; ?>"  placeholder="Kode" name="id" disabled>
            </div>
            <div class="form-group">
                <input type="text" name="nama" class="form-control form-control-user" value="<?php echo $row['nama_kategori']; ?>"  placeholder="Nama Kategori">
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