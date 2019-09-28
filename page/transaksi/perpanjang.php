<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_transaksi WHERE id='$id'";
    $result = $koneksi->query($sql);
    if($result) {
        while($row=$result->fetch_assoc()) {
            # baris untuk update data 
            $judul = $row['judul'];
            $nim = $row['nim'];
            $nama = $row['nama'];
            $tgl_pinjam = $row['tgl_kembali'];
            $tgl_kembali = date('d-m-y', strtotime('+7 days', strtotime($row['tgl_kembali'])));
            $status = 'perpanjangan';
            $query = "UPDATE tb_transaksi set judul='$judul', nim='$nim', nama='$nama', tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', status='$status' where id='$id'";
            $result= $koneksi->query($query);
            if($result) {
                header('Location:?page=transaksi');
            }else {
                ?> <script>alert('data sudah di perpanjang');</script> <?php
            }

        }
    }

?>