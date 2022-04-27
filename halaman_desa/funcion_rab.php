<?php
function OtomatisID()
{
	include "config/koneksi.php";
$querycount="SELECT count(kode_rab) as LastID FROM tbrab";
$result=mysqli_query($koneksi,$querycount) or die(mysql_error());
$row=mysqli_fetch_array($result);
return $row['LastID'];
}
 
function FormatNoTrans($num) {
        $num=$num+1; switch (strlen($num))
        {    
        case 1 : $NoTrans = "0000".$num; break;    
        case 2 : $NoTrans = "000".$num; break;    
        case 3 : $NoTrans = "00".$num; break;   
        case 4 : $NoTrans = "0".$num; break;   
        default: $NoTrans = $num;          
        }          
        return $NoTrans;
}
?>