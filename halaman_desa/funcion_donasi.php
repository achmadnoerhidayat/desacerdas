<?php
function OtomatisID()
{
	include "config/koneksi.php";
$querycount="SELECT count(kd_donasi) as LastID FROM tbdonasi";
$result=mysqli_query($koneksi,$querycount) or die(mysql_error());
$row=mysqli_fetch_array($result);
return $row['LastID'];
}
 
function FormatNoTrans($num) {
        $num=$num+1; switch (strlen($num))
        {    
        case 1 : $NoTrans = "DON-00".$num; break;    
        case 2 : $NoTrans = "DON-0".$num; break;    
        case 3 : $NoTrans = "DON-".$num; break;   
        default: $NoTrans = $num;          
        }          
        return $NoTrans;
}
?>