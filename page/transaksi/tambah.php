<?php 
if (isset($_POST['simpan'])) {

    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    $id_buku =$_POST['buku'];

    $nama =$_POST['nama'];
    $pecah_nama = explode(".", $nama);
    $nim = $pecah_nama[0];
    $nama = $pecah_nama[1];

    # jenis status nanya ada 3 
    # masa pinjam
    # sudah di kembalikan
    # perpanjangan
    # dalam masa denda 

    $status = 'pinjam';
    $sql =$koneksi->query("select * from tb_buku where id='$id_buku'");
    while ($data = $sql->fetch_assoc()) {
       $sisa1 = $data['jumlah_buku'];
        $nm_buku  = $data['judul'];
        if($sisa1 === 0){
            ?>
             
             <script type="text/javascript">
                alert("stok buku habis, transaksi tidak dapat dilakukan,silahkan tambah kan stok buku terlebih dahulu");
                window.location.href="?page=transaksi&aksi=tambah";
                </script>
            <?php
                
        }else{
            $sql = $koneksi->query("insert into tb_transaksi(judul, nim, nama, tgl_pinjam, tgl_kembali, status) values ('$nm_buku', '$nim', '$nama', '$tgl_pinjam', '$tgl_kembali', '$status')"); 


            # menangurang data jumlah buku dengan 1
            $sisa = $data['jumlah_buku'] - 1 ;
            $sql2 = $koneksi->query("update tb_buku set jumlah_buku='$sisa' where id='$id_buku'");
            if($sql2) {
                ?>

                    <script type="text/javascript">
                        alert("simpan data berhasil");
                            window.location.href="?page=transaksi";
                    </script>
                <?php

            } else {
                echo "<script>alert('error when update book')</script>";
            }
        }
    }
}
?>

<?php

    $tgl_pinjam = date("d-m-Y");
    $nol_hari = mktime(0,0,0, date("n"), date("j")+0, date("Y"));
    $kembali = date("d-m-Y", $nol_hari);
?>
<div class="panel panel-primary">
<div class="panel-heading">
    Tambah Data 
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                   
                                    <form method="POST"  onsubmit="return validasi(this)">


                                         <div class="form-group">
                                            <label>Judul Buku Tersedia</label>
                                            <select class="form-control" name="buku">
                                                <?php
                                                
                                                $sql =$koneksi->query("select * from tb_buku where jumlah_buku > '0'  order by id");

                                                while ($data=$sql->fetch_assoc()){
                                                    echo "<option value='$data[id]'>$data[judul]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <select class="form-control" name="nama">
                                            <?php
                                                
                                                $sql =$koneksi->query("select * from tb_anggota order by nim ");

                                                while ($data=$sql->fetch_assoc()){
                                                    echo "<option value='$data[nim].$data[nama]'>$data[nama] </option>";
                                                }
                                                ?>
                                               
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Pinjam</label>
                                            <input class="form-control" type="text" name="tgl_pinjam" value="<?php echo $tgl_pinjam;?>" readonly />
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Kembali</label>
                                            <input class="form-control" type="text" name="tgl_kembali" value="<?php echo $kembali;?>" readonly/>
                                        </div>



                                         
                                        <div>
                                            <input type="submit" value="simpan" name='simpan'style="margin-top: 8px" class="btn btn-success">
                                        </div>    
                                   
                                    </form>
                            </div>
</div>

