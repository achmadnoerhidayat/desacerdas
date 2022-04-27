<?php 
	include "config/koneksi.php";

    function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	
	$txttgl = ubahformatTgl($_POST['txttgl']);
	$txtkdkel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$txttahun = $_POST['txttahun'];
	$txtvol = $_POST['txtvol'];
	$txtbiaya = $_POST['txtbiaya'];
	$txtlok = $_POST['txtlok'];
	$txtket = $_POST['txtket'];
	
	mysqli_query($koneksi,"INSERT INTO tbinventaris 
				(kode, tahun, volume, biaya, lokasi, keterangan, nama, tanggal)
				VALUES 
				('$txtkdkel','$txttahun','$txtvol','$txtbiaya','$txtlok','$txtket','$txtnm','$txttgl')");
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('adm_inventaris_input.php');</script>";
?>
