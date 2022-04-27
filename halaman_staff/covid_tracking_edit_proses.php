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
	$id = $_POST['txtid'];
	$txtinfo = $_POST['txtinfo'];
	$txtlok = $_POST['txtlok'];
	$txtestimasi = $_POST['txtestimasi'];
	$txtnm = $_POST['txtnm'];

	$txtlat = $_POST['txtlat'];
	$txtlong = $_POST['txtlong'];	

	mysqli_query($koneksi,"UPDATE tbtracking SET tgl='$txttgl', lokasi='$txtlok', estimasi='$txtestimasi', info='$txtinfo', 
							nama='$txtnm', _lat='$txtlat', _long='$txtlong' WHERE id='$id'");
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('covid_tracking.php');</script>";
?>
