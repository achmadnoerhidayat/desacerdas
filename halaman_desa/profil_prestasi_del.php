<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$modal=mysqli_query($koneksi,"Delete FROM tbprestasi WHERE id='$id'");
	header('location:prestasi.php');
?>