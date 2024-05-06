<?php include 'includes/conn.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<section id="pageloader">
            <div class="loader-item fa fa-spin colored-border"></div>
        </section> <!-- /#pageloader -->
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $nomor=0;
                $pcs=0;
                $sql = mysqli_query($conn ," SELECT * FROM pemesanan WHERE status='selesai'");
                while($data = mysqli_fetch_assoc($sql)){
                    $nomor++;
                    $jumlah=$data['jumlah'];
                    $pcs+=$jumlah;}?>

               <h3><?php echo $pcs; ?> pcs</h3>


              <p>Jumlah Pesanan Selesai</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <a href="log.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM Produk";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
          
              <p>Produk Tersedia</p>
            </div>
            <div class="icon">
            <i class="fa fa-coffee" aria-hidden="true"></i>
            </div>
            <a href="votes.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                $pengeluaran=0;
                $out=0;
                $sql = mysqli_query($conn," SELECT * FROM catatan");
                  while($data = mysqli_fetch_assoc($sql)){
                    $keluar=$data['harga'];
                    $out=$keluar;
                    $pengeluaran+=$out;}?>
                    <h3>Rp.<?php echo  number_format($pengeluaran); ?></h3>
              <p>Total Pengeluaran</p>
            </div>
            <div class="icon">
            
            <i class="fa fa-exchange" aria-hidden="true"></i>
            </div>
            <a href="pengeluaran.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
                $sql = mysqli_query($conn," SELECT * FROM keuangan where status='masuk' ");
                while($data = mysqli_fetch_assoc($sql)){
                  $in=$data['uang'];
                }
                  ?>
                  <h3>Rp.<?php echo  number_format($in); ?></h3>


              <p>Total Pemasukan</p>
            </div>
            <div class="icon">
            <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <a href="log.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <?php
                $sql = mysqli_query($conn," SELECT * FROM keuangan where status='keluar' ");
                while($data = mysqli_fetch_assoc($sql)){
                  $out=$data['uang'];
                }
                  ?>
                  <h3>Rp.<?php echo  number_format($out,2,',','.'); ?></h3>


              <p>Sisa Uang</p>
            </div>
            <div class="icon">
              <i class="fa fa-credit-card-alt" aria-hidden="true"></i>

            </div>
            <a href="log.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
              <?php
                $sql = mysqli_query($conn," SELECT * FROM keuangan where status='bersih' ");
                while($data = mysqli_fetch_assoc($sql)){
                  $profit=$data['uang'];
                }
                  ?>
                  <h3>Rp.<?php echo  number_format($profit); ?></h3>


              <p>Keuntungan Bersih</p>
            </div>
            <div class="icon">
            <i class="fa fa-rocket" aria-hidden="true"></i>
            </div>
            <a href="log.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-12 col-xs-6">
          <!-- small box -->
          <div class="small-box ">
            <div class="inner" style="width:500px;  margin: 0px auto;">
        <h3>Grafik Penjualan <b>Konco</b>Coffee</h3>
        <canvas id="myChart" ></canvas>
        
          </div>
        </div>
      </div>
  	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Konco Coffee 200 mL", "Konco Coffee 400 mL"],
				datasets: [{
					label: '',
					data: [
					<?php 
          $jmlh=0;
					$konco200 = mysqli_query($conn,"select jumlah from pemesanan where nama_produk='200'");
          while($d=mysqli_fetch_assoc($konco200)){
            $ttl=$d['jumlah'];
            $jmlh+=$ttl;
          }
          $jmlh;
					echo ($jmlh);
					?>, 
					<?php 
          $jumlah=0;
					$konco400= mysqli_query($conn,"select * from pemesanan where nama_produk='400'");
          while($d=mysqli_fetch_assoc($konco400)){
            $ttl=$d['jumlah'];
            $jumlah+=$ttl;
          }
          echo ($jumlah);
					?>
					],
					backgroundColor: [
					'rgba(243, 156, 18, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
            'rgba(211, 84, 0, 1)',
					'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
      

  </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 align="center"><b>Data Pesanan</b></h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Pemesan</th>
                  <th>Nama Produk</th>
                  <th>Jumlah</th>
                  <th>Catatan</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th colspan="2">Status</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM pemesanan WHERE status='belum'";
                    $query = $conn->query($sql);
                    $no=0;
                    
                    while($row = $query->fetch_assoc()){
                      $no++ ;
                      ?>
                      <tr>
                          <td class='hidden'></td>
                          <td><?php echo $no ;?></td>
                          <td><?php echo $row['tanggal'];?></td>
                          <td><?php echo  $row['nama_pemesan'];?></td>
                          <td><?php echo 'Konco Coffee ', $row['nama_produk'];?>mL</td>
                          <td><?php echo  $row['jumlah'];?></td>
                          <td><?php echo  $row['catatan'];?></td>
                          <td><?php echo 'Rp. ', number_format($row['harga']);?></td>
                          <td><?php echo 'Rp. ', number_format($row['total_harga']);?></td>
                          <td><a href="acc.php?id_pemesanan=<?=$row['id_pemesanan']?>" onClick = "return confirm('Apakah Anda ingin Menyelesaikan Pesanan atas nama <?php echo $data['nama_pemesan']; ?>?')" button class="btn btn-primary btn-md">&#10003;</a><p></p></td>
                          <td><a href="tolak.php?id_pemesanan=<?=$row['id_pemesanan'] ?>" onClick = "return confirm('Apakah Anda ingin Menghapus Pesanan atas nama <?php echo $data['nama_pemesan']; ?>?')"button class="btn btn-danger 	btn-md">&#9747;</a><p></p></td>
                    
                        </tr>
                  <?php }?>
                </tbody> 
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
</body>
</html>
