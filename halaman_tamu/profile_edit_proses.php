<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	include "config/koneksi.php";
		$folder="../file_upload/";
	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	$txttgl = ubahformatTgl($_POST['txttgllahir']);	
	$txtnip = $_POST['txtnip'];
	$txtkk = $_POST['txtkk'];
	$txtnm = $_POST['txtnm'];
	$txtnmuser = $_POST['txtnmuser'];
	$txtemail = $_POST['txtemail'];
	$cbolevel = $_POST['cbolevel'];
	$txtjabatan = $_POST['txtjabatan'];
	$txttempatlhr = $_POST['txttempatlhr'];
	$cbojk = $_POST['cbojk'];
	$cbodarah = $_POST['cbodarah'];
	$txtalamat = $_POST['txtalamat'];
	$txtrt = $_POST['txtrt'];
	$txtrw = $_POST['txtrw'];
	$cboagama = $_POST['cboagama'];
	$cbostatus = $_POST['cbostatus'];

	if(!empty($_FILES["gambar"]["tmp_name"])){
		$temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;	
		
		move_uploaded_file($temp, $folder . $name);
		$sql_string="UPDATE tbuser 
					SET nama='$txtnm',level_akses='$cbolevel',email='$txtemail',user_name='$txtnmuser',no_kk='$txtkk',
					jabatan='$txtjabatan',tempat_lahir='$txttempatlhr',tgl_lahir='$txttgl',id_jk='$cbojk',id_darah='$cbodarah',
					alamat='$txtalamat',rt='$txtrt',rw='$txtrw',id_agama='$cboagama',id_status='$cbostatus', 
					file_photo='$foto', file_name='$name' 
					WHERE nip='$txtnip'";
		mysqli_query($koneksi,$sql_string);
		echo"<script>window.alert('Data User Berhasil diubah');window.location=('index.php');</script>";	
	} else {
		$sql_string="UPDATE tbuser 
					SET nama='$txtnm',level_akses='$cbolevel',email='$txtemail',user_name='$txtnmuser',no_kk='$txtkk',
					jabatan='$txtjabatan',tempat_lahir='$txttempatlhr',tgl_lahir='$txttgl',id_jk='$cbojk',id_darah='$cbodarah',
					alamat='$txtalamat',rt='$txtrt',rw='$txtrw',id_agama='$cboagama',id_status='$cbostatus' 
					WHERE nip='$txtnip'";
		mysqli_query($koneksi,$sql_string);
		echo"<script>window.alert('Data User Berhasil diubah');window.location=('index.php');</script>";
	}
?>