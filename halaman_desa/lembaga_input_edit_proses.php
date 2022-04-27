<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
 
 	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	
	$id = $_POST['txtid'];	
	$txttgl1 = ubahformatTgl($_POST['txttgl1']);
	$txttgl2 = ubahformatTgl($_POST['txttgl2']);
	$txtnm = $_POST['txtnm'];
	$cbokat = $_POST['cbokat'];
	$txtdeskripsi = $_POST['txtdeskripsi'];
	$txtnmp = $_POST['txtnmp'];
	$cbojbt = $_POST['cbojbt'];

	if(!empty($_FILES["gambar"]["tmp_name"])){
		$temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;	

		if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
			move_uploaded_file($temp, $folder . $name);
			mysqli_query($koneksi,"UPDATE tblembaga 
					SET nm_lembaga='$txtnm', kd_kategori='$cbokat', 
					wewenang='$txtdeskripsi', nm_pengurus='$txtnmp', kd_jabatan='$cbojbt', mulai='$txttgl1', sampai='$txttgl2', 
					file_photo='$foto', file_name='$name' 
					WHERE id='$id'");
			header('location:lembaga_daftar.php');
		}else{
			echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
		}
	} else {
		mysqli_query($koneksi,"UPDATE tblembaga 
				SET nm_lembaga='$txtnm', kd_kategori='$cbokat', 
				wewenang='$txtdeskripsi', nm_pengurus='$txtnmp', kd_jabatan='$cbojbt', mulai='$txttgl1', sampai='$txttgl2' 
				WHERE id='$id'");
        header('location:lembaga_daftar.php');				
	}
?>