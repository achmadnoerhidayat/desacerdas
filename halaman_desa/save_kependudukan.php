<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
 // Data Diri
	$kd = $_POST['txtkdkel'];
	$txtnik = $_POST['txtnik'];
	$txtkk = $_POST['txtkk'];
	$txtnm = $_POST['txtnm'];
	$cbojk = $_POST['cbojk'];
	$txtalamat = $_POST['txtalamat'];
	$txtrt = $_POST['txtrt'];
	$txtrw = $_POST['txtrw'];
	$txttempatlhr = $_POST['txttempatlhr'];
	$txtgllahir = $_POST['txtgllahir'];
	$cbostatus = $_POST['cbostatus'];
	$cboagama = $_POST['cboagama'];
	$cbodarah = $_POST['cbodarah'];
	$cbopekerjaan = $_POST['cbopekerjaan'];
	$cbowarga = $_POST['cbowarga'];
	$cbodukuh = $_POST['cbodukuh'];

 // Informasi Menetap Mutasi
	$menetap = $_POST['txtmenetap'];
	$ket_menetap1 = $_POST['txtket_menetap1'];
	$ket_menetap2 = $_POST['txtket_menetap2'];
	$ket_menetap3 = $_POST['txtket_menetap3'];
	$ket_menetap4 = $_POST['txtket_menetap4'];
	
 // Kepemilikan E-KTP dan Dokumen	
	$ktp = $_POST['txtktp'];
	$ket_ktp1 = $_POST['txtket_ktp1'];
	$ket_ktp2 = $_POST['txtket_ktp2'];
	$txtpassport = $_POST['txtpassport'];
	$txtkitap = $_POST['txtkitap'];

 // Data Keluarga	
	$txtnikayah = $_POST['txtnikayah'];
	$txtnmayah = $_POST['txtnmayah'];
	$txtnikibu = $_POST['txtnikibu'];
	$txtnmibu = $_POST['txtnmibu'];
	$txtniksuami = $_POST['txtniksuami'];
	$txtnmsuami = $_POST['txtnmsuami'];
	
	mysqli_query($koneksi,"INSERT INTO tbpenduduk 
						(kode, nik, kk, nama, id_jk, alamat, rt, rw, 
						tempat_lhr, tgl_lhr, id_status_kawin, id_agama, id_gol_darah, 
						kd_pekerjaan, id_warga, id_dukuh, 
						menetap, menetap_ket1, menetap_ket2, menetap_ket3, menetap_ket4, 
						ktp, ktp_ket1, ktp_ket2, passport, kitap, 
						nik_ayah, nm_ayah, nik_ibu, nm_ibu, nik_suami_istri, nm_suami_istri) 	
						VALUES 
						('$kd','$txtnik','$txtkk','$txtnm','$cbojk','$txtalamat','$txtrt','$txtrw',
						'$txttempatlhr','$txtgllahir','$cbostatus','$cboagama','$cbodarah',
						'$cbopekerjaan','$cbowarga','$cbodukuh',
						'$menetap','$ket_menetap1','$ket_menetap2','$ket_menetap3','$ket_menetap4',
						'$ktp','$ket_ktp1','$ket_ktp2','$txtpassport','$txtkitap',
						'$txtnikayah','$txtnmayah','$txtnikibu','$txtnmibu','$txtniksuami','$txtnmsuami')");
						
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('penduduk_input.php');</script>";
?>