<?php
   include '../config/koneksi.php';
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $staff_id = $_POST['staff_id'];
       $nama = $_POST['nama'];
       $jabatan = $_POST['jabatan'];
       $email = $_POST['email'];
       $username = $_POST['username'];
       $pass = $_POST['pass'];
       $telepon = $_POST['telepon'];
       $sql = "INSERT INTO staff (staff_id, nama, jabatan, email, username, pass, telepon) VALUES ('$staff_id', '$nama', '$jabatan', '$email', '$username', '$pass', '$telepon')";
   
       if ($mysqli->query($sql) === TRUE) {
           header("Location: ../staff");
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
        <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA KARYAWAN</h6>
    </div>
            <div class="p-5">
            <form method="POST">
            <div class="form-group">
                <input type="text" name="staff_id" class="form-control form-control-user" placeholder="ID Karyawan">
            </div>
            <div class="form-group">
                <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama">
            </div>
            <div class="form-group">
                <input type="text" name="jabatan" class="form-control form-control-user" placeholder="Jabatan">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control form-control-user" placeholder="Email ">
            </div>
            <div class="form-group">
                <input type="text" name="username" class="form-control form-control-user" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="text" name="pass" class="form-control form-control-user" placeholder="Password">
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