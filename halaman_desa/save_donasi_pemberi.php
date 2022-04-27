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
 	$txtkd = $_POST['txtkd'];
	$txtnm = $_POST['txtnm'];
	$txtjml = $_POST['txtjml'];
	$txtnorek = $_POST['txtnorek'];
	$txtnmrek = $_POST['txtnmrek'];
	$txtbank = $_POST['txtbank'];
	$txtmode = $_POST['txtmode'];
					
	mysqli_query($koneksi,"INSERT INTO tbdonasi_pemberi 
				(kd_donasi, nama, jumlah, tanggal, bank, norek, nmrek, mode) 
				VALUES 
				('$txtkd','$txtnm','$txtjml','$txttgl','$txtbank','$txtnorek','$txtnmrek','$txtmode')");

	$next = 'location:donasi_detail.php?kd=';
	$awal = $next.$txtkd;
	header($awal);
?>