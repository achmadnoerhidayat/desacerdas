<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbumkm WHERE id='$id'");

	header('location:umkm_daftar.php');
?>