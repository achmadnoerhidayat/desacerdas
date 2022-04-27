<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];
	//$cbokel = $_POST['cbokel'];
	$cbojns = $_POST['cbojns'];
	$txtpotensi = $_POST ['txtpotensi'];
	$txtpemanfaatan = $_POST['txtpemanfaatan'];

	mysqli_query($koneksi,"UPDATE tbperikanan_cabang 
							SET kd_cabang='$cbojns', potensi='$txtpotensi', pemanfaatan='$txtpemanfaatan' 
							WHERE id='$id'");
	//$next = 'location:perikanan_rst.php?cbokel=';
	//$awal = $next.$kode;
	//header($awal);
	echo"<script>window.alert('Data Berhasil Diubah!');window.location=('perikanan_cabang.php');</script>";
?>