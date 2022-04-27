<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];
	//$cbokel = $_POST['cbokel'];
	$cbojns = $_POST['cbojns'];
	$txtjml = $_POST['txtjml'];
	
	mysqli_query($koneksi,"UPDATE tbpeternakan SET kd_ternak='$cbojns', jumlah='$txtjml' WHERE id='$id'");
	//$next = 'location:sayuran_rst.php?cbokel=';
	//$awal = $next.$kode;
	//header($awal);
	echo"<script>window.alert('Data Berhasil Diupdate!');window.location=('peternakan.php');</script>";		
?>