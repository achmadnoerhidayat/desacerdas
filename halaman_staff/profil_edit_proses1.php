<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtid'];
	$txtkdpos = $_POST['txtkdpos'];
	$txtluas = $_POST['txtluas'];
    $txtjmlp = $_POST['txtjmlp'];
    $txtpadat = $_POST['txtpadat'];
    $txtalamat = $_POST['txtalamat'];	
	
	    $txtlat = $_POST['txtlat'];
	    $txtlong = $_POST['txtlong'];		

	mysqli_query($koneksi,"UPDATE tbprofil 
							SET kd_pos='$txtkdpos', luas='$txtluas', jmlp='$txtjmlp', padat='$txtpadat', 
							alamat='$txtalamat', lat_desa='$txtlat', long_desa='$txtlong'  
							WHERE kode='$cbokel'");
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('validasi_desa.php');</script>";
?>