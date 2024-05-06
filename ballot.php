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
      <h1>
        INPUT PENGELUARAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengeluaran</li>
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
            <div class="col-sm-12">

            <form role="form" action="proses/uang.php" method="POST">
     <div class="form-group">
    
  <label class="centered">Nama Barang</label>
  <input name="nama_barang" type="text" class="form-control number-format " placeholder="Nama Barang" value="" required /><br>
  <label class="centered">Jumlah Barang</label>
  <input name="jumlah" type="text" class="form-control " placeholder="Jumlah" value=""  required/><br>
  <label class="centered">Total Harga</label>
  <input name="harga" type="number" class="form-control " placeholder="Rp." value="" required/><br>
      <div class="centered"></div>
      <label class="centered">Tanggal</label>
      <input name="tgl" type="date" class="form-control"   /><br>
      <div class="form-group centered mb">
      <div class="col-sm-6 ml-4">
                  <button type="submit" class="btn btn-primary col-md-6 ml-5 mb-3" name="submit">Confirm</button>
                </div>
                <div class="col-sm-6 ml-4"><button type="reset" class="btn btn-danger col-md-6 ml-5 mb-3" name="reset">Reset</button></div>
             </div>
         </div>
    </form>
    <?php ?>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/voters_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'voters_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_password').val(response.password);
      $('.fullname').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
</body>
</html>
