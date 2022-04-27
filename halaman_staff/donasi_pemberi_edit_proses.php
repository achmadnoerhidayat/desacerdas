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
	$kd_donasi = $_POST['txtkd'];
	$txtnm = $_POST['txtnm'];
	$txtjml = $_POST['txtjml'];
	$txtnorek = $_POST['txtnorek'];
	$txtnmrek = $_POST['txtnmrek'];
	$txtbank = $_POST['txtbank'];
	$txtmode = $_POST['txtmode'];
					
	mysqli_query($koneksi,"UPDATE tbdonasi_pemberi 
							SET nama='$txtnm', jumlah='$txtjml', tanggal='$txttgl', bank='$txtbank', 
							norek='$txtnorek', nmrek='$txtnmrek', mode='$txtmode' 
							WHERE id='$id'");
				
	$next = 'location:donasi_detail.php?kd=';
	$awal = $next.$kd_donasi;
	header($awal);
?>