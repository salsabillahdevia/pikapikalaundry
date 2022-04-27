<!-- jam -->
<?php 

$tanggal = mktime(date("m"),date("d"),date("Y") );
// echo "Tanggal : <b>".date("d-m-Y",$tanggal)."</b>" ;
date_default_timezone_set('Asia/Jakarta');
$jamsekarang = date("H:i:s");
$jam = date("H:i:s");

//echo "| Pukul : <b>". $jam. " "."</b>" ;
$a = date("H");
if (($a>=5) && ($a<=11)) 
{
	$waktu ="Pagi";
} elseif (($a>11) && ($a<=14)) 
{
	$waktu = "Siang";
} elseif (($a>14) && ($a<=18)) 
{
	$waktu = "Sore";
} else
{
	$waktu = "Malam";
}


?>
