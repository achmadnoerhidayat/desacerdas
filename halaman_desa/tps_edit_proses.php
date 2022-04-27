<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];
	//$kode = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$txtlok = $_POST['txtlok'];
	$txtluas = $_POST['txtluas'];
	$txtkapasitas = $_POST['txtkapasitas'];
	$txtmasuk = $_POST['txtmasuk'];
	$txtangkut = $_POST['txtangkut'];
	$txtket = $_POST['txtket'];


	mysqli_query($koneksi,"UPDATE tbtps SET 
				nm_tps='$txtnm',lokasi_tps='$txtlok',luas_tps='$txtluas',kapasitas_tps='$txtkapasitas',
				sampah_masuk='$txtmasuk',sampah_diangkat='$txtangkut',keterangan='$txtket' WHERE id='$id'");
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('tps.php');</script>";
?>