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
	$txttahun = $_POST['txttahun'];
	$txtnama = $_POST['txtnm'];
	$txtumur = $_POST['txtumur'];
	$cbojk = $_POST['cbojk'];
	$txtalamat = $_POST['txtalamat'];
	$txtpendidikan = $_POST['txtpendidikan'];
	$txtbidang = $_POST['txtbidang'];
	$txtket = $_POST['txtket'];
	
	mysqli_query($koneksi,"UPDATE tbkader SET 
						tahun='$txttahun', nama='$txtnama', umur='$txtumur', id_jk='$cbojk', 
						pendidikan='$txtpendidikan', bidang='$txtbidang', alamat='$txtalamat', keterangan='$txtket', 
						tanggal='$txttgl' 
						WHERE id='$id'");

	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('adm_kader.php');</script>";
?>