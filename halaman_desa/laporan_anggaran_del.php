<?php
	include "config/koneksi.php";
	$id=$_GET['id'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT file_berkas FROM tblaporan_anggaran WHERE id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$file_berkas=$tm_cari['file_berkas'];
	
	$modal=mysqli_query($koneksi,"Delete FROM tblaporan_anggaran WHERE id='$id'");
	unlink('../file_upload/'.$file_berkas);
	header('location:laporan_anggaran.php');
?>