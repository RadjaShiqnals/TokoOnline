<?php
include "header.php";
if ($_SESSION['status_login_tokoonline'] != true) {
    $_SESSION['alert'] = "Butuh Login";
    header("Location: login.php");
    exit();
}
include "koneksi.php";
$qry_detail_barang = mysqli_query($conn, "select * from barang where id_barang = '" . $_GET['id_barang'] . "'");
$dt_barang = mysqli_fetch_array($qry_detail_barang);
?>
<div class="container text-center text-white">
        <h2>Beli Barang</h2>
        <div class="row book-details">
            <div class="col-md-4">
                <img src="assets/img/<?= $dt_barang['foto'] ?>" class="card-img-top img-thumbnail book-img">
                <p class="text-white font-monospace" id="pinjamfont">Rp. <?= $dt_barang['harga']?></p>
            </div>
            <div class="col-md-8">
                <form action="masukkankeranjang.php?id_barang=<?= $dt_barang['id_barang'] ?>" method="post">
                    <div class="form-group">
                        <label for="namaBuku">Nama Barang</label>
                        <input type="text" class="form-control" id="namaBuku" value="<?= $dt_barang['nama_barang'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="4" readonly><?= $dt_barang['deskripsi'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" value="<?= $dt_barang['pengarang'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jumlahPinjam">Jumlah Pinjam</label>
                        <input type="number" class="form-control" id="jumlahPinjam" name="jumlah_pinjam" value="1">
                    </div>
                    <button type="submit" class="btn btn-success btn-pinjam">Beli</button>
                </form>
            </div>
        </div>
    </div>
<?php
include "footer.php";
?>