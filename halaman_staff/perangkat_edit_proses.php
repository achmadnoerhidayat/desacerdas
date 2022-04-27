<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
 function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	
	$txttgl1 = ubahformatTgl($_POST['txttgl1']);
	$txttgl2 = ubahformatTgl($_POST['txttgl2']);	
	$txttgl = ubahformatTgl($_POST['txttgl']);
	
	$id = $_POST['txtid'];
	$txtnm = $_POST['txtnm'];
	$txtnap = $_POST['txtnap'];
	$txtnip = $_POST['txtnip'];
 	$txttempat = $_POST['txttempat'];
	$cbojk = $_POST['cbojk'];
	$cboagama = $_POST['cboagama'];
	$cbojbt = $_POST['cbojbt'];
	$txtpangkat = $_POST['txtpangkat'];
	$cbopendidikan = $_POST['cbopendidikan'];
	$txtno1 = $_POST['txtno1'];
	$txtno2 = $_POST['txtno2'];
	$txtket = $_POST['txtket'];
	if($txtno2=='') {
		$txttgl2="";
	}
	
	$foto_save="";
	if(!empty($_FILES["gambar"]["tmp_name"])){
		$temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;	
		
		move_uploaded_file($temp, $folder . $name);
		$foto_save=$folder.$name;
	}
					
		mysqli_query($koneksi,"UPDATE tbperangkat SET 
		nama='$txtnm', id_jk='$cbojk', tempat_lhr='$txttempat', id_agama='$cboagama', nap='$txtnap', nip='$txtnip', 
		id_jabatan='$cbojbt', pangkat='$txtpangkat', no_pengangkatan='$txtno1', 
		no_berhenti='$txtno2', keterangan='$txtket', kd_pendidikan='$cbopendidikan', 
		file_photo='$foto_save', file_name='$name', 
		tgl_pengangkatan='$txttgl1', tgl_berhenti='$txttgl2', tgl_lhr='$txttgl' WHERE id='$id'");
        header('location:perangkat.php');

	
?>