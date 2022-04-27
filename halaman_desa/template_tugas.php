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
									DATE_FORMAT(tgl_surat,'%d %M %Y') AS tanggal_surat, title_surat	
									FROM tbbuatsurat 
									WHERE nomor_surat='$no_surat'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$tgl_surat=$tm_cari['tanggal_surat'];



// === Header ==============									
	$cari_kd=mysqli_query($koneksi,"SELECT 
									id, alamat, tempat, jabatan, nama, nip, logo_surat, 
									nm_kab, nm_kec, nm_kel 
									FROM tbpengaturan_surat 
									WHERE id_kel='$kd_kel' and id_kategori='21'");
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
				<div style="text-decoration: underline; font-weight: bold;">SURAT PENGANTAR TUGAS</div>		
				<div>'.$no_surat.'</div>				
			</div>

        <!-- Begin : Isi Surat -->
        <table style="margin: 10pt 0; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 9%;">Dasar</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 90%;">Tertib Administrasi Pengelolaan Keuangan Desa dan Percepatan pembangunan</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 10pt; text-decoration: underline; font-weight: bold; text-align: center;">
			<span>
				MEMERINTAHKAN
			</span>
        </div>
';


				$sql = mysqli_query($koneksi,"SELECT fld_nama, fld_jabatan FROM tbsurat_tugas WHERE id_kel='$kd_kel' and nomor_surat='$no_surat'");
				while ($tampil = mysqli_fetch_array($sql)) {
$fld_nama=$tampil['fld_nama'];
			$fld_jabatan=$tampil['fld_jabatan'];

			$html .= '<table style="margin: 10pt 0; width: 100%;">
                <tbody>
                    <tr>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 9%;">Kepada</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">: </td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">.</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 8%;">Nama</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 80%;">'.$fld_nama.'</td>
                    </tr>
                    <tr>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 9%;">&nbsp;</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">&nbsp;</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">&nbsp;</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 8%;">Jabatan</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 80%;">'.$fld_jabatan.'</td>
                    </tr>
                </tbody>
            </table>';
		}
				
 

					$sql = mysqli_query($koneksi,"SELECT fld_tugas FROM tbsurat_tugas1 WHERE id_kel='$kd_kel' and nomor_surat='$no_surat'");
				while ($tampil = mysqli_fetch_array($sql)) {
			$fld_tugas=$tampil['fld_tugas'];


			$html .= '<table style="margin: 10pt 0; width: 100%;">
                <tbody>
                    <tr>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 9%;">Untuk :</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">&nbsp;</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">.</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 80%; text-align: justify;">'.$fld_tugas.'</td>
                    </tr>
                </tbody>
            </table>';
		}		
		
		
		
$html .= ' <div style="margin-top: 20pt; text-align: justify;">
			<span>
				Demikian Surat perintah tugas ini di buat untuk dilaksanakan dengan sebaik-baiknya.
			</span>
        </div>
		
		<div style="float: right; width: 250pt; text-align: center; margin-top: 20pt;">
			<div>'.$tempat_surat.', '.$tgl_surat.'</div>
			<div>'.$jabatan.'</div>
			<div style="margin-top: 65pt;"><u>'.$nama_jwb.'</u></div>
			<div>'.$nip_jwb.'</div>
		</div>';

$html .= "</div></body></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('surat_pengantar_tugas.pdf',array("Attachment"=>0));
?>
