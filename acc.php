<?php
include_once 'includes/conn.php';

	$id_pemesanan =  $_GET['id_pemesanan'];
	$jmlh=mysqli_query($conn,"SELECT uang FROM keuangan WHERE status='masuk'");
	while($d= mysqli_fetch_array($jmlh)){
		$masuk=$d['uang'];
	}
	$bersih=mysqli_query($conn,"SELECT uang FROM keuangan WHERE status='bersih'");
	while($d= mysqli_fetch_array($bersih)){
		$profit=$d['uang'];
	}
	$Tharga=mysqli_query($conn,"SELECT total_harga FROM pemesanan WHERE id_pemesanan='$id_pemesanan'");
	while($d= mysqli_fetch_array($Tharga)){
		$total=$d['total_harga'];
	}
	$jumlah=mysqli_query($conn,"SELECT jumlah FROM pemesanan WHERE id_pemesanan='$id_pemesanan'");
	while($d= mysqli_fetch_array($jumlah)){
		$banyak=$d['jumlah'];
	}
	$nama=mysqli_query($conn,"SELECT nama_produk FROM pemesanan WHERE id_pemesanan='$id_pemesanan'");
	while($d= mysqli_fetch_array($nama)){
		$np=$d['nama_produk'];
	}

	if ($np=='400'){
		$Kbersih=5000*$banyak;
		$untung=$profit+$Kbersih;
		$perintah= mysqli_query($conn,"UPDATE keuangan set uang='$untung' where status='bersih'");
	}
	else{
		$Kbersih=7000*$banyak;
		$untung=$profit+$Kbersih;
		$perintah= mysqli_query($conn,"UPDATE keuangan set uang='$untung' where status='bersih'");
	}


	$pemasukan=$masuk+$total;
	$query= mysqli_query($conn,"UPDATE keuangan set uang='$pemasukan' where status='masuk'");

	$sql = mysqli_query ($conn," UPDATE pemesanan set status='selesai' where id_pemesanan ='$id_pemesanan'");
	echo "<script>alert('$pengeluaran'); 
        document.location='index.php';
            </script>";

	
?>
