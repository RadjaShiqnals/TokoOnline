<?php
include "header.php";
if ($_SESSION['status_login_tokoonline'] != true) {
    $_SESSION['alert'] = "Butuh Login";
    header("Location: login.php");
    exit();
}
?>
<h2 style="text-align: center;margin-top: 10px;color: white;">Histori Pembelian Barang</h2>


<div class="container rounded text-light" style="margin-top:10px;">
    <table class="table text-light">
        <thead>
            <th>NO</th>
            <th>Foto Barang</th>
            <th>Nama Barang</th>
            <th>Kuantitas</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $qry_histori = mysqli_query($conn, "select * from peminjaman_barang order by id_peminjaman_barang desc");
            $no = 0;
            while ($dt_histori = mysqli_fetch_array($qry_histori)) {
                $no++;
                $total_harga = 0;
                $barang = "";
                $hargabuku = "";
                $hitung = ""; // Initialize $hitung here
                $qty = ""; // Initialize $qty here
                $foto_barang = "";
                $qry_barang = mysqli_query($conn, "select * from detail_peminjaman_barang join barang on barang.id_barang=detail_peminjaman_barang.id_barang where id_peminjaman_barang = '" . $dt_histori['id_peminjaman_barang'] . "'");
                while ($dt_barang = mysqli_fetch_array($qry_barang)) {
                    $hargabuku .= "Rp. " . number_format($dt_barang['harga'], 0, ',', '.') . " (Rp. " . number_format($dt_barang['harga'] * $dt_barang['qty'], 0, ',', '.') . ")<br>";
                    $hitung .= "Rp. " . $dt_barang['harga'] * $dt_barang['qty'] . "<br>";
                    $foto_barang .= "<a class='ripple'><img src='assets/img/" . $dt_barang['foto'] . "'style=' height:120px; width:80px;object-fit:contain;border: 5px solid rgb(60, 167, 255); background-color: aliceblue;' class='img-fluid rounded hover-shadow'/></a>";
                    $barang .= $dt_barang['nama_barang'] . "<br>";
                    $qty .= $dt_barang['qty'] . "<br>"; // Include quantity
                    $total_harga += $dt_barang['harga'] * $dt_barang['qty']; // Calculate total price
                    $total_harga_formatted = "Rp. " . number_format($total_harga, 0, ',', '.');
                }

                $qry_detail_barang = mysqli_query($conn, "select * from barang where id_barang");
                $dt_barangs = mysqli_fetch_array($qry_detail_barang);

                $qry_cek_kembali = mysqli_query($conn, "select * from pengembalian_barang where id_peminjaman_barang ='" . $dt_histori['id_peminjaman_barang'] . "'");
                if (mysqli_num_rows($qry_cek_kembali) > 0) {
                    $dt_kembali = mysqli_fetch_array($qry_cek_kembali);
                    $denda = "Rp. " . $dt_kembali['denda'];
                    $status_kembali = "<label class='alert alert-success'>Sudah Terbayar <label>";
                    $button_kembali = "";
                } else {
                    $status_kembali = "<label class='alert alert-danger'>Belum Bayar</label>";
                    $button_kembali = "<a href='kembali.php?id=" . $dt_histori['id_peminjaman_barang'] . "' class='btn btn-success' style='margin-top:20px;'>Bayar</a>";
                }

            ?>
                <tr>
                    <td>
                        <?= $no ?>
                    </td>
                    <td>
                        <?= $foto_barang?>
                    </td>
                    <td>
                        <?= $barang ?>
                    </td>

                    <td>
                        <?= $qty ?>
                    </td>
                    <td>
                        <?= $hargabuku ?>
                    </td>
                    <td>
                        <?= $total_harga_formatted ?>
                    </td>
                    <td>
                        <?= $status_kembali ?>
                    </td>
                    <td>
                        <?= $button_kembali ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include "footer.php";
?>