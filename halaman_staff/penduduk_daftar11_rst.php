<?php
	session_start();
	
	if($_SESSION['nip']==''){
		header("location:../index.php");
	} else {
		$kd_kel=$_SESSION['kodewil'];
		$nip=$_SESSION['nip'];
		$nm_user=$_SESSION['nm_user'];
		
	include "config/koneksi.php";
						$cari_kd=mysqli_query($koneksi,"SELECT file_photo, file_name FROM tbuser WHERE nip='$nip'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$file_photo=$tm_cari['file_photo'];
	$file_name=$tm_cari['file_name'];
	if($file_photo=='') {
		$file_photo="dist/images/logo.svg";
	}
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$kd_prop=substr($kd_kel,0,2);
	$kd_kab=substr($kd_kel,0,5);
	$kd_kec=substr($kd_kel,0,8);
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_prop'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_prop=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kab'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kab=$tm_cari['nama'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];

	$bln_skr=date('m');
	$thn_skr=date('Y');
	$id_dukuh=$_POST['txtcari'];
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];
													
// ----------------------- WNI LAKI -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk3=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and 
									menetap='Hilang' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr3=$tm_cari['tot'];
	
	$jml_laki_wni_awal=($jml_laki_wni_msk1+$jml_laki_wni_msk2+$jml_laki_wni_msk3)-($jml_laki_wni_klr1+$jml_laki_wni_klr2+$jml_laki_wni_klr3);
// --------------------------------------------- END WNI LAKI ---------------

// ----------------------- WNA LAKI -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk3=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and 
									menetap='Hilang' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr3=$tm_cari['tot'];
	
	$jml_laki_wna_awal=($jml_laki_wna_msk1+$jml_laki_wna_msk2+$jml_laki_wna_msk3)-($jml_laki_wna_klr1+$jml_laki_wna_klr2+$jml_laki_wna_klr3);
// ---------------------------------------------

	
// ----------------------- WNI PEREMPUAN -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk3=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr3=$tm_cari['tot'];
	
	$jml_perempuan_wni_awal=($jml_perempuan_wni_msk1+$jml_perempuan_wni_msk2+$jml_perempuan_wni_msk3)-($jml_perempuan_wni_klr1+$jml_perempuan_wni_klr2+$jml_perempuan_wni_klr3);
// --------------------------------------------- END WNI PEREMPUAN ---------------


// ----------------------- WNA PEREMPUAN -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk3=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_klr1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_klr2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_klr3=$tm_cari['tot'];
	
	$jml_perempuan_wna_awal=($jml_perempuan_wna_msk1+$jml_perempuan_wna_msk2+$jml_perempuan_wna_msk3)-($jml_perempuan_wna_klr1+$jml_perempuan_wna_klr2+$jml_perempuan_wna_klr3);
// ---------------------------------------------

	$jml_laki_tot_awal=$jml_laki_wni_awal+$jml_laki_wna_awal;
	$jml_perempuan_tot_awal=$jml_perempuan_wni_awal+$jml_perempuan_wna_awal;
	$jml_penduduk_awal=$jml_laki_tot_awal+$jml_perempuan_tot_awal;


// ----------------------- WNI LAKI SKR -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk3_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr3_skr=$tm_cari['tot'];
	
	$jml_laki_wni_skr=($jml_laki_wni_msk1_skr+$jml_laki_wni_msk2_skr+$jml_laki_wni_msk3_skr)-($jml_laki_wni_klr1_skr+$jml_laki_wni_klr2_skr+$jml_laki_wni_klr3_skr);
// --------------------------------------------- END WNI LAKI ---------------


// ----------------------- WNA LAKI SKR -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk3_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr3_skr=$tm_cari['tot'];
	
	$jml_laki_wna_skr=($jml_laki_wna_msk1_skr+$jml_laki_wna_msk2_skr+$jml_laki_wna_msk3_skr)-($jml_laki_wna_klr1_skr+$jml_laki_wna_klr2_skr+$jml_laki_wna_klr3_skr);
// --------------------------------------------- END WNA LAKI SKR ---------------



// ----------------------- WNI PEREMPUAN SKR -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk3_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr3_skr=$tm_cari['tot'];
	
	$jml_perempuan_wni_skr=($jml_perempuan_wni_msk1_skr+$jml_perempuan_wni_msk2_skr+$jml_perempuan_wni_msk3_skr)-($jml_perempuan_wni_klr1_skr+$jml_perempuan_wni_klr2_skr+$jml_perempuan_wni_klr3_skr);
// --------------------------------------------- END WNI PEREMPUAN SKR ---------------

// ----------------------- WNA PEREMPUAN SKR -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk3_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_klr1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_klr2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang' and id_dukuh='$id_dukuh'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_klr3_skr=$tm_cari['tot'];
	
	$jml_perempuan_wna_skr=($jml_perempuan_wna_msk1_skr+$jml_perempuan_wna_msk2_skr+$jml_perempuan_wna_msk3_skr)-($jml_perempuan_wna_klr1_skr+$jml_perempuan_wna_klr2_skr+$jml_perempuan_wna_klr3_skr);
// --------------------------------------------- END WNA PEREMPUAN SKR ---------------


$jumlah_kelahiran_laki_skr=$jml_laki_wni_msk3_skr+$jml_laki_wna_msk3_skr;
$jumlah_kelahiran_perempuan_skr=$jml_perempuan_wni_msk3_skr+$jml_perempuan_wna_msk3_skr;
$jumlah_kelahiran_total_skr=$jumlah_kelahiran_laki_skr+$jumlah_kelahiran_perempuan_skr;

$jumlah_kematian_laki_skr=$jml_laki_wni_klr2_skr+$jml_laki_wna_klr2_skr;
$jumlah_kematian_perempuan_skr=$jml_perempuan_wni_klr2_skr+$jml_perempuan_wna_klr2_skr;
$jumlah_kematian_total_skr=$jumlah_kematian_laki_skr+$jumlah_kematian_perempuan_skr;

$jumlah_pendatang_laki_skr=$jml_laki_wni_msk2_skr+$jml_laki_wna_msk2_skr;
$jumlah_pendatang_perempuan_skr=$jml_perempuan_wni_msk2_skr+$jml_perempuan_wna_msk2_skr;
$jumlah_pendatang_total_skr=$jumlah_pendatang_laki_skr+$jumlah_pendatang_perempuan_skr;

$jumlah_pindah_laki_skr=$jml_laki_wni_klr1_skr+$jml_laki_wna_klr1_skr;
$jumlah_pindah_perempuan_skr=$jml_perempuan_wni_klr1_skr+$jml_perempuan_wna_klr1_skr;
$jumlah_pindah_total_skr=$jumlah_pindah_laki_skr+$jumlah_pindah_perempuan_skr;

$jumlah_hilang_laki_skr=$jml_laki_wni_klr3_skr+$jml_laki_wna_klr3_skr;
$jumlah_hilang_perempuan_skr=$jml_perempuan_wni_klr3_skr+$jml_perempuan_wna_klr3_skr;
$jumlah_hilang_total_skr=$jumlah_hilang_laki_skr+$jumlah_hilang_perempuan_skr;

$jumlah_penduduk_akhir1=$jml_laki_wni_awal+($jml_laki_wni_msk3_skr+$jml_laki_wni_msk2_skr)-($jml_laki_wni_klr2_skr+$jml_laki_wni_klr1_skr);
$jumlah_penduduk_akhir2=$jml_perempuan_wni_awal+($jml_perempuan_wni_msk3_skr+$jml_perempuan_wni_msk2_skr)-($jml_perempuan_wni_klr2_skr+$jml_perempuan_wni_klr1_skr);
$jumlah_penduduk_akhir3=$jml_laki_wna_awal+($jml_laki_wna_msk3_skr+$jml_laki_wna_msk2_skr)-($jml_laki_wna_klr2_skr+$jml_laki_wna_klr1_skr);
$jumlah_penduduk_akhir4=$jml_perempuan_wna_awal+($jml_perempuan_wna_msk3_skr+$jml_perempuan_wna_msk2_skr)-($jml_perempuan_wna_klr2_skr+$jml_perempuan_wna_klr1_skr);
$jumlah_penduduk_akhir5=$jumlah_penduduk_akhir1+$jumlah_penduduk_akhir3;
$jumlah_penduduk_akhir6=$jumlah_penduduk_akhir2+$jumlah_penduduk_akhir4;
$jumlah_penduduk_akhir7=$jumlah_penduduk_akhir5+$jumlah_penduduk_akhir6;
?>

<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title><?php include "titel.php"; ?></title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->

<style>
	.btn_style{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: #7CFC00;
	}
	.btn_style:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>

<style>
	.btn_style1{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: grey;
	}
	.btn_style1:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>

<style>
	.btn_style2{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: #FFD700;
	}
	.btn_style2:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>
	
	
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_penduduk02.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="penduduk_daftar.php" class="">Kependudukan</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Laporan Dusun</a> 
					</div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->

                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                    
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="User Profil" src="<?php echo $file_photo; ?>">
                        </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                <div class="p-4 border-b border-theme-40">
                                    <div class="font-medium"><?php echo $nm_user; ?></div>
                                    <div class="text-xs text-theme-41"><?php include "titel_status.php"; ?></div>
                                </div>
                                <div class="p-2">
                                    <a href="profile.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <a href="change_pwd.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
                                </div>
                                <div class="p-2 border-t border-theme-40">
                                    <a href="logout.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->

										<br>
										<center>
											<font size="4"><b>LAPORAN DUSUN <?php echo $nm_dukuh; ?></b></font>
											<br>
											<font size="3">PEMERINTAH DESA <?php echo $nm_kel; ?></font>
											<br>
											<font size="3">KECAMATAN <?php echo $nm_kec; ?> KABUPATEN <?php echo $nm_kab; ?></font>
											<br>
											<font size="3">TAHUN <?php echo $thn_skr; ?></font>
										</center>
										
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5">

                                        <table class="table">
                                            <tbody>
                                                <tr valign="top" class="">
                                                    	<td width="15%" class="no-border">

							</td>
                                                    	<td width="1%" class="no-border text-center">

							</td>
                                                    	<td width="54%" class="no-border text-left" >

							</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a href="report11.php?id_dusun=<?php echo $id_dukuh; ?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a target="_blank" href="export_excel11.php?id_dusun=<?php echo $id_dukuh; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Excel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a href="cetak11.php?id_dusun=<?php echo $id_dukuh; ?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                </tr>
                                            </tbody>
                                        </table>

<div class="overflow-x-auto">
<table class="table"> 
											<thead> 
												<tr> 
													<td rowspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>NO</b></font></center></td> 
													<td rowspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>PERINCIAN</b></font></center></td> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WARGA NEGARA INDONESIA</b></font></center></td> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>ORANG ASING</b></font></center></td> 
													<td colspan="3" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JUMLAH</b></font></center></td> 
												</tr> 
												<tr> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>LAKI-LAKI</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>PEREMPUAN</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>LAKI-LAKI</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>PEREMPUAN</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>LAKI-LAKI</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>PEREMPUAN</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L + P</b></font></center></td> 	
											</tr> 

											</thead>  


												<tbody>
													<tr>
														<td class="border text-center"><font size="2">1</font></td>                  
														<td class="border text-center"><font size="2">Penduduk awal bulan ini</font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_awal; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_awal; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_awal; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_awal; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_laki_tot_awal; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_tot_awal; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_penduduk_awal; ?></font></td>                  
													</tr>
													<tr>
														<td class="border text-center"><font size="2">2</font></td>                  
														<td class="border text-center"><font size="2">Kelahiran bulan ini</font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_msk3_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_msk3_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_msk3_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_msk3_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_kelahiran_laki_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_kelahiran_perempuan_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_kelahiran_total_skr; ?></font></td>
													</tr>
													<tr>
														<td class="border text-center"><font size="2">3</font></td>                  
														<td class="border text-center"><font size="2">Kematian bulan ini</font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_klr2_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_klr2_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_klr2_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_klr2_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_kematian_laki_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_kematian_perempuan_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_kematian_total_skr; ?></font></td>
													</tr>
													<tr>
														<td class="border text-center"><font size="2">4</font></td>                  
														<td class="border text-center"><font size="2">Pendatang bulan ini</font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_msk2_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_msk2_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_msk2_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_msk2_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_pendatang_laki_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_pendatang_perempuan_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_pendatang_total_skr; ?></font></td>
													</tr>
													<tr>
														<td class="border text-center"><font size="2">5</font></td>                  
														<td class="border text-center"><font size="2">Pindah bulan ini</font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_klr1_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_klr1_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_klr1_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_klr1_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_pindah_laki_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_pindah_perempuan_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_pindah_total_skr; ?></font></td>
													</tr>
													<tr>
														<td class="border text-center"><font size="2">6</font></td>                  
														<td class="border text-center"><font size="2">Penduduk akhir bulan ini</font></td>
														<td class="border text-center"><font size="2"><?php echo $jumlah_penduduk_akhir1; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_penduduk_akhir2; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_penduduk_akhir3; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_penduduk_akhir4; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_penduduk_akhir5; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_penduduk_akhir6; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_penduduk_akhir7; ?></font></td>                  
													</tr>
													<tr>
														<td class="border text-center"><font size="2">7</font></td>                  
														<td class="border text-center"><font size="2">Penduduk hilang bulan ini</font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_klr3_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_klr3_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_klr3_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_klr3_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_hilang_laki_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_hilang_perempuan_skr; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $jumlah_hilang_total_skr; ?></font></td>
													</tr>
												</tbody>
										</table> 
</div>        

                <!-- END: Datatable -->


                        </div>
                        <!-- END: Form Layout -->
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>

<?php
	}
?>