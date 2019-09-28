<?php 
    if(isset($_POST['kirim'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jk = $_POST['jk'];
        $prodi = $_POST['prodi'];

        $query = 
            
        $result = $koneksi->query("update tb_anggota set  nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jk='$jk', prodi='$prodi' where nim='$nim' " );
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

<?php

    $nim = $_GET['id'];

    $sql = $koneksi->query("select * from tb_anggota where nim='$nim'");

    $tampil = $sql->fetch_assoc();
    $jkl    = $tampil['jk'];
    $prodi  = $tampil['prodi'];

?>

<div class="panel panel-default">
<div class="panel-heading">
    Ubah Data 
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                   
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Nim</label>
                                            <input class="form-control" name="nim" value="<?php echo $tampil['nim']?>"readonly/>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" value="<?php echo $tampil['nama']?>"/>
                                        </div>

                                         <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" name="tempat_lahir" value="<?php echo $tampil['tempat_lahir']?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir']?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br/>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="l" name="jk" <?php echo($jkl=='l')?"checked":"";?>/> Laki-laki  
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="p" name="jk"<?php echo($jkl=='p')?"checked":"";?>/> Wanita
                                            </label>
                                           
                                        </div>

                                         <div class="form-group">
                                            <label>Program Studi</label>
                                            <select class="form-control" name="prodi">
                                                <option value="ti" <?php if ($prodi=='ti') {
                                                    echo "selected";
                                                } ?>/>Teknik Informatika</option>
                                                <option value="si" <?php if ($prodi=='si') {
                                                    echo "selected";
                                                } ?>/>Sistem Informasi</option>
                                            </select>
                                            </div>


                                         
                                        <div>
                                            <input type="submit" value="ubah" name='kirim' class="btn btn-success">
                                        </div>    
                                    </div>

                                    </form>
                            </div>
</div>

