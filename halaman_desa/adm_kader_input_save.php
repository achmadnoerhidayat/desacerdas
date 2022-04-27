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
	$txttahun = $_POST['txttahun'];
	$txtnama = $_POST['txtnm'];
	$txtumur = $_POST['txtumur'];
	$cbojk = $_POST['cbojk'];
	$txtalamat = $_POST['txtalamat'];
	$txtpendidikan = $_POST['txtpendidikan'];
	$txtbidang = $_POST['txtbidang'];
	$txtket = $_POST['txtket'];
	
	mysqli_query($koneksi,"INSERT INTO tbkader 
					(kode, tahun, nama, umur, id_jk, pendidikan, bidang, alamat, keterangan, tanggal) 
				VALUES 
					('$txtkdkel','$txttahun','$txtnama','$txtumur','$cbojk','$txtpendidikan','$txtbidang','$txtalamat','$txtket','$txttgl')");
							
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('adm_kader_input.php');</script>";
?>