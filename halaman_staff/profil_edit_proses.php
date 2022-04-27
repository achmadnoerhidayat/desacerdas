<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtid'];
	$txtkdpos = $_POST['txtkdpos'];
	$txtluas = $_POST['txtluas'];
    $txtjmlp = $_POST['txtjmlp'];
    $txtpadat = $_POST['txtpadat'];

	    $txtlat = $_POST['txtlat'];
	    $txtlong = $_POST['txtlong'];			
 
	if(!empty($_FILES["gambar"]["tmp_name"])){
		$temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;	

		//if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
			move_uploaded_file($temp, $folder . $name);
			mysqli_query($koneksi,"UPDATE tbprofil SET 
									kd_pos='$txtkdpos', luas='$txtluas', jmlp='$txtjmlp', padat='$txtpadat', 
									file_peta='$foto', file_name='$name', lat_desa='$txtlat', long_desa='$txtlong' 
									WHERE kode='$cbokel'");
			echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('profil.php');</script>";
		//}else{
			//echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
		//}
	} else {
		mysqli_query($koneksi,"UPDATE tbprofil SET 
									kd_pos='$txtkdpos', luas='$txtluas', jmlp='$txtjmlp', padat='$txtpadat', lat_desa='$txtlat', long_desa='$txtlong' WHERE kode='$cbokel'");
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('profil.php');</script>";
	}
?>