<?php 
	include "config/koneksi.php";
	include "funcion_donasi.php";
	$LastID=FormatNoTrans(OtomatisID());
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
  
 	$kdkel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$txtpenggalang = $_POST['txtpenggalang'];
	$txtnorek = $_POST['txtnorek'];
	$txtnmrek = $_POST['txtnmrek'];
	$txtbank = $_POST['txtbank'];
	//$txtket = $_POST['txtket'];
					
	mysqli_query($koneksi,"INSERT INTO tbdonasi 
				(kd_donasi, nm_donasi, penggalang, norek, nm_rek, bank, keterangan, kode, tgl_input, jam_input, user_id) 
				VALUES 
				('$LastID','$txtnm','$txtpenggalang','$txtnorek','$txtnmrek','$txtbank','','$kdkel','$tgl_skr','$waktuaja_skr','')");

	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('donasi_input.php');</script>";
?>