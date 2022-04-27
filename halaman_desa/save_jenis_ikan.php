<?php 
	include "config/koneksi.php";
	include "funcion_jenis_ikan.php";
	$LastID=FormatNoTrans(OtomatisID());

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$txtjenis = $_POST['txtjenis'];


	mysqli_query($koneksi,"INSERT INTO tbjenis_ikan (kode, nama) VALUES ('$LastID','$txtjenis')");
  	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('jenis_ikan.php');</script>";
?>