<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');

	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	$txttgl = ubahformatTgl($_POST['txttgl']);
	$txtkdkel = $_POST['txtkdkel'];
	$txt1 = $_POST['txt1'];
	$txt2 = $_POST['txt2'];
	$txt3 = $_POST['txt3'];
	$txt4 = $_POST['txt4'];
	$txt5 = $_POST['txt5'];
	$txt6 = $_POST['txt6'];
	$txt7 = $_POST['txt7'];
	$txt8 = $_POST['txt8'];
	
	mysqli_query($koneksi,"INSERT INTO tbcovid (kode, tgl, suspect, probable, positif, perawatan, meninggal, sembuh, otg, isoman) 
				VALUES 
				('$txtkdkel','$txttgl','$txt1','$txt2','$txt3','$txt4','$txt5','$txt6','$txt7','$txt8')");
							
			echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('covid_update.php');</script>";
?>