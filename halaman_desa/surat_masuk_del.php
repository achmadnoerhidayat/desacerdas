<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbsurat_masuk WHERE id='$id'");

	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('adm_surat_masuk.php');</script>";
?>