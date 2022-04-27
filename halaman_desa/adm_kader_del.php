<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbkader WHERE id='$id'");
	echo"<script>window.alert('Data Berhasil Dihapus!');window.location=('adm_kader.php');</script>";
?>