<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$cari_kd=mysqli_query($koneksi,"SELECT kode FROM tbprogram where id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$kode=$tm_cari['kode'];

	$modal=mysqli_query($koneksi,"Delete FROM tbprogram WHERE id='$id'");

	$next = 'location:profil_program.php?cbokel=';
	$awal = $next.$kode;
	header($awal);
?>