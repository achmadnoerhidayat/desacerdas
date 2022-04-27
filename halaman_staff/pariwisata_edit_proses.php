<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$id = $_POST['txtid'];
	$txtnm = $_POST['txtnm'];
	$txtjml = $_POST['txtjml'];
	$txtpemasukan = $_POST['txtpemasukan'];
	$txtket = $_POST['txtket'];
	$txtpengelola = $_POST['txtpengelola'];

	if(!empty($_FILES["gambar"]["tmp_name"])){
		$temp = $_FILES['gambar']['tmp_name'];
    $name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;	

		if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
			move_uploaded_file($temp, $folder . $name);
			mysqli_query($koneksi,"UPDATE tbpariwisata SET 
									nama_wisata='$txtnm', 
									jml_pengunjung='$txtjml', pemasukan='$txtpemasukan', keterangan='$txtket', pengelola='$txtpengelola', 
									file_photo='$foto', file_name='$name' 
									WHERE id='$id'");
			echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('pariwisata.php');</script>";
		}else{
			echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
		}
	} else {
		mysqli_query($koneksi,"UPDATE tbpariwisata SET 
								nama_wisata='$txtnm', 
								jml_pengunjung='$txtjml', pemasukan='$txtpemasukan', keterangan='$txtket', pengelola='$txtpengelola' 
								WHERE id='$id'");
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('pariwisata.php');</script>";
	}
?>