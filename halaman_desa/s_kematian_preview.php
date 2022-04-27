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
	$kd_pekerjaan=$_GET['txt7'];	
	$alamat=$_GET['txt8'];	

	$nama1=$_GET['txt9'];	
	$nik1=$_GET['txt10'];
	$tempat_lhr1=$_GET['txt11'];
	$tgl_lhr1=$_GET['txt12'];	
	$id_jk1=$_GET['txt13'];
	$id_agama1=$_GET['txt14'];
	$kd_pekerjaan1=$_GET['txt15'];	
	$alamat1=$_GET['txt16'];	

	$tanggal_meninggal=$_GET['txt17'];	
	$tempat_meninggal=$_GET['txt18'];	

	$tgl_surat="";	

		$bln_skr=date('m');
		$thn_skr=date('Y');
		if($bln_skr=='1') {
			$bln_rome="I";
		}
		if($bln_skr=='2') {
			$bln_rome="II";
		}
		if($bln_skr=='3') {
			$bln_rome="III";
		}
		if($bln_skr=='4') {
			$bln_rome="IV";
		}
		if($bln_skr=='5') {
			$bln_rome="V";
		}
		if($bln_skr=='6') {
			$bln_rome="VI";
		}
		if($bln_skr=='7') {
			$bln_rome="VII";
		}
		if($bln_skr=='8') {
			$bln_rome="VIII";
		}
		if($bln_skr=='9') {
			$bln_rome="IX";
		}
		if($bln_skr=='10') {
			$bln_rome="X";
		}
		if($bln_skr=='11') {
			$bln_rome="XI";
		}
		if($bln_skr=='12') {
			$bln_rome="XII";
		}

		$cari_kd=mysqli_query($koneksi,"SELECT no_pengaturan 
						FROM tbpengaturan_surat WHERE id_kel='$kd_kel' and id_kategori='7'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$no_pengaturan=$tm_cari['no_pengaturan'];
		
		$cari_kd=mysqli_query($koneksi,"SELECT count(nomor_surat) as total 
						FROM tbbuatsurat WHERE id_kel='$kd_kel' and id_kategori='7' and 
						month(tgl_surat)='$bln_skr' and year(tgl_surat)='$thn_skr'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$total=$tm_cari['total'];
		$nourut=$total+1;

		$no_surat = $nourut."/".$nourut."/".$no_pengaturan."/".$bln_rome."/".$thn_skr;
		
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
									WHERE id_kel='$kd_kel' and id_kategori='7'");
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
				<div style="text-decoration: underline; font-weight: bold;">SURAT KETERANGAN KEMATIAN</div>		
				<div>'.$no_surat.'</div>				
			</div>

        <!-- Begin : Isi Surat -->
        <div style="margin-top: 10pt;">Yang bertanda tangan di bawah ini, menerangkan dengan sesungguhnya bahwa :</div>
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
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Jenis Kelamin</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$jk.'</td>
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
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Telah meninggal dunia pada tanggal</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tanggal_meninggal.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Di</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tempat_meninggal.'</td>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 10pt;">Yang bersangkutan adalah Suami / Istri dari :</div>
        <table style="margin: 10pt 0 10pt 30pt;">
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
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Tempat/Tanggal Lahir</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tempat_lhr.', '.$tgl_lhr.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Jenis Kelamin</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$jk1.'</td>
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
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat1.'</td>
                </tr>
            </tbody>
        </table>
        <!-- End : Isi Surat -->

        <!-- Catatan Surat -->
        <div style="text-indent: 40px; margin-top: 10pt;">
            Demikian Surat Keterangan Kematian ini dikeluarkan untuk dipergunakan sebagaimana mestinya.
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
$dompdf->stream('surat_keterangan_kematian.pdf',array("Attachment"=>0));
?>
