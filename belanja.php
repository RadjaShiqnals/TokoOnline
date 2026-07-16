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

        <div class="col-md-3 mb-4 d-flex align-items-stretch">

            <div class="card border border-primary shadow-0 text-white w-100" style="background-color:#0036b3; display: flex; flex-direction: column;">

                <img src="assets/img/<?php echo $data_barang['foto']; ?>" class="card-img-top" style="height: 300px;object-fit: contain;margin-top: 5px;">

                <div class="card-body d-flex flex-column">

                    <h5 class="card-title"><?php echo htmlspecialchars($data_barang['nama_barang']); ?></h5>

                    <p class="card-text mb-1">
                        Pemilik Asli : <?php echo htmlspecialchars($data_barang['pengarang']); ?>
                    </p>

                    <p class="card-text mb-3">
                        Harga : <?php echo htmlspecialchars($hargabarang); ?>
                    </p>

                    <?php 
                    $deskripsi = $data_barang['deskripsi'];
                    if (strlen($deskripsi) > 100) {
                        $deskripsi = substr($deskripsi, 0, 97) . '...';
                    }
                    ?>
                    <p class="card-text flex-grow-1">
                        <?php echo htmlspecialchars($deskripsi); ?>
                    </p>

                    <div class="mt-auto">
                        <a href="beli_barang.php?id_barang=<?php echo $data_barang['id_barang']; ?>" class="btn btn-light btn-lg w-100 text-center">
                            Beli
                        </a>
                    </div>

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