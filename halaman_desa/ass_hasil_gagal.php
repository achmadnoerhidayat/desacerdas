<?php
	include "config/koneksi.php";
	$id_ujian=$_GET['id'];	
	$modal=mysqli_query($koneksi,"UPDATE tbujian SET status='Remedial' WHERE id_ujian='$id_ujian'");
	header('location:ass_hasil.php');
?>