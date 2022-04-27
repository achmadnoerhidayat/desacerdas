<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$id = $_POST['txtid'];
	$txtjudul = $_POST['txtjudul'];
	$txtpembuat = $_POST['txtpembuat'];
	$txtisi = $_POST['txtisi'];

	if(!empty($_FILES["gambar"]["tmp_name"])){
		$temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;	

		//if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
			move_uploaded_file($temp, $folder . $name);
				mysqli_query($koneksi,"UPDATE tbberita 
										SET judul='$txtjudul', pembuat='$txtpembuat', isi='$txtisi', foto_berita='$foto' 
										WHERE id_berita='$id'");
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('berita.php');</script>";
		//}else{
			//echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
		//}
	} else {
		mysqli_query($koneksi,"UPDATE tbberita 
										SET judul='$txtjudul', pembuat='$txtpembuat', isi='$txtisi' WHERE id_berita='$id'");
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('berita.php');</script>";
	}
?>