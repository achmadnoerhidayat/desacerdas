<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];
	//$cbokel = $_POST['cbokel'];
	$cbojns = $_POST['cbojenis'];
	$txtltanam = $_POST['txtltanam'];
	$txtproduksi = $_POST['txtproduksi'];

	mysqli_query($koneksi,"UPDATE tbpertanian SET kd_tumbuhan='$cbojns', luas_tanam='$txtltanam', produksi='$txtproduksi' WHERE id='$id'");
	//$next = 'location:perkebunan_rst.php?cbokel=';
	//$awal = $next.$kode;
	//header($awal);
	echo"<script>window.alert('Data Berhasil Diubah!');window.location=('perkebunan.php');</script>";		
?>