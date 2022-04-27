<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];
	//$cbokel = $_POST['cbokel'];
	$cbojns = $_POST['cbojenis'];
	$txtltanam = $_POST['txtltanam'];
	$txtlpanen = $_POST['txtlpanen'];
	$txtproduksi = $_POST['txtproduksi'];
	$txtproduktivitas = $_POST['txtproduktivitas'];

	mysqli_query($koneksi,"UPDATE tbpertanian SET kd_tumbuhan='$cbojns', luas_tanam='$txtltanam', 
				luas_panen='$txtlpanen', produksi='$txtproduksi', produktivitas='$txtproduktivitas' WHERE id='$id'");
	//$next = 'location:pangan_rst.php?cbokel=';
	//$awal = $next.$kode;
	//header($awal);
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('pangan.php');</script>";
?>