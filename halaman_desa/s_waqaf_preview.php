<?php
	session_start();
	$kd_kel=$_SESSION['kodewil'];
	include "config/koneksi.php";

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];

	$kd_prop=substr($kd_kel,0,2);
	$kd_kab=substr($kd_kel,0,5);
	$kd_kec=substr($kd_kel,0,8);
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_prop'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_prop=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kab'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kab=$tm_cari['nama'];
	
	$nama=$_GET['txt1'];
	$nik=$_GET['txt2'];
	$tempat_lhr=$_GET['txt3'];
	$tgl_lhr=$_GET['txt4'];	
	$id_jk=$_GET['txt5'];
	$id_agama=$_GET['txt6'];
	$umur=$_GET['txt7'];	
	$kd_pekerjaan=$_GET['txt8'];	
	$alamat=$_GET['txt9'];	
	$fld_saksi1=$_GET['txt10'];
	$fld_saksi2=$_GET['txt11'];	

	$fld_hibah1=$_GET['txt12'];
	$fld_hibah2=$_GET['txt13'];	
	$fld_hibah3=$_GET['txt14'];
	$fld_hibah4=$_GET['txt15'];
	$fld_hibah5=$_GET['txt16'];
	$fld_hibah6=$_GET['txt17'];	
	$fld_batas1=$_GET['txt18'];	
	$fld_batas2=$_GET['txt19'];		
	$fld_batas3=$_GET['txt20'];	
	$fld_batas4=$_GET['txt21'];		
	


		$tgl_skr=date('d');
		$bln_skr=date('m');
		$thn_skr=date('Y');
		if($bln_skr=='1') {
			$bln_rome="I";
			$ket_bln="Januari";
		}
		if($bln_skr=='2') {
			$bln_rome="II";
			$ket_bln="Pebruari";
		}
		if($bln_skr=='3') {
			$bln_rome="III";
			$ket_bln="Maret";			
		}
		if($bln_skr=='4') {
			$bln_rome="IV";
			$ket_bln="April";
		}
		if($bln_skr=='5') {
			$bln_rome="V";
			$ket_bln="Mei";
		}
		if($bln_skr=='6') {
			$bln_rome="VI";
			$ket_bln="Juni";			
		}
		if($bln_skr=='7') {
			$bln_rome="VII";
			$ket_bln="Juli";			
		}
		if($bln_skr=='8') {
			$bln_rome="VIII";
			$ket_bln="Agustus";			
		}
		if($bln_skr=='9') {
			$bln_rome="IX";
			$ket_bln="September";
		}
		if($bln_skr=='10') {
			$bln_rome="X";
			$ket_bln="Oktober";
		}
		if($bln_skr=='11') {
			$bln_rome="XI";
			$ket_bln="Nopember";
		}
		if($bln_skr=='12') {
			$bln_rome="XII";
			$ket_bln="Desember";
		}

		$cari_kd=mysqli_query($koneksi,"SELECT no_pengaturan 
						FROM tbpengaturan_surat WHERE id_kel='$kd_kel' and id_kategori='15'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$no_pengaturan=$tm_cari['no_pengaturan'];
		
		$cari_kd=mysqli_query($koneksi,"SELECT count(nomor_surat) as total 
						FROM tbbuatsurat WHERE id_kel='$kd_kel' and id_kategori='15' and 
						month(tgl_surat)='$bln_skr' and year(tgl_surat)='$thn_skr'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$total=$tm_cari['total'];
		$nourut=$total+1;

		$no_surat = $nourut."/".$nourut."/".$no_pengaturan."/".$bln_rome."/".$thn_skr;
	$tgl_surat=$tgl_skr." ".$ket_bln." ".$thn_skr;

	



									
// === Master Data ===========	
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];

													$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$agama=$tm_cari['agama'];
													
	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan=$tm_cari['pekerjaan'];													
	
// === Header ==============									
	$cari_kd=mysqli_query($koneksi,"SELECT 
									id, alamat, tempat, jabatan, nama, nip, logo_surat, 
									nm_kab, nm_kec, nm_kel 
									FROM tbpengaturan_surat 
									WHERE id_kel='$kd_kel' and id_kategori='15'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$alamat_surat=$tm_cari['alamat'];
	$logo_surat=$tm_cari['logo_surat'];
	$tempat_surat=$tm_cari['tempat'];	
	$jabatan=$tm_cari['jabatan'];
	$nama_jwb=$tm_cari['nama'];
	$nip_jwb=$tm_cari['nip'];

	$fld_nama_kab=$tm_cari['nm_kab'];
	$fld_nama_kec=$tm_cari['nm_kec'];
	$fld_nama_kel=$tm_cari['nm_kel'];
	
	$dot = '.............................';
	
	require_once("dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();

	$html = '<head>
				<style>
					html, body {
						font-family: Arial, Helvetica, sans-serif;
					}
					table.table, table.table td, table.table th {
						border: 1px solid black;
					}

					table.table {
						width: 100%;
						border-collapse: collapse;
					}

					sup {
						font-size: 8;
					}
				</style>	
			</head>
			<body>
			<div style="margin-top: -20pt; padding: 10pt; overflow: none; text-align: justify;">
			<div style="position: absolute; top: -5pt; left: 5pt;">
				<img src="'.$logo_surat.'" width="80pt">
			</div>
			<div style="text-align: center; border-bottom: 3pt double black; padding: 10pt 0;">
				<div style="font-weight: bold;">'.$fld_nama_kab.'</div>
				<div style="font-weight: bold;">'.$fld_nama_kec.'</div>
				<div style="font-weight: bold;">'.$fld_nama_kel.'</div>
				<div>'.$alamat_surat.'</div>
			</div>
			<div style="text-align: center; margin: 30pt 0;">
				<div style="text-decoration: underline; font-weight: bold;">SURAT KETERANGAN WAQAF</div>		
				<div>'.$no_surat.'</div>				
			</div>

        <!-- Begin : Isi Surat -->
        <div style="margin-top: 30pt;">Yang bertanda tangan di bawah ini  :</div>
        <table style="margin: 10pt 0 10pt 30pt;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">NIK</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nik.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Tempat/Tanggal Lahir</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tempat_lhr.', '.$tgl_lhr.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat.'</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 10pt;">
            Pada hari ini tanggal '.$tgl_skr.' bulan '.$ket_bln.' tahun '.$thn_skr.', 
			saya mewakafkan Tanah Bangunan seluas/berukuran Lebar Depan = '.$fld_hibah1.' M, Lebar Belakang = '.$fld_hibah2.' M dan 
			Panjang = '.$fld_hibah3.' M, yang terletak di Desa '.$fld_hibah4.' Kec. '.$fld_hibah5.' Kabupaten '.$fld_hibah6.'
        </div>

        <div style="margin-top: 10pt;">
            Adapun batas-batasnya sebagai berikut:
            <ul>
                <li>Sebelah Timur berbatasan dengan '.$fld_batas1.'</li>
                <li>Sebelah Barat berbatasan dengan '.$fld_batas2.'</li>
                <li>Sebelah Utara berbatasan dengan '.$fld_batas3.'</li>
                <li>Sebelah Selatan berbatasan dengan '.$fld_batas4.'</li>
            </ul>
        </div>
        <!-- End : Isi Surat -->

        <!-- Catatan Surat -->
        <div style="margin-top: 10pt;">
            <span>
                Demikian Surat Keterangan Waqaf ini dibuat dengan sebenar-benarnya, dalam keadaan sehat jasmani dan rohani 
				tidak ada unsur paksaan dari pihak lain. Dan terang dihadapan para saksi yang turut bertanda tangan dibawah ini, 
				serta diketahui '.$jabatan.' '.$alamat_surat.'.
            </span>
        </div>

<!-- Tanda Tangan Pihak 1 dan Pihak 2 -->
<div style="margin-top: 10pt; position: relative;">
    <!-- Pihak Pewaqaf -->
    <div style="width: 170pt; text-align: center; margin-top: 0; position: absolute; right: 0;">
        <div>'.$fld_nama_kel.', '.$tgl_surat.'</div>
        <div>Yang Mewaqafkan</div>
        <div style="margin-top: 65pt;">( '.$nama.' )</div>
    </div>
</div>

<b><u>SAKSI - SAKSI :</u></b>
<div style="top: 0; position: relative;">
    <!-- Pihak Pertama -->
    <div style="width: 70%; margin-top: 10pt; position: absolute; left: 0;">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="vertical-align: top; padding: 10pt 0;">1.</td>
                    <td style="vertical-align: top; padding: 10pt 2pt;">'.$fld_saksi1.'</td>
                    <td style="vertical-align: top; padding: 10pt 0;">( '.$dot.' )</td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding: 10pt 0;">2.</td>
                    <td style="vertical-align: top; padding: 10pt 2pt;">'.$fld_saksi2.'</td>
                    <td style="vertical-align: top; padding: 10pt 0;">( '.$dot.' )</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Mengetahui -->
<div style="top: 90pt; position: relative; text-align: center;">
    <div>Mengetahui</div>
    <div>'.$jabatan.' '.$fld_nama_kel.' '.$fld_nama_kec.'</div>
    <div style="margin-top: 65pt;"><u>'.$nama_jwb.'</u></div>
    <div>'.$nip_jwb.'</div>
</div>		

';

$html .= "</div></body></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('surat_keterangan_waqaf.pdf',array("Attachment"=>0));
?>
