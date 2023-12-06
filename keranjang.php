<?php
include "header.php";
$total = 0;
$total_formatted = 0;
?>
<div class="container mt-5">
    <h2 class="mb-4 text-light">Daftar Barang di Keranjang</h2>
    <?php if (isset($_SESSION['alert'])) { ?>
        <div class="alert alert-danger mt-3">
            <?php echo $_SESSION['alert']; ?>
        </div>
    <?php
        unset($_SESSION['alert']); // Clear the alert message from session
    } ?>
    <div class="table-responsive">
        <table class="table text-light">
            <thead class="thead-light text-light">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key_produk => $val_produk) :
                        // Calculate the total for each product
                        $harga = "Rp. " . number_format($val_produk['harga'], 0, ',', '.');
                        $total_per_item = $val_produk['qty'] * $val_produk['harga'];
                        $total += $total_per_item; // Accumulate total for all items
                        $total_per_item_formatted = "Rp. " . number_format($total_per_item, 0, ',', '.');
                        $total_formatted = "Rp. " . number_format($total, 0, ',', '.');

                ?>
                        <tr>
                            <th scope="row"><?= ($key_produk + 1) ?></th>
                            <td><?= $val_produk['nama_barang'] ?></td>
                            <td><?= $val_produk['qty'] ?></td>
                            <td><?= $harga ?></td>
                            <td><?= $total_per_item_formatted ?></td>
                            <td><a href="hapus_cart.php?id=<?= $key_produk ?>" class="btn btn-danger"><strong>X</strong></a></td>
                        </tr>
                <?php
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="text-right text-light">
        <strong>Total: <?= $total_formatted?></strong>
    </div>
    <a href="checkout.php" class="btn btn-primary">Check Out</a>
</div>
<?php
include "footer.php";
?>
