<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$modal=mysqli_query($koneksi,"Delete FROM tbpengurus_rt WHERE id='$id'");
	unlink('../file_upload/'.$file_name);
	header('location:pengurus_rt.php');
?>