<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$cari_kd=mysqli_query($koneksi,"SELECT kd_donasi FROM tbdonasi_pemberi where id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$kode=$tm_cari['kd_donasi'];

	$modal=mysqli_query($koneksi,"Delete FROM tbdonasi_pemberi WHERE id='$id'");

	$next = 'location:donasi_detail.php?kd=';
	$awal = $next.$kode;
	header($awal);
?>