<?php
	include "config/koneksi.php";
	$id=$_GET['id'];

	$modal=mysqli_query($koneksi,"DELETE FROM tbrt WHERE id_rt='$id'");
	header('location:validasi_desa.php');
?>