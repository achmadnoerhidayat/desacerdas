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
	
	$fld_warga=$_GET['txt1'];		
	$nama=$_GET['txt4'];	
	$nik=$_GET['txt5'];
	$tempat_lhr=$_GET['txt6'];
	$tgl_lhr=$_GET['txt7'];
	$id_jk=$_GET['txt8'];
	$id_agama=$_GET['txt9'];
	$id_status_kawin=$_GET['txt10'];
	$kd_pekerjaan=$_GET['txt11'];	
	$alamat=$_GET['txt12'];	
	
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
						FROM tbpengaturan_surat WHERE id_kel='$kd_kel' and id_kategori='19'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$no_pengaturan=$tm_cari['no_pengaturan'];
		
		$cari_kd=mysqli_query($koneksi,"SELECT count(nomor_surat) as total 
						FROM tbbuatsurat WHERE id_kel='$kd_kel' and id_kategori='19' and 
						month(tgl_surat)='$bln_skr' and year(tgl_surat)='$thn_skr'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$total=$tm_cari['total'];
		$nourut=$total+1;

		$no_surat = $nourut."/".$nourut."/".$no_pengaturan."/".$bln_rome."/".$thn_skr;
		
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];

													$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];

													$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$agama=$tm_cari['agama'];
													
													$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];													

									
	$cari_kd=mysqli_query($koneksi,"SELECT 
									id, alamat, tempat, jabatan, nama, nip, logo_surat 
									FROM tbpengaturan_surat 
									WHERE id_kel='$kd_kel' and id_kategori='19'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$alamat_surat=$tm_cari['alamat'];
	$logo_surat=$tm_cari['logo_surat'];
	$tempat_surat=$tm_cari['tempat'];	
	$jabatan=$tm_cari['jabatan'];
	$nama_jwb=$tm_cari['nama'];
	$nip_jwb=$tm_cari['nip'];
	
	require_once("dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();

	$html = '<table width="100%">
				<tr>
					<td width="20%">
						<img src="'.$logo_surat.'" width="100px">
					</td>
					<td width="60%">
						<center><b>'.$nm_kab.'</b><br><b>'.$nm_kec.'</b><br><b>'.$nm_kel.'</b><br>'.$alamat_surat.'</center>
					</td>
					<td width="20%"></td>					
				</tr>
			</table>
			<hr>
			<br>
			<center>
				<b><u>SURAT PENGANTAR SKCK</u></b><br>
				'.$no_surat.'
			</center>
			<br>
        <!-- Begin : Isi Surat -->
        <div style="margin-top: 0; text-align: justify; text-indent: 30pt;">
			<span>
				Yang bertanda tangan di bawah ini, '.$jabatan.' '.$nm_kel.', '.$nm_kec.', '.$nm_kab.', '.$nm_prop.', dengan ini menerangkan :
			</span>
		</div>
        <table style="margin: 10pt 0 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nama Lengkap</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">NIK</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nik.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Jenis Kelamin</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$jk.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Tempat/Tanggal Lahir</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tempat_lhr.'/'.$tgl_lhr.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Status Perkawinan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$status_nikah.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Kewarganegaraan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld_warga.'</td>
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
            </tbody>
        </table>

        <div style="margin-top: 10pt; text-align: justify;">
			<span>
                Orang tersebut diatas adalah benar-benar penduduk Desa Kami yang berdomisili di alamat diatas serta Kami menerangkan bahwa orang tersebut benar <b>berkelakuan baik</b> dan 
				<b>belum pernah bersangkutan perkara polisi</b>. Surat keterangan ini kami berikan untuk memenuhi salah satu persyaratan 
				<b>Surat Keterangan Catatan Kepolisian (SKCK)</b>.			
            </span>
        </div>
        <!-- End : Isi Surat -->

        <!-- Catatan Surat -->
        <div style="margin-top: 10pt; text-align: justify;">
			<span>
				Demikian Surat Keterangan ini dibuat, kepada yang bersangkutan harap maklum serta menjadikan bahan seperlunya.			
			</span>
        </div>
		
		<br>&nbsp;
<table width="100%">
				<tr valign="top">
					<td width="50%" align="center">
					&nbsp;<br>Camat ...................
					</td>
					<td width="50%" align="center">
					'.$tempat_surat.', '.$tgl_surat.'<br>'.$jabatan.'<br><br><br><br><br><br>
					<u>'.$nama_jwb.'</u><br>
					'.$nip_jwb.'
					</td>
				</tr>
				</table>
';

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('surat_pengantar_skck.pdf',array("Attachment"=>0));
?>
