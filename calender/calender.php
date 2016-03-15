<?php
//bulan sekarang
$month=date("m");
//Tahun sekarang
$year=date("Y");
//hari ini
$day=date("d");
//cek jumlah hari tahun sekarang
$endDate=date("t",mktime(0,0,0,$month,$day,$year));
//style untuk table
echo '
<style>
td {
font-size:11;
font-family:verdana;
}
</style>
';
//table untuk menulis tanggal sekarang
echo '<table align="center" border="0" width="100%"   cellpadding=2 cellspacing=1 style=""><tr ><td align=center bgcolor="#5bc0de">';
echo date("D, d M Y ",mktime(0,0,0,$month,$day,$year));
echo '</td></tr></table>';
//table untuk menulis hari
echo '
<table align="center" border="0" width="100%" cellpadding=2 cellspacing=1 style="border:1px solid ">
<tr bgcolor="#EFEFEF">
<td align=center bgcolor="#A9A9A9"><font color=red>Su</font></td>
<td align=center bgcolor="#A9A9A9">Mo</td>
<td align=center bgcolor="#A9A9A9">Tu</td>
<td align=center bgcolor="#A9A9A9">We</td>
<td align=center bgcolor="#A9A9A9">Th</td>
<td align=center bgcolor="#A9A9A9">Fr</td>
<td align=center bgcolor="#A9A9A9"><font color=blue>Sa</font></td>
</tr>
';
/*
mengecek tanggal 1 bulan sekarang ada pada hari ke berapa
kemudian tambahkan cell td sebanyak var $s
*/
$s=date ("w", mktime (0,0,0,$month,1,$year));
for ($ds=1;$ds<=$s;$ds++) {
echo "<td style=\"font-family:arial;color:#B3D9FF\" width=\"15%\" align=center valign=middle bgcolor=\"#FFFFFF\">
</td>";
}
//memulai penulisan tanggal
for ($d=1;$d<=$endDate;$d++) {

//jika nilai $d (tanggal) adalah hari minggu (0) dibuat baris baru <tr>
if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }

//default warna huruf
$fontColor="#000000";
//jika tanggal adalah hari minggu warna huruf merah
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }

//jika tanggal adalah hari sabtu warna huruf biru
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sat") { $fontColor="blue"; }

//menulis tanggal
echo "<td style=\"font-family:arial;color:#333333\" width=\"15%\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>";
//jika tanggal adalah hari sabtu (6) akhiri baris </tr>
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }
}
//akhir table
echo '</table>';
?>