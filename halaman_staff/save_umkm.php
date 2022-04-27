<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$waktuaja_skr=date('h:i');
 	$folder="../file_upload/";

	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	
	$txttgl = ubahformatTgl($_POST['txttgllahir']);
	$kd = $_POST['txtkdkel'];
	$txtnik = $_POST['txtnik'];
	$txtnm = $_POST['txtnm'];
	$txttempatlhr = $_POST['txttempatlhr'];
	$cbojk = $_POST['cbojk'];
	$cbodukuh = $_POST['cbodukuh'];
	$cbort = $_POST['cbort'];
	$txtrw = $_POST['txtrw'];
	
	$txtumkm = $_POST['txtumkm'];
	$txttlp = $_POST['txttlp'];
	$cbodukuh1 = $_POST['cbodukuh1'];
	$cbort1 = $_POST['cbort1'];
	$txtrw1 = $_POST['txtrw1'];
	$txtdeskripsi = $_POST['txtdeskripsi'];
	
$name1=$_POST['txtberkas1_nm'];	
$foto1=$_POST['txtberkas1_foto'];
	
$name2=$_POST['txtberkas2_nm'];	
$foto2=$_POST['txtberkas2_foto'];

$name3=$_POST['txtberkas3_nm'];	
$foto3=$_POST['txtberkas3_foto'];

// -- Cover ------
	$temp = $_FILES['id-input-file-4']['tmp_name'];
    $name = basename( $_FILES['id-input-file-4']['name']) ;
    $size = $_FILES['id-input-file-4']['size'];
    $type = $_FILES['id-input-file-4']['type'];
	$foto = $folder.$name;		



        	move_uploaded_file($temp, $folder . $name);

		$sql_insert="INSERT INTO tbumkm 
					(kode, nik, nama, tempat_lhr, tgl_lhr, id_jk, id_dukuh, id_rt, rw, 
					nama_umkm, no_tlp, id_dukuh1, id_rt1, rw1, deskripsi, file_cover, file_cover_name, 
					file_berkas1, file_berkas1_name, file_berkas2, file_berkas2_name, file_berkas3, file_berkas3_name) 
					VALUES 
					('$kd','$txtnik','$txtnm','$txttempatlhr','$txttgl','$cbojk','$cbodukuh','$cbort','$txtrw',
					'$txtumkm','$txttlp','$cbodukuh1','$cbort1','$txtrw1','$txtdeskripsi','$foto','$name',
					'$foto1','$name1','$foto2','$name2','$foto3','$name3')";
		mysqli_query($koneksi,$sql_insert);
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('umkm_daftar.php');</script>";
	//} else {
       		//echo "<b>Gagal Upload, Ada File yang ukuran size dan type nya tidak sesuai!</b>";
	//}







    //if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {


		//echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('umkm_daftar.php');</script>";
    //}else{
       // echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
    //}
?>