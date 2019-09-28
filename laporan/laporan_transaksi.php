<?php
    $qs = "SELECT * FROM tb_transaksi";
    $rs = $koneksi->query($qs);



    $qs1 = "SELECT status,count(*) AS count FROM tb_transaksi GROUP BY status ORDER BY tgl_pinjam";
    $rs1 = $koneksi->query($qs1);
    
    $qs12 = "SELECT Penerbit, count(seluruh_buku) AS Jumlah FROM tb_buku GROUP BY Penerbit";
    $rs12 = $koneksi->query($qs12);
    
    $books = "SELECT count(*) from tb_buku";
    // chart books 
    $jmlah = array();
    $label = array();    
    while($p = $rs12->fetch_object()) {
        array_push($jmlah, $p->Jumlah.",");
        array_push($label,$p->Penerbit.",");
    }
    $uniq1 = array_unique($label);    
?>

<div class="row">
               
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-desktop"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Data Anggota</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-qrcode "></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Data Buku</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-bar-chart-o "></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Data Transaksi</p>
                </div>
             </div>
		     </div>
			</div>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <canvas id="demobar" width="250" height="150"></canvas>
        </div>
        <div class="col-md-7">
            <!-- this is for books grafiks -->
            <canvas id="books" width="250" heigh='150'></canvas> 
        </div>
    </div>
</div>
<script  type="text/javascript">

var ctx = document.getElementById("demobar").getContext("2d");
var data = {
        labels: [
            <?php 
                $data=array(); 
                $no = 1;
                while ($p = $rs->fetch_array()) { 
                
                    $data[$no] = $p['status'];

                    $no+=1;
                }
                $uniq = array_unique($data);
                foreach($uniq as $un => $val) {
                    echo "'".$val."'".",";  
                }
            ?>],

        datasets: [{
            label: "Jumlah Transaksi Peminjaman buku",
            data: [
                <?php 
                    while ($p = $rs1->fetch_array()) { 
                        echo $p['count'] . ',';
                    }
                ?>],

            backgroundColor: [
                "rgba(59, 100, 222, 1)",
                "rgba(203, 222, 225, 0.9)",
                "rgba(102, 50, 179, 1)",
                "rgba(201, 29, 29, 1)",
                "rgba(81, 230, 153, 1)",
                "rgba(246, 34, 19, 1)"],
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        
            
        }]
};

var myBarChart = new Chart(ctx, {
          type: 'bar',
          data: data,
          options: {
          barValueSpacing: 20,
          scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                }
            }],
            xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
            }
        }
      });
</script>
<script  type="text/javascript">
var ctx1 = document.getElementById("books").getContext("2d");
var data1 = {
        labels: [
            <?php 
                foreach($uniq1 as $un1 => $val1) {
                    echo "'".$val1."'".",";  
                }
            ?>],

        datasets: [{
            label: "Jumlah Buku tersedia",
            data: [
                <?php 
                      foreach($jmlah as $jm) {
                          echo $jm;
                      }
                ?>],

            backgroundColor: [
                "rgba(59, 100, 222, 1)",
                "rgba(203, 222, 225, 0.9)",
                "rgba(102, 50, 179, 1)",
                "rgba(201, 29, 29, 1)",
                "rgba(81, 230, 153, 1)",
                "rgba(246, 34, 19, 1)"],
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        
            
        }]
};

var myBarChart1 = new Chart(ctx1, {
          type: 'bar',
          data: data1,
          options: {
          barValueSpacing: 20,
          scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                }
            }],
            xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
            }
        }
      });
</script>