<?php
include "header.php";
?>

<div class="row">

    <?php
    include "koneksi.php";

    $qry_barang = mysqli_query($conn, "SELECT * FROM barang");
    while ($data_barang = mysqli_fetch_array($qry_barang)) {

        $hargabarang = "Rp. " . number_format($data_barang['harga'], 0, ',', '.');

    ?>

        <div class="col-md-3">

            <div class="card border border-primary shadow-0 text-white mb-3" style="margin:10px;background-color:#0036b3;">

                <img src="assets/img/<?php echo $data_barang['foto']; ?>" class="card-img-top" style="height: 300px;object-fit: contain;margin-top: 5px;">

                <div class="card-body">

                    <h5 class="card-title"><?php echo $data_barang['nama_barang']; ?></h5>

                    <p class="card-text">
                        Pemilik Asli : <?php echo $data_barang['pengarang']; ?>
                    </p>

                    <p class="card-text">
                        Harga : <?php echo $hargabarang; ?>
                    </p>

                    <p class="card-text">
                        <?php echo substr($data_barang['deskripsi'], 0, 255); ?>
                    </p>

                    <a href="beli_barang.php?id_barang=<?php echo $data_barang['id_barang']; ?>" class="btn btn-light btn-lg px-5">
                        Beli
                    </a>

                </div>

            </div>

        </div>

    <?php
    }
    ?>

</div>

<?php
include "footer.php";
?>