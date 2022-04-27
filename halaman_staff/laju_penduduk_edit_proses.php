<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];
	$txt1 = $_POST['txt1'];
	$txt2 = $_POST['txt2'];
	
	mysqli_query($koneksi,"UPDATE tblajupenduduk SET tahun='$txt1', laju='$txt2' WHERE id='$id'");

	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('laju_penduduk.php');</script>";
?>