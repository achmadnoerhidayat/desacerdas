<?php
session_start();
$kd_kel=$_SESSION['kodewil'];
include "config/koneksi.php";

$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$kd_kec=substr($kd_kel,0,8);
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];

	$bln_skr=date('m');
	$thn_skr=date('Y');
	
// ----------------------- WNI LAKI -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk3=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and 
									menetap='Hilang'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr3=$tm_cari['tot'];
	
	$jml_laki_wni_awal=($jml_laki_wni_msk1+$jml_laki_wni_msk2+$jml_laki_wni_msk3)-($jml_laki_wni_klr1+$jml_laki_wni_klr2+$jml_laki_wni_klr3);
// --------------------------------------------- END WNI LAKI ---------------

// ----------------------- WNA LAKI -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk3=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and 
									menetap='Hilang'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr3=$tm_cari['tot'];
	
	$jml_laki_wna_awal=($jml_laki_wna_msk1+$jml_laki_wna_msk2+$jml_laki_wna_msk3)-($jml_laki_wna_klr1+$jml_laki_wna_klr2+$jml_laki_wna_klr3);
// ---------------------------------------------

	
// ----------------------- WNI PEREMPUAN -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk3=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr3=$tm_cari['tot'];
	
	$jml_perempuan_wni_awal=($jml_perempuan_wni_msk1+$jml_perempuan_wni_msk2+$jml_perempuan_wni_msk3)-($jml_perempuan_wni_klr1+$jml_perempuan_wni_klr2+$jml_perempuan_wni_klr3);
// --------------------------------------------- END WNI PEREMPUAN ---------------


// ----------------------- WNA PEREMPUAN -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk3=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_klr1=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_klr2=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)<'$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang'");
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
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_msk3_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wni_klr3_skr=$tm_cari['tot'];
	
	$jml_laki_wni_skr=($jml_laki_wni_msk1_skr+$jml_laki_wni_msk2_skr+$jml_laki_wni_msk3_skr)-($jml_laki_wni_klr1_skr+$jml_laki_wni_klr2_skr+$jml_laki_wni_klr3_skr);
// --------------------------------------------- END WNI LAKI ---------------


// ----------------------- WNA LAKI SKR -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_msk3_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki_wna_klr3_skr=$tm_cari['tot'];
	
	$jml_laki_wna_skr=($jml_laki_wna_msk1_skr+$jml_laki_wna_msk2_skr+$jml_laki_wna_msk3_skr)-($jml_laki_wna_klr1_skr+$jml_laki_wna_klr2_skr+$jml_laki_wna_klr3_skr);
// --------------------------------------------- END WNA LAKI SKR ---------------



// ----------------------- WNI PEREMPUAN SKR -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_msk3_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wni_klr3_skr=$tm_cari['tot'];
	
	$jml_perempuan_wni_skr=($jml_perempuan_wni_msk1_skr+$jml_perempuan_wni_msk2_skr+$jml_perempuan_wni_msk3_skr)-($jml_perempuan_wni_klr1_skr+$jml_perempuan_wni_klr2_skr+$jml_perempuan_wni_klr3_skr);
// --------------------------------------------- END WNI PEREMPUAN SKR ---------------

// ----------------------- WNA PEREMPUAN SKR -----------------
	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Menetap'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Datang Dari'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Lahir Di'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_msk3_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Pindah Ke'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_klr1_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Meninggal'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan_wna_klr2_skr=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
									count(id_jk) as tot FROM tbpenduduk 
									WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and 
									month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr' and menetap='Hilang'");
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
	
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal FROM tbpenduduk where kode='$kd_kel'");
$html = '<center><h4>Laporan Dusun</h4></center><hr/><br/>';
$html .= '<table border="1" cellspacing="0" width="100%">
		<tr> 
			<td rowspan="2"><center><font size=2><b>NO</b></font></center></td> 
			<td rowspan="2"><center><font size=2><b>PERINCIAN</b></font></center></td> 
			<td colspan="2"><center><font size=2><b>WARGA NEGARA INDONESIA</b></font></center></td> 
			<td colspan="2"><center><font size=2><b>ORANG ASING</b></font></center></td> 
			<td colspan="3""><center><font size=2><b>JUMLAH</b></font></center></td> 
		</tr> 
		<tr> 
			<td><center><font size=2><b>LAKI-LAKI</b></font></center></td> 
			<td><center><font size=2><b>PEREMPUAN</b></font></center></td> 
			<td><center><font size=2><b>LAKI-LAKI</b></font></center></td> 
			<td><center><font size=2><b>PEREMPUAN</b></font></center></td> 
			<td><center><font size=2><b>LAKI-LAKI</b></font></center></td> 
			<td><center><font size=2><b>PEREMPUAN</b></font></center></td> 
			<td><center><font size=2><b>L + P</b></font></center></td> 	
		</tr>';
													
    $html .= "<tr>
														<td align='center'><font size=2>1</font></td>                  
														<td align='center'><font size=2>Penduduk awal bulan ini</font></td>
														<td align='center'><font size=2>".$jml_laki_wni_awal."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wni_awal."</font></td>                  
														<td align='center'><font size=2>".$jml_laki_wna_awal."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wna_awal."</font></td>                  
														<td align='center'><font size=2>".$jml_laki_tot_awal."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_tot_awal."</font></td>                  
														<td align='center'><font size=2>".$jml_penduduk_awal."</font></td>                  
													</tr>
													<tr>
														<td align='center'><font size=2>2</font></td>                  
														<td align='center'><font size=2>Kelahiran bulan ini</font></td>
														<td align='center'><font size=2>".$jml_laki_wni_msk3_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wni_msk3_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_laki_wna_msk3_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wna_msk3_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_kelahiran_laki_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_kelahiran_perempuan_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_kelahiran_total_skr."</font></td>
													</tr>
													<tr>
														<td align='center'><font size=2>3</font></td>                  
														<td align='center'><font size=2>Kematian bulan ini</font></td>
														<td align='center'><font size=2>".$jml_laki_wni_klr2_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wni_klr2_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_laki_wna_klr2_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wna_klr2_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_kematian_laki_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_kematian_perempuan_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_kematian_total_skr."</font></td>
													</tr>
													<tr>
														<td align='center'><font size=2>4</font></td>                  
														<td align='center'><font size=2>Pendatang bulan ini</font></td>
														<td align='center'><font size=2>".$jml_laki_wni_msk2_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wni_msk2_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_laki_wna_msk2_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wna_msk2_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_pendatang_laki_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_pendatang_perempuan_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_pendatang_total_skr."</font></td>
													</tr>
													<tr>
														<td align='center'><font size=2>5</font></td>                  
														<td align='center'><font size=2>Pindah bulan ini</font></td>
														<td align='center'><font size=2>".$jml_laki_wni_klr1_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wni_klr1_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_laki_wna_klr1_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wna_klr1_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_pindah_laki_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_pindah_perempuan_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_pindah_total_skr."</font></td>
													</tr>
													<tr>
														<td align='center'><font size=2>6</font></td>                  
														<td align='center'><font size=2>Penduduk akhir bulan ini</font></td>
														<td align='center'><font size=2>".$jumlah_penduduk_akhir1."</font></td>                  
														<td align='center'><font size=2>".$jumlah_penduduk_akhir2."</font></td>                  
														<td align='center'><font size=2>".$jumlah_penduduk_akhir3."</font></td>                  
														<td align='center'><font size=2>".$jumlah_penduduk_akhir4."</font></td>                  
														<td align='center'><font size=2>".$jumlah_penduduk_akhir5."</font></td>                  
														<td align='center'><font size=2>".$jumlah_penduduk_akhir6."</font></td>                  
														<td align='center'><font size=2>".$jumlah_penduduk_akhir7."</font></td>                  
													</tr>
													<tr>
														<td align='center'><font size=2>7</font></td>                  
														<td align='center'><font size=2>Penduduk hilang bulan ini</font></td>
														<td align='center'><font size=2>".$jml_laki_wni_klr3_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wni_klr3_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_laki_wna_klr3_skr."</font></td>                  
														<td align='center'><font size=2>".$jml_perempuan_wna_klr3_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_hilang_laki_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_hilang_perempuan_skr."</font></td>                  
														<td align='center'><font size=2>".$jumlah_hilang_total_skr."</font></td>                  
													</tr>	
    </tr>";

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Laporan Dusun.pdf');
?>