<?php
	include "config/koneksi.php";
	$id=$_GET['id'];
		//$id=$_POST['id'];

	$cari_kd=mysqli_query($koneksi,"SELECT foto_berita FROM tbberita WHERE id_berita='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$file_name=$tm_cari['foto_berita'];
	
	$modal=mysqli_query($koneksi,"Delete FROM tbberita WHERE id_berita='$id'");
	unlink('../file_upload/'.$file_name);
	header('location:berita.php');
?>