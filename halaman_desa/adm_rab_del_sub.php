<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$cari_kd=mysqli_query($koneksi,"SELECT kode_rab, no_anggaran FROM tbrab_sub WHERE id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$kode_rab=$tm_cari['kode_rab'];
	$no_anggaran=$tm_cari['no_anggaran'];
	
	$modal=mysqli_query($koneksi,"Delete FROM tbrab_sub WHERE id='$id'");
	$modal=mysqli_query($koneksi,"Delete FROM tbrab_detail WHERE kode_rab='$kode_rab' and no_anggaran='$no_anggaran'");

	$next = 'location:adm_rab_edit_sub.php?id=';
	$awal = $next.$kode_rab;
	header($awal);
?>