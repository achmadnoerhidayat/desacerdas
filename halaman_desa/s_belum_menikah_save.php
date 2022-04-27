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
	$cbokel = $_POST['txtkdkel'];
	$txtnama = $_POST['txtnama'];
	$txtnik = $_POST['txtnik'];
	$cbojk = $_POST['cbojk'];
	$txttempatlhr = $_POST['txttempatlhr'];
	$cbostatus = $_POST['cbostatus'];
	$cboagama = $_POST['cboagama'];
	$cbopekerjaan = $_POST['cbopekerjaan'];
	$txtalamat = $_POST['txtalamat'];	
	$txtno = $_POST['txtno'];
	$title="SURAT KETERANGAN BELUM MENIKAH ".$txtnama;
	
	mysqli_query($koneksi,"INSERT INTO tbbuatsurat 
							(nomor_surat, tgl_surat, title_surat, nama, nik, id_jk, tempat_lhr, 
							tgl_lhr, id_status_kawin, id_agama, kd_pekerjaan, alamat, id_kel, id_kategori) 
							VALUES 
							('$txtno','$tgl_skr','$title','$txtnama','$txtnik','$cbojk','$txttempatlhr',
							'$txttgl','$cbostatus','$cboagama','$cbopekerjaan','$txtalamat','$cbokel','13')");
	header('location:layanan_surat.php');
?>