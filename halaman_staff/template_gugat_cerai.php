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
	
	$no_surat = $_GET['id'];
	$cari_kd=mysqli_query($koneksi,"SELECT 
									DATE_FORMAT(tgl_surat,'%d %M %Y') AS tanggal_surat, title_surat,
									nama, nik, tempat_lhr, DATE_FORMAT(tgl_lhr,'%d %M %Y') AS tanggal_lahir, 
									id_jk, id_agama, kd_pekerjaan, alamat, 
									nama1, nik1, tempat_lhr1, DATE_FORMAT(tgl_lhr1,'%d %M %Y') AS tanggal_lahir1, 
									id_jk1, id_agama1, kd_pekerjaan1, alamat1,
									DATE_FORMAT(tgl_gugat,'%d %M %Y') AS tanggal_gugat, fld_umur1, fld_umur2, 
									fld_hari, fld_saksi1, fld_saksi2	
									FROM tbbuatsurat 
									WHERE nomor_surat='$no_surat'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$tgl_surat=$tm_cari['tanggal_surat'];

// === Data Warga 1 ===========
	$nama=$tm_cari['nama'];	
	$nik=$tm_cari['nik'];
	$tempat_lhr=$tm_cari['tempat_lhr'];
	$tgl_lhr=$tm_cari['tanggal_lahir'];	
	$id_jk=$tm_cari['id_jk'];
	$id_agama=$tm_cari['id_agama'];
	$kd_pekerjaan=$tm_cari['kd_pekerjaan'];	
	$alamat=$tm_cari['alamat'];	
	
	if($id_jk=='1') {
		$pihak1="Suami";
		$pihak2="Istri";
		$pihak1_ket="Saudara";
		$pihak2_ket="Saudari";		
	} else {
		$pihak1="Istri";
		$pihak2="Suami";		
		$pihak1_ket="Saudari";
		$pihak2_ket="Saudara";				
	}

// === Data Warga 2 ===========
	$nama1=$tm_cari['nama1'];	
	$nik1=$tm_cari['nik1'];
	$tempat_lhr1=$tm_cari['tempat_lhr1'];
	$tgl_lhr1=$tm_cari['tanggal_lahir1'];	
	$id_jk1=$tm_cari['id_jk1'];
	$id_agama1=$tm_cari['id_agama1'];
	$kd_pekerjaan1=$tm_cari['kd_pekerjaan1'];	
	$alamat1=$tm_cari['alamat1'];	

// === Keterangan Surat ===========	
	$tanggal_gugat=$tm_cari['tanggal_gugat'];
	$fld_umur1=$tm_cari['fld_umur1'];
	$fld_umur2=$tm_cari['fld_umur2'];	
	$fld_hari=$tm_cari['fld_hari'];
	$fld_saksi1=$tm_cari['fld_saksi1'];	
	$fld_saksi2=$tm_cari['fld_saksi2'];		
	
// === Master Data 1 ===========	
	$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jk=$tm_cari['jk'];

	$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$agama=$tm_cari['agama'];

	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan=$tm_cari['pekerjaan'];													

// === Master Data 2 ===========	
	$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk1'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jk1=$tm_cari['jk'];

	$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama1'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$agama1=$tm_cari['agama'];

	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan1'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan1=$tm_cari['pekerjaan'];													
	
// === Info Lainnya ===========													
	//$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
	//$tm_cari=mysqli_fetch_array($cari_kd);
	//$status_nikah=$tm_cari['status_nikah'];

// === Header ==============									
	$cari_kd=mysqli_query($koneksi,"SELECT 
									id, alamat, tempat, jabatan, nama, nip, logo_surat, 
									nm_kab, nm_kec, nm_kel 
									FROM tbpengaturan_surat 
									WHERE id_kel='$kd_kel' and id_kategori='10'");
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
				<div style="text-decoration: underline; font-weight: bold;">SURAT KETERANGAN GUGAT CERAI</div>		
				<div>'.$no_surat.'</div>				
			</div>

        <!-- Begin : Isi Surat -->
        <div style="margin-top: 30pt;">Yang bertanda tangan di bawah ini, menerangkan  :</div>
        <table style="margin: 10pt 30pt; width: 100%;">
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
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Tempat/Tanggal lahir</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tempat_lhr.', '.$tgl_lhr.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Agama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$agama.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Umur</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld_umur1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat.'</td>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 10pt;">Selanjutnya disebut Pihak I '.$pihak1.'</div>
        <div style="margin-top: 10pt;">Dengan kesadaran bersama tanpa paksaan atau tekanan dari pihak manapun juga, maka dengan ini menyatakan gugat cerai kepada :</div>
        <table style="margin: 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">NIK</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nik1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Tempat/Tanggal lahir</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tempat_lhr1.', '.$tgl_lhr1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Agama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$agama1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Umur</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld_umur2.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat1.'</td>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 10pt;">Selanjutnya disebut Pihak II '.$pihak2.'</div>
        <div style="margin-top: 10pt;">Bahwa sejak Hari '.$fld_hari.' Tanggal '.$tanggal_gugat.' '.$pihak2_ket.' '.$nama1.' </div>
        <!-- End : Isi Surat -->

        <!-- Catatan Surat -->
        <div style="margin-top: 30pt;">
            (Pihak II ) sudah bukan '.$pihak2.' dan tanggung jawab saya lagi, dan persoalan-persoalan yang berkaitan dengan mantan '.$pihak2.' bukan tanggung jawab saya lagi.
        </div>
        <div style="margin-top: 30pt;">
            Bilamana '.$pihak2_ket.' (Pihak II ) mendapatkan jodoh dengan orang lain maka dengan rasa ikhlas dan ridho, lahir dan batin, saya persilahkan untuk menikah dan saya tidak akan menuntut atau menggugat kepada siapapun dan begitu juga sebaliknya.
        </div>
        <div style="margin-top: 30pt;">
            Demikian Surat Keterangan Gugat Cerai ini dibuat, untuk digunakan sebagaimana mestinya.
        </div>
		
		'.$dot.'
		<div style="float: right; width: 250pt; text-align: center; margin-top: 20pt;">
			<div>'.$tempat_surat.', '.$tgl_surat.'</div>
			<div>'.$jabatan.'</div>
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
$dompdf->stream('surat_keteragan_gugat_cerai.pdf',array("Attachment"=>0));
?>
