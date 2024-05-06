<?php
include_once 'includes/conn.php';

	$id_sewa =  $_GET['id_pemesanan'];
	$sql = mysqli_query ($conn," DELETE FROM pemesanan where id_pemesanan=' $id_sewa'");
	header('Location:index.php')
	
?>