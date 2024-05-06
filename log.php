<?php include 'includes/header.php'; ?>
<?php include 'includes/conn.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <b>CATATAN PEMASUKAN</b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Catatan Pemasukan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
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
                  <th>Status</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM pemesanan WHERE status='selesai'";
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
                          <td><?php echo  $row['status'];?></td>
                    
                        </tr>
                  <?php }?>
                </tbody> 
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/votes_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
