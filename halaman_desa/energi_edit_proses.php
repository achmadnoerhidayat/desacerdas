<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];
	//$kode = $_POST['txtkdkel'];

	$txtjns = $_POST['txtjns'];
	$txtlok = $_POST['txtlok'];
	$txtpotensi = $_POST['txtpotensi'];
	$txtkapasitas = $_POST['txtkapasitas'];
	$txtpengelola = $_POST['txtpengelola'];
	$txtpemanfaatan = $_POST['txtpemanfaatan'];

	mysqli_query($koneksi,"UPDATE tbenergi 
				SET jenis_energi='$txtjns', lokasi='$txtlok', potensi='$txtpotensi', kapasitas='$txtkapasitas', 
				pengelola='$txtpengelola', pemanfaatan='$txtpemanfaatan' WHERE id='$id'");
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('energi.php');</script>";
?>