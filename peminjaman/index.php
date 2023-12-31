
<?php
require '../head.php';
?>

<main>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row ">
                <div class="col-lg-6 ">
                    <h4 class="m-0 font-weight-bold text-primary">Peminjaman</h4>
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
                            <th>ID Peminjaman</th>
                            <th>Judul Buku</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					include '../config/koneksi.php';
						$sql = "SELECT buku.judul, anggota.nama, peminjaman.peminjaman_id, peminjaman.tanggal_peminjaman, peminjaman.tanggal_kembali, peminjaman.status 
						FROM `peminjaman` INNER JOIN `buku` ON peminjaman.buku_id=buku.buku_id INNER JOIN `anggota` ON peminjaman.anggota_id=anggota.anggota_id";
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
                                    <?php echo $row["tanggal_peminjaman"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["tanggal_kembali"]; ?>
                                </td>
								
									<?php 
									$status = $row["status"];
									echo  "<td>".ucfirst($status);
 									if ($status== "dipinjam") {
									echo " | <a href='kembali.php?id=".$row["peminjaman_id"]."'>Kembalikan</a></td>";
 									}?>

								<td>
                                    <div class="btn-group">
                                        <a href="update.php?id=<?php echo $row['peminjaman_id']; ?>"><button type="button"
                                                class="btn btn-outline-success btn-sm"><i class="fas fa-edit me-1"></i></button></a>
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