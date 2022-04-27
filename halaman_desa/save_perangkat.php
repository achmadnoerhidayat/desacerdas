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
 
 	$txtkdkel = $_POST['txtkdkel'];
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
		if($txtno2=='') {
			mysqli_query($koneksi,"INSERT INTO tbperangkat 
								(nama, id_jk, tempat_lhr, tgl_lhr, id_agama, nap, nip, 
								id_jabatan, pangkat, no_pengangkatan, tgl_pengangkatan, 
								no_berhenti, tgl_berhenti, keterangan, kd_pendidikan, 
								file_photo, file_name, kode) 
								VALUES 
								('$txtnm','$cbojk','$txttempat','$txttgl','$cboagama','$txtnap','$txtnip',
								'$cbojbt','$txtpangkat','$txtno1','$txttgl1',
								'','','$txtket','$cbopendidikan','$foto_save','$name','$txtkdkel')");			
		} else {
			mysqli_query($koneksi,"INSERT INTO tbperangkat 
								(nama, id_jk, tempat_lhr, tgl_lhr, id_agama, nap, nip, 
								id_jabatan, pangkat, no_pengangkatan, tgl_pengangkatan, 
								no_berhenti, tgl_berhenti, keterangan, kd_pendidikan, 
								file_photo, file_name, kode) 
								VALUES 
								('$txtnm','$cbojk','$txttempat','$txttgl','$cboagama','$txtnap','$txtnip',
								'$cbojbt','$txtpangkat','$txtno1','$txttgl1',
								'$txtno2','$txttgl2','$txtket','$cbopendidikan','$foto_save','$name','$txtkdkel')");			
		}

        header('location:perangkat.php');
?>