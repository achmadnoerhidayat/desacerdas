<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];
	
	$cbojns = $_POST['cbojns'];
	$txtproduksi = $_POST['txtproduksi'];
	$txtpermintaan = $_POST['txtpermintaan'];

	mysqli_query($koneksi,"UPDATE tbperikanan 
							SET kd_ikan='$cbojns', produksi='$txtproduksi', permintaan='$txtpermintaan' WHERE id='$id'");
	//$next = 'location:perikanan_rst.php?cbokel=';
	//$awal = $next.$kode;
	//header($awal);
	echo"<script>window.alert('Data Berhasil Diubah!');window.location=('perikanan.php');</script>";
?>