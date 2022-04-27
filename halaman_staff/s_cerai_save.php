<?php 
	include "config/koneksi.php";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
    function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	
	$txttgl = ubahformatTgl($_POST['txttgllahir']); 
	$txttglcerai = ubahformatTgl($_POST['txttglcerai']); 	
	$cbokel = $_POST['txtkdkel'];
	$txtnama = $_POST['txtnama'];
	$txtnik = $_POST['txtnik'];
	$txttempatlhr = $_POST['txttempatlhr'];
	$cbojk = $_POST['cbojk'];
	$cboagama = $_POST['cboagama'];
	$cbopekerjaan = $_POST['cbopekerjaan'];
	$txtalamat = $_POST['txtalamat'];	
	$txtno = $_POST['txtno'];
	$txtnmpasutri = $_POST['txtnmpasutri'];	
	$title="SURAT KETERANGAN CERAI ".$txtnama;
	
	mysqli_query($koneksi,"INSERT INTO tbbuatsurat 
							(nomor_surat, tgl_surat, title_surat, nama, nik, id_jk, tempat_lhr, 
							tgl_lhr, id_status_kawin, id_agama, kd_pekerjaan, alamat, id_kel, id_kategori, 
							nama_pasutri, tgl_cerai) 
							VALUES 
							('$txtno','$tgl_skr','$title','$txtnama','$txtnik','$cbojk','$txttempatlhr',
							'$txttgl','','$cboagama','$cbopekerjaan','$txtalamat','$cbokel','6','$txtnmpasutri','$txttglcerai')");
	header('location:layanan_surat.php');
?>