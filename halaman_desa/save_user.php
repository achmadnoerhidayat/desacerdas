<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$txtnip = $_POST['txtnip'];
	$txtnm = $_POST['txtnm'];
	$txtpwd = $_POST['txtpwd'];
	$cbolevel = $_POST['cbolevel'];
	$txtuser = $_POST['txtuser'];
	$txtemail = $_POST['txtemail'];
		
	mysqli_query($koneksi,"INSERT INTO tbuser 
				(nip, nama, password, level_akses, status_aktif, kode_wilayah, email, user_name) 
				VALUES 
				('$txtnip','$txtnm','$txtpwd','$cbolevel','1','$cbokel','$txtemail','$txtuser')");
  	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('user.php');</script>";
?>