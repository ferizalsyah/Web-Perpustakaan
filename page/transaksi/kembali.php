<?php
    $id = $_GET ['id'];
    $sql="SELECT * FROM tb_transaksi WHERE id=$id";
    $result =$koneksi->query($sql);
    while($p = $result->fetch_array()) {
        $jumlah = $p['jumlah'] +2;
        $judul = $p['judul'];
        $sql1 ="UPDATE tb_buku set jumlah_buku='$jumlah' WHERE judul='$judul'";
        $update =  $koneksi->query($sql1);
        if($update) {

            $sql2 ="UPDATE tb_transaksi set status='sudah dikembalikan' WHERE id='$id'";
            $update1 =  $koneksi->query($sql2);
            if($update1)
                header("location:?page=transaksi");

        } else {
            $koneksi->error;
            echo $sql1;
        }

    }
    

?>

