<?php 
	include "config/koneksi.php";
	//include "funcion_bansos.php";
	//$LastID=FormatNoTrans(OtomatisID());
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
  
 	$kdkel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$txtpemberi = $_POST['txtpemberi'];
	$txtbentuk = $_POST['txtbentuk'];
	$txtket = $_POST['txtket'];
	$txtkk = $_POST['txtkk'];	
	$cbostatus = $_POST['cbostatus'];
	
	mysqli_query($koneksi,"INSERT INTO tbbansos 
				(kode, nm_bansos, status, pemberi, bentuk, jml_penerima, keterangan, tgl_input, jam_input, user_id) 
				VALUES 
				('$kdkel','$txtnm','$cbostatus','$txtpemberi','$txtbentuk','$txtkk','$txtket','$tgl_skr','$waktuaja_skr','')");

	//$next = 'location:bansos.php?cbokel=';
	//$awal = $next.$kdkel;
	//header($awal);
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('bansos_input.php');</script>";
?>