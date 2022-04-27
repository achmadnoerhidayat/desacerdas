<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$cbojns = $_POST['cbojns'];
	$txtpotensi = $_POST ['txtpotensi'];
	$txtpemanfaatan = $_POST['txtpemanfaatan'];

	mysqli_query($koneksi,"INSERT tbperikanan_cabang (kode, kd_cabang, potensi, pemanfaatan) 
				VALUES ('$cbokel','$cbojns','$txtpotensi','$txtpemanfaatan')");
	//$next = 'location:perikanan_cabang_rst.php?cbokel=';
	//$awal = $next.$kd;
	//header($awal);
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('perikanan_cabang.php');</script>";
?>