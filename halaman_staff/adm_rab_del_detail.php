<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
																			
	$cari_kd=mysqli_query($koneksi,"SELECT kode_rab FROM tbrab_detail WHERE id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$kode_rab=$tm_cari['kode_rab'];
	
	$modal=mysqli_query($koneksi,"Delete FROM tbrab_detail WHERE id='$id'");

	$next = 'location:adm_rab_edit_detail.php?id=';
	$awal = $next.$kode_rab;
	header($awal);
?>