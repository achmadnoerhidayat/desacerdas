<?php 
	include "config/koneksi.php";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtid'];
	$txtluas = $_POST['txtluas'];
    $txt1 = $_POST['txt1'];
    $txt2 = $_POST['txt2'];
    $txt3 = $_POST['txt3'];
    $txt4 = $_POST['txt4'];
    $txt5 = $_POST['txt5'];
    $txt6 = $_POST['txt6'];
    $txt7 = $_POST['txt7'];
    $txt8 = $_POST['txt8'];
    $txt9 = $_POST['txt9'];
    $txt10 = $_POST['txt10'];
    $txt11 = $_POST['txt11'];
    $txt12 = $_POST['txt12'];
    $txt13 = $_POST['txt13'];
    $txt14 = $_POST['txt14'];
    $txt15 = $_POST['txt15'];
    $txt16 = $_POST['txt16'];
    $txt17 = $_POST['txt17'];
    $txt18 = $_POST['txt18'];
    $txt19 = $_POST['txt19'];
    $txt20 = $_POST['txt20'];
    $txt21 = $_POST['txt21'];
    $txt22 = $_POST['txt22'];
    $txt23 = $_POST['txt23'];
    $txt24 = $_POST['txt24'];
    $txt25 = $_POST['txt25'];
    

	mysqli_query($koneksi,"UPDATE tbprofil SET luas='$txtluas', 
fld1='$txt1',fld2='$txt2',fld3='$txt3',fld4='$txt4',fld5='$txt5',
		fld6='$txt6',fld7='$txt7',fld8='$txt8',fld9='$txt9',fld10='$txt10',
        fld11='$txt11',fld12='$txt12',fld13='$txt13',fld14='$txt14',fld15='$txt15',
		fld16='$txt16',fld17='$txt17',fld18='$txt18',fld19='$txt19',fld20='$txt20',
        fld21='$txt21',fld22='$txt22',fld23='$txt23',fld24='$txt24',fld25='$txt25' 
WHERE kode='$cbokel'");
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('demografi.php');</script>";
?>