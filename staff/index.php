<?php
require '../head.php';
?>

<main>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row ">
                <div class="col-lg-6 ">
                    <h4 class="m-0 font-weight-bold text-primary">Karyawan</h4>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                     <a href="create.php?id=<?php echo $row['staff_id']; ?>"><button type="button"
                class="btn btn-success"><i class="fas fa-plus me-1"></i> Tambah</button></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Karyawan</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include '../config/koneksi.php';
                        $sql = "SELECT * FROM staff";
                        $result = $mysqli->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row["staff_id"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["nama"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["jabatan"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["email"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["username"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["pass"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["telepon"]; ?>
                                </td>
                                <td class="align-items-center">
                                    <div class="btn-group">
                                        <a href="update.php?id=<?php echo $row['staff_id']; ?>"><button type="button"
                                                class="btn btn-outline-success btn-sm"><i class="fas fa-edit me-1"></i></button></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="delete.php?id=<?php echo $row['staff_id']; ?>"><button type="button"
                                                class="btn btn-outline-danger btn-sm"><i class="fas fa-trash me-1"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                        <?php }}
                        $mysqli->close(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>

<?php
require '../foot.php';
?>