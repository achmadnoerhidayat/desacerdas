<?php
	include "config/koneksi.php";
	$id=$_GET['txtid'];
	$txtform=$_GET['txtform'];
	
	$cari_kd=mysqli_query($koneksi,"select nik from tbpenduduk WHERE id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nik=$tm_cari['nik'];
	
	$modal=mysqli_query($koneksi,"Delete FROM tbpenduduk WHERE id='$id'");
	$modal=mysqli_query($koneksi,"Delete FROM tbpenduduk_saudara where nik='$nik'");
	$modal=mysqli_query($koneksi,"Delete FROM tbpenduduk_anak where nik='$nik'");
	
	if($txtform=='1') {
		header('location:penduduk_daftar01.php');
	}
	if($txtform=='2') {
		header('location:penduduk_daftar02.php');
	}
	if($txtform=='3') {
		header('location:penduduk_daftar03.php');
	}
	if($txtform=='4') {
		header('location:penduduk_daftar04.php');
	}
	if($txtform=='5') {
		header('location:penduduk_daftar05.php');
	}
	if($txtform=='6') {
		header('location:penduduk_daftar06.php');
	}
	if($txtform=='7') {
		header('location:penduduk_daftar07.php');
	}
	if($txtform=='8') {
		header('location:penduduk_daftar08.php');
	}
	if($txtform=='9') {
		header('location:penduduk_daftar09.php');
	}
	if($txtform=='10') {
		header('location:penduduk_daftar10.php');
	}
	if($txtform=='11') {
		header('location:penduduk_daftar11.php');
	}
	if($txtform=='12') {
		header('location:penduduk_daftar12.php');
	}
	if($txtform=='13') {
		header('location:penduduk_daftar13.php');
	}
	if($txtform=='14') {
		header('location:penduduk_daftar14.php');
	}
?>