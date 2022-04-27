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


	mysqli_query($koneksi,"UPDATE tbtpa SET 
				nm_tpa='$txtnm',lokasi_tpa='$txtlok',luas_tpa='$txtluas',kapasitas_tpa='$txtkapasitas',
				sampah_masuk='$txtmasuk',sampah_diproses='$txtangkut',keterangan='$txtket' WHERE id='$id'");

	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('tpa.php');</script>";
?>