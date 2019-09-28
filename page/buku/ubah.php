<?php 
    if(isset($_POST['kirim'])) {
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $isbn = $_POST['isbn'];
        $jumlah = $_POST['jumlah'];
        $lokasi = $_POST['lokasi'];
        $tanggal = $_POST['tanggal'];
        $id= $_POST['id'];

        $result = $koneksi->query("update tb_buku set judul='$judul', pengarang='$pengarang', Penerbit='$penerbit', tahun_terbit='$tahun',
                isbn='$isbn', jumlah_buku='$jumlah', lokasi='$lokasi', tgl_input='$tanggal' where id='$id'");
        if($result) {
            echo "berhasil";
            header("location:index.php?page=buku");
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
$id = $_GET['id'];
$sql = $koneksi->query("select * from tb_buku where id='$id'");

    $tampil = $sql->fetch_assoc();

    $tahun2 = $tampil['tahun_terbit'];

    $lokasi = $tampil['lokasi'];

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
                                            <label>judul</label>
                                            <input type="hidden" name="id" class="form-control" value="<?php echo $_GET['id']; ?>">
                                            <input class="form-control" name="judul" value="<?php echo $tampil['judul'];?>" />
                                        </div>

                                        <div class="form-group">
                                            <label>pengarang</label>
                                            <input class="form-control" name="pengarang" value="<?php echo $tampil['pengarang'];?>" />
                                        </div>

                                         <div class="form-group">
                                            <label>penerbit</label>
                                            <input class="form-control" name="penerbit" value="<?php echo $tampil['Penerbit'];?>" />
                                        </div>

                                         <div class="form-group">
                                            <label>tahun terbit</label>
                                            <select class="form-control" name="tahun">
                                                <?php
                                                
                                                $tahun = date("Y");

                                                for ($i=$tahun-29; $i <= $tahun; $i++){
                                                    
                                                    if ($i == $tahun2 ){

                                                    echo'<option value="'.$i.'" selected>'.$i.'</option>';

                                                    }else{
                                                        echo'<option value="'.$i.'">'.$i.'</option>';
                                                        
                                                    }                                                  
                                                }
                                               
                                                ?>
                                                <?php for($i=1995; $i < date('Y'); $i++ ) { ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php } ?>
                                            </select>

                                             <div class="form-group">
                                            <label>Isbn</label>
                                            <input class="form-control" name="isbn"  value="<?php echo $tampil['isbn'];?>"/>
                                        </div>

                                         <div class="form-group">
                                            <label>jumlah buku</label>
                                            <input class="form-control" type="number" name="jumlah"  value="<?php echo $tampil['jumlah_buku'];?>" />
                                        </div>
                                            
                                        <div class="form-group">
                                            <label>lokasi</label>
                                            <select class="form-control" name = "lokasi">
                                                <option value="rak1" <?php if ($lokasi=='rak1') {echo "selected";}?>>rak 1</option>
                                                <option value="rak2" <?php if ($lokasi=='rak2') {echo "selected";}?>>rak 2</option>
                                                <option value="rak3" <?php if ($lokasi=='rak3') {echo "selected";}?>>rak 3</option>
                                            </select>

                                            <div class="form-group">
                                            <label>tanggal input</label>
                                            <input class="form-control" name="tanggal" type ="date" value="<?php echo $tampil['tgl_input'];?>" />
                                        </div> 
                                        </div>

                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="kirim" name='kirim' class="btn btn-success">
                                        </div>    
                                    </div>

                                    </form>
                            </div>
</div>
</div>
