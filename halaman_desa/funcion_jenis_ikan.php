<?php
function OtomatisID()
{
	include "config/koneksi.php";
$querycount="SELECT count(kode) as LastID FROM tbjenis_ikan";
$result=mysqli_query($koneksi,$querycount) or die(mysql_error());
$row=mysqli_fetch_array($result);
return $row['LastID'];
}
 
function FormatNoTrans($num) {
        $num=$num+1; switch (strlen($num))
        {    
        case 1 : $NoTrans = "I-0".$num; break;    
        case 2 : $NoTrans = "I-".$num; break;   
        default: $NoTrans = $num;          
        }          
        return $NoTrans;
}
?>