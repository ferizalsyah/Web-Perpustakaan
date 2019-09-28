<a href="?page=pengunjung&aksi=tambah" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-plus"></i>
    Tambah Data</a>
    <a href="./page/pengunjung.php" target="blank" class="btn btn-default" style="margin-bottom: 5px;"><i class="fa fa-print"></i>
    ExportToExel</a>

    <a href="./page/pengunjung.php" target="blank" class="btn btn-default" style="margin-bottom: 5px;"><i class="fa fa-print"></i>
    ExportToPdf</a>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Pengunjung
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama</th>
                                            <th>Almamater</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $no = 1;

                                        $sql = $koneksi->query("select * from tb_pegunjung");

                                        while ($data = $sql->fetch_assoc()){

                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nim'];?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['almamater'];?></td>
                                            
                                            <td>
                                                <a href="?page=pengunjung&aksi=ubah&id=<?php echo $data['nim']; ?>" class="btn btn-info" >ubah</a>
                                                <a onclick="return confirm('Anda yakin akan menghapus data ini...??')"href="
                                                ?page=pengunjung&aksi=hapus&id=<?php echo $data['nim']; ?>" class="btn btn-danger" >hapus</a>

                                            </td>
                                        </tr>
                                        
                                    <?php } ?>

                                    </tbody>
                                    </div>
                            </div>
                        </div>
                </div>
       </div>