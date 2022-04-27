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
									nama, kd_pekerjaan, alamat, fld_umur1,  
									nama1, kd_pekerjaan1, alamat1, fld_umur2,
									fld_saksi1, fld_saksi2, fld_saksi3, fld_saksi4,
									DATE_FORMAT(tgl_hibah,'%d %M %Y') AS tanggal_hibah, 
									day(tgl_hibah) as tgl, month(tgl_hibah) as bln, year(tgl_hibah) as thn, 
									fld_hibah1, fld_hibah2, fld_hibah3,
									fld_hibah4, fld_hibah5, fld_hibah6, 
									fld_batas1, fld_batas2, fld_batas3, fld_batas4  
									FROM tbbuatsurat 
									WHERE nomor_surat='$no_surat'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$tgl_surat=$tm_cari['tanggal_surat'];

// === Data Pihak 1 ===========
	$nama=$tm_cari['nama'];	
	$kd_pekerjaan=$tm_cari['kd_pekerjaan'];	
	$alamat=$tm_cari['alamat'];	
	$umur=$tm_cari['fld_umur1'];		

// === Data Pihak 2 ===========
	$nama1=$tm_cari['nama1'];	
	$kd_pekerjaan1=$tm_cari['kd_pekerjaan1'];	
	$alamat1=$tm_cari['alamat1'];	
	$umur1=$tm_cari['fld_umur2'];			

// === Data Saksi ===========	
	$fld_saksi1=$tm_cari['fld_saksi1'];
	$fld_saksi2=$tm_cari['fld_saksi2'];	
	$fld_saksi3=$tm_cari['fld_saksi3'];		
	$fld_saksi4=$tm_cari['fld_saksi4'];	

	$tanggal_hibah=$tm_cari['tanggal_hibah'];	
	$tgl=$tm_cari['tgl'];
	$bln=$tm_cari['bln'];
	$thn=$tm_cari['thn'];	

	$fld_hibah1=$tm_cari['fld_hibah1'];
	$fld_hibah2=$tm_cari['fld_hibah2'];	
	$fld_hibah3=$tm_cari['fld_hibah3'];
	$fld_hibah4=$tm_cari['fld_hibah4'];
	$fld_hibah5=$tm_cari['fld_hibah5'];
	$fld_hibah6=$tm_cari['fld_hibah6'];	
	
	$fld_batas1=$tm_cari['fld_batas1'];	
	$fld_batas2=$tm_cari['fld_batas2'];		
	$fld_batas3=$tm_cari['fld_batas3'];	
	$fld_batas4=$tm_cari['fld_batas4'];		
									
// === Master Data ===========	
	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan=$tm_cari['pekerjaan'];													

	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan1'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan1=$tm_cari['pekerjaan'];													
	
// === Header ==============									
	$cari_kd=mysqli_query($koneksi,"SELECT 
									id, alamat, tempat, jabatan, nama, nip, logo_surat, 
									nm_kab, nm_kec, nm_kel 
									FROM tbpengaturan_surat 
									WHERE id_kel='$kd_kel' and id_kategori='4'");
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
				<div style="text-decoration: underline; font-weight: bold;">SURAT KETERANGAN HIBAH</div>		
				<div>'.$no_surat.'</div>				
			</div>

        <!-- Begin : Isi Surat -->
        <div style="margin-top: 30pt;">Yang bertanda tangan di bawah ini  :</div>
        <table style="margin: 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">I.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Umur</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$umur.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;" colspan="3">Selanjutnya disebut Pihak Pertama (I) / Yang Menghibahkan</td>
                </tr>

                <tr>
                    <td style="padding-top: 10pt;" colspan="4"></td>
                </tr>

                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">II.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Umur</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$umur1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;" colspan="3">Selanjutnya disebut Pihak Pertama (II) / Yang Menerima Hibah</td>
                </tr>
            </tbody>
        </table>
        <!-- End : Isi Surat -->

        <!-- Catatan Surat -->
        <div style="margin-top: 10pt;">
            Pada hari  tanggal '.$tgl.' bulan '.$bln.' tahun '.$thn.', dengan ini saya Pihak Pertama (I) mengaku menghibahkan  
			kepada Pihak Kedua (II), seluas / berukuran Lebar Depan = '.$fld_hibah1.' M, Lebar Belakang = '.$fld_hibah2.' M dan Panjang = '.$fld_hibah3.' M, 
			yang terletak di <b>Desa '.$fld_hibah4.' Kec. '.$fld_hibah5.' Kabupaten '.$fld_hibah6.'</b>			
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
        <div style="margin-top: 10pt;">
            Demikian surat keterangan hibah ini dibuat dengan sebenar-benarnya, dalam keadaan sehat jasmani dan rohani tidak ada unsur paksaan dari pihak lain. 
			Dan terang dihadapan para saksi yang turut bertanda tangan dibawah ini, serta diketahui '.$jabatan.' '.$fld_nama_kel.'.
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
$dompdf->stream('surat_keterangan_hibah.pdf',array("Attachment"=>0));
//$dompdf->stream('surat_keterangan_hibah.pdf');
?>
