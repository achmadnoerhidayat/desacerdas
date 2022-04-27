<?php
	include "config/koneksi.php";
	$id=$_GET['id'];

	$cari_kd=mysqli_query($koneksi,"SELECT id_modul FROM tbsoal WHERE id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$id_modul=$tm_cari['id_modul'];
	
	$modal=mysqli_query($koneksi,"Delete FROM tbsoal WHERE id='$id'");
	$modal=mysqli_query($koneksi,"DELETE FROM tbsoal_pilihan WHERE id_soal='$id'");

	$next = 'location:soal.php?id=';
	$awal = $next.$id_modul;
	header($awal);
?>