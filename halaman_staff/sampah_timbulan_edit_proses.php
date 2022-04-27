<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];
	$cbojns = $_POST['cbojns'];
	$txt1 = $_POST['txt1'];
	$txt2 = $_POST['txt2'];

	mysqli_query($koneksi,"UPDATE tbtimbulan 
				SET id_sumber='$cbojns', vol='$txt1', berat='$txt2' WHERE id='$id'");
	//$next = 'location:sayuran_rst.php?cbokel=';
	//$awal = $next.$kode;
	//header($awal);
	echo"<script>window.alert('Data Berhasil Diupdate!');window.location=('sampah_timbulan.php');</script>";		
?>