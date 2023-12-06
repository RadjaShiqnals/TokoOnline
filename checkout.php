<?php 
    session_start();
    include "koneksi.php";
    $cart=@$_SESSION['cart'];
    if (isset($_SESSION['cart'])) {
        if(count($cart)>0){
            $lama_pinjam=5; //satuan hari
            $tgl_harus_kembali=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$lama_pinjam),date('Y')));
            mysqli_query($conn,"INSERT INTO peminjaman_barang (id_user,tanggal_pinjam,tanggal_kembali) value ('".$_SESSION['id_user']."','".date('Y-m-d')."','".$tgl_harus_kembali."')");
             $id=mysqli_insert_id($conn);
            foreach ($cart as $key_produk => $val_produk) {
                mysqli_query($conn,"insert into detail_peminjaman_barang (id_peminjaman_barang,id_barang,qty) value('".$id."','".$val_produk['id_barang']."','".$val_produk['qty']."')");
            }
            unset($_SESSION['cart']);
            echo '<script>alert("Anda berhasil meminjam buku");location.href="histori_pembelian.php"</script>';
        
        }
    }
    else {
        echo
        $_SESSION['alert'] = "Checkout Barang tapi gak ada isinya, dasar stress";
        header("Location: keranjang.php");
        exit();;
    }
    ?>
