<?php
require '../head.php';
?>

<main>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row ">
                <div class="col-lg-6 ">
                    <h4 class="m-0 font-weight-bold text-primary">Detail Buku</h4>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                     <a href="create.php?"><button type="button"
                class="btn btn-success"><i class="fas fa-plus me-1"></i> Tambah</button></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Buku</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Sinopsis</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include '../config/koneksi.php';
                        $sql = "SELECT buku.*, kategori.* FROM buku LEFT JOIN kategori ON buku.kategori_id=kategori.kategori_id";
                        $result = $mysqli->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row["buku_id"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["judul"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["pengarang"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["penerbit"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["tahun_terbit"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["sinopsis"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["nama_kategori"]; ?>
                                </td>
                                <td class="align-items-center">
                                    <div class="btn-group">
                                        <a href="update.php?id=<?php echo $row['buku_id']; ?>"><button type="button"
                                                class="btn btn-outline-success btn-sm"><i class="fas fa-edit me-1"></i></button></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="delete.php?id=<?php echo $row['buku_id']; ?>"><button type="button"
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