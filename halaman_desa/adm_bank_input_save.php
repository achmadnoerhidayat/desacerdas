<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}

	$txttgl = ubahformatTgl($_POST['txttgl']);	
	$txtkdkel = $_POST['txtkdkel'];
	$txttahun = $_POST['txttahun'];
	$cbobln = $_POST['cbobln'];
	$txturaian = $_POST['txturaian'];
	$txt1 = $_POST['txt1'];
	$txt2 = $_POST['txt2'];
	$txt3 = $_POST['txt3'];
	$txt4 = $_POST['txt4'];
	$txt5 = $_POST['txt5'];
	
	$temp = $_FILES['gambar']['tmp_name'];
	$name = basename( $_FILES['gambar']['name']) ;
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
	$foto = $folder.$name;		
	
	move_uploaded_file($temp, $folder . $name);
	mysqli_query($koneksi,"INSERT INTO tbbank 
				(kode, tahun, bulan, tgl_trx, uraian_trx, setoran, bunga, penarikan, pajak, adm, file_photo, file_name) 
				VALUES 
				('$txtkdkel','$txttahun','$cbobln','$txttgl','$txturaian','$txt1','$txt2','$txt3','$txt4','$txt5',
				'$foto','$name')");
							
	header('location:adm_bank.php');
?>