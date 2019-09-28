<?php 
    if(isset($_POST['kirim'])) {
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun'];
        $isbn = $_POST['isbn'];
        $jumlah_buku = $_POST['jumlah'];
        $lokasi = $_POST['lokasi'];
        $tanggal_input = $_POST['tanggal'];

      
        $query = "INSERT INTO tb_buku  VALUES ('','$judul','$pengarang','$penerbit','$tahun_terbit','$isbn',$jumlah_buku,'$lokasi','$tanggal_input','', '$jumlah_buku')";    
        $result = $koneksi->query($query);
        if($result) {
            echo "berhasil";
            header("location:index.php?page=buku");
        } else {
            echo $koneksi->error;
            echo $query;
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
                            <label>Judul</label>
                            <input class="form-control" name="judul" />
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input class="form-control" name="pengarang" />
                        </div>
                            <div class="form-group">
                            <label>Penerbit</label>
                            <input class="form-control" name="penerbit" />
                        </div>
                            <div class="form-group">
                            <label>Tahun Terbit</label>
                            <select class="form-control" name="tahun">
                                <?php for($i=1995; $i < date('Y'); $i++ ) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-group">
                            <label>Isbn</label>
                            <input class="form-control" name="isbn" />
                        </div>
                            <div class="form-group">
                            <label>Jumlah Buku</label>
                            <input class="form-control" type="number" name="jumlah" />
                        </div>
                            <div class="form-group">
                            <label>Lokasi</label>
                            <select class="form-control" name = "lokasi">
                                <option value="rak1">rak 1</option>
                                <option value="rak2">rak 2</option>
                                <option value="rak3">rak 3</option>
                            </select>
                            <div class="form-group">
                            <label>Tanggal Input</label>
                            <input class="form-control" name="tanggal" type ="date" />
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <input type="submit" value="kirim" name='kirim' class="btn btn-succes">
                    </div>    
                </div>
            </form>
        </div>
    </div>

