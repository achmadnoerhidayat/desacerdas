<?php 
	include "config/koneksi.php";


 	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}

	$txttgl = ubahformatTgl($_POST['txttgl']);
	$id = $_POST['txtid'];
	$txtnm = $_POST['txtnm'];
	$txttahun = $_POST['txttahun'];
	$txtvol = $_POST['txtvol'];
	$txtbiaya = $_POST['txtbiaya'];
	$txtlok = $_POST['txtlok'];
	$txtket = $_POST['txtket'];
	
	mysqli_query($koneksi,"UPDATE tbinventaris SET 
						tahun='$txttahun', volume='$txtvol', biaya='$txtbiaya', lokasi='$txtlok', keterangan='$txtket', 
						nama='$txtnm', tanggal='$txttgl'
						WHERE id='$id'");

	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('adm_inventaris.php');</script>";
?>
