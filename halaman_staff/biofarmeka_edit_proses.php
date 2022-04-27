<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];
	//$cbokel = $_POST['cbokel'];
	$cbojns = $_POST['cbojenis'];
	$txtlpanen = $_POST['txtlpanen'];
	$txtproduksi = $_POST['txtproduksi'];

	mysqli_query($koneksi,"UPDATE tbpertanian 
				SET kd_tumbuhan='$cbojns', luas_panen='$txtlpanen', produksi='$txtproduksi' WHERE id='$id'");
	//$next = 'location:sayuran_rst.php?cbokel=';
	//$awal = $next.$kode;
	//header($awal);
	echo"<script>window.alert('Data Berhasil Diupdate!');window.location=('biofarmeka.php');</script>";		
?>