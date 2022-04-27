<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbperikanan_cabang WHERE id='$id'");

	header('location:perikanan_cabang.php');
?>