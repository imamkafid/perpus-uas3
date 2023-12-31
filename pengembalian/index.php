<?php
require '../head.php';
?>

<main>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row ">
                <div class="col-lg-6 ">
                    <h4 class="m-0 font-weight-bold text-primary">Detail Riwayat Selesai</h4>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                <div class="col-lg-12 d-flex justify-content-end">
                     <a href="../peminjaman/"><button type="button"
                    class="btn btn-success"><i class="fas fa-angel-left"></i>< Kembali</button></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Peminjaman</th>
                            <th>Judul Buku</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Denda</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					include '../config/koneksi.php';if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = "SELECT pengembalian.pengembalian_id, peminjaman.peminjaman_id, buku.judul, anggota.nama, pengembalian.tanggal_pengembalian, pengembalian.denda, pengembalian.status_pengembalian FROM `pengembalian` INNER JOIN `peminjaman` ON pengembalian.peminjaman_id=peminjaman.peminjaman_id INNER JOIN `anggota` ON peminjaman.anggota_id=anggota.anggota_id INNER JOIN `buku` ON peminjaman.buku_id=buku.buku_id GROUP BY pengembalian_id HAVING peminjaman_id='$id';";
                        }else{
                        $sql = "SELECT pengembalian.pengembalian_id, peminjaman.peminjaman_id, buku.judul, anggota.nama, pengembalian.tanggal_pengembalian, pengembalian.denda, pengembalian.status_pengembalian FROM `pengembalian` INNER JOIN `peminjaman` ON pengembalian.peminjaman_id=peminjaman.peminjaman_id INNER JOIN `anggota` ON peminjaman.anggota_id=anggota.anggota_id INNER JOIN `buku` ON peminjaman.buku_id=buku.buku_id";
                        }
						$result = $mysqli->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row["peminjaman_id"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["judul"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["nama"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["tanggal_pengembalian"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["denda"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["status_pengembalian"]; ?>
                                </td>
								<td>
                                    <div class="btn-group">
                                        <a href="delete.php?id=<?php echo $row['pengembalian_id']; ?>"><button type="button"
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