<?php 
	include "config/koneksi.php";
	include "funcion_jenis_tanaman.php";
	$LastID=FormatNoTrans(OtomatisID());

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$txtjenis = $_POST['txtjenis'];
	$cbojenis = $_POST['cbojenis'];

	mysqli_query($koneksi,"INSERT INTO tbjenis_tanaman (kode, nama, kelompok) VALUES ('$LastID','$txtjenis','$cbojenis')");
  	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('jenis_tanaman.php');</script>";
?>