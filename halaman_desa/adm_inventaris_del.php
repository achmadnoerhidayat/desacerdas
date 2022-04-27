<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$modal=mysqli_query($koneksi,"Delete FROM tbinventaris WHERE id='$id'");
	echo"<script>window.alert('Data Berhasil Dihapus!');window.location=('adm_inventaris.php');</script>";
?>