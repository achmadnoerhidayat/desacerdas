<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtid']; 
	if(!empty($_FILES["gambar1"]["tmp_name"])){
		$temp = $_FILES['gambar1']['tmp_name'];
		$name = basename( $_FILES['gambar1']['name']) ;
		$size = $_FILES['gambar1']['size'];
		$type = $_FILES['gambar1']['type'];
		$foto = $folder.$name;	

		//if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
			move_uploaded_file($temp, $folder . $name);
			mysqli_query($koneksi,"UPDATE tbprofil SET peta_dukuh='$foto', peta_dukuh_name='$name' WHERE kode='$cbokel'");
			echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('peta.php');</script>";
		//}else{
			//echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
		//}
	}
?>