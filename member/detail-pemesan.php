<?php

include "../config/config.php";
$id_member = $_SESSION['id_member'];
$id_pesan = $_GET['id_pesan'];
$id_penghuni = $_GET['id_penghuni'];
?>
<?php

$ambil = mysql_query("select * from sewa where id_pesan='$_GET[id_pesan]'");
$t = mysql_fetch_array($ambil);
echo "<div class='row mt'>
    <div class='col-lg-12'>
        <div class='form-panel'>
          
        <h2 class='head'><center>Data Pemesan  Kamar</center></h2><br>
                   <center> <table class='tabelform tabpad'>
                    <tr>
	<td></td><td><b><font size='15' color='red'>$t[status]</font></b></td>
	</tr>
                        <tr>
                            <td><font size='4'>Nama</font></td><td>:</td><td><font size='4'>";
$bag = mysql_query("select * from penghuni where id_penghuni='$t[id_penghuni]'");
$p = mysql_fetch_array($bag);
echo "$p[nama_p]";
echo "</font></td></td></tr>
              <tr>
	<td><font size='4'>No Hp</font></td><td>:</td><td><font size='4'>$p[phone]</font></td>
	</tr>
   <tr>
	<td><font size='4'>Alamat Pemesan</font></td><td>:</td><td><font size='4'>$p[alamat]</font></td>
	</tr>
   <tr>
	<td><font size='4'>Jenis Klamin</font></td><td>:</td><td><font size='4'>$p[jk]</font></td>
	</tr>
            <tr><td ><b><i><font size='4'>Telah Menyewa Kamar</font></i></b></td></tr>         
  <tr>
             <td><font size='4'>Kamar</font></td><td>:</td><td><font size='4'>";
$bag = mysql_query("select * from kamar where id_kamar='$t[id_kamar]'");
$p = mysql_fetch_array($bag);

echo "$p[kamar]";
echo "</font></td></td></tr>
  <tr>
	<td><font size='4'>Lama Sewa</font></td><td>:</td><td><font size='4'>$p[waktu_sewa]&nbsp;Bulan</font></td>
	</tr>
            <tr>
	<td><font size='4'>Total Yang Harus Di Bayar</font></td><td>:</td><td><font size='4'>&nbsp;Rp.$p[harga]/Bulan</font></td>
	</tr>
<tr>
             <td><font size='4'>Rumah Kost</font></td><td>:</td><td><font size='4'>";
$bag = mysql_query("select * from rumah_kost where id_rumah='$t[id_rumah]'");
$p = mysql_fetch_array($bag);

echo "$p[Nama_kost]";
echo "</font></td></td></tr>
    
   <tr>
	<td><font size='4'>Alamat</font></td><td>:</td><td><font size='4'>&nbsp;$p[alamat_kost]</font></td>
</tr>
<tr>
             <td><font size='4'>Pemilik</font></td><td>:</td><td><font size='4'>";
$bag = mysql_query("select * from member where id_member='$t[id_member]'");
$p = mysql_fetch_array($bag);

echo "$p[nama]";
echo "</font></td></td></tr>
     <tr>
	<td><font size='4'>Alamat Pemilik Kost</font></td><td>:</td><td><font size='4'>&nbsp;$p[alamat]</font></td>
</tr>
 <tr>
	<td><font size='4'>Telpon</font></td><td>:</td><td><font size='4'>&nbsp;$p[no_hp]</font></td>
</tr>
 <tr>
	<td></td>
</tr>


            
            
            
            
                    </table>
</center> </div></div></div>";
?>
        



