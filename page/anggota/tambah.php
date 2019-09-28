<?php 
    if(isset($_POST['kirim'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jk = $_POST['jk'];
        $prodi = $_POST['prodi'];

        $query = "INSERT INTO tb_anggota (nim, nama, tempat_lahir, tgl_lahir, jk, prodi )
        VALUES('$nim','$nama','$tempat_lahir','$tgl_lahir','$jk','$prodi')";    
        $result = $koneksi->query($query) or die('Error to save in table buku');
        if($result) {
            echo "berhasil";
            header("location:index.php?page=anggota");
        } else {
            echo $koneksi->error;
        }

    } else {
        ?>
            <script> alert('harap masukan data terlebih dahulu  ');</script>
        <?php
    }
?>

<div class="panel panel-default">
<div class="panel-heading">
    Tambah Data 
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                   
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Nim</label>
                                            <input class="form-control" name="nim" />
                                        </div>

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" />
                                        </div>

                                         <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" name="tempat_lahir" />
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" type="date" name="tgl_lahir" />
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="l" name="jk"/> Laki-laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="p" name="jk"/> Wanita
                                            </label>
                                           
                                        </div>

                                         <div class="form-group">
                                            <label>Program Studi</label>
                                            <select class="form-control" name="prodi">
                                                <option value="ti">Teknik Informatika</option>
                                                <option value="si">Sistem Informasi</option>
                                                <option value="si">Teknik Elektro</option>
                                            </select>


                                         
                                        <div>
                                            <input type="submit" value="kirim" name='kirim' class="btn btn-success">
                                        </div>    
                                    </div>

                                    </form>
                            </div>
</div>

