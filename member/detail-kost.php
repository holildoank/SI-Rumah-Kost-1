<?php

include "../config/config.php";
$id_member = $_SESSION['id_member'];
$id_rumah = $_GET['id_rumah'];
?>
<?php

$ambil = mysql_query("select * from rumah_kost where id_rumah='$id_rumah' and id_member='$id_member'");
$t = mysql_fetch_array($ambil);
echo "<div class='row mt'>
    <div class='col-lg-12'>
        <div class='form-panel'>
          
       
                   <center> <table class='tabelform tabpad'>
                        
              <tr>
	<td><font size='4'>Nama Kost</font></td><td>:</td><td><font size='4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$t[Nama_kost]</font></td>
	</tr>
  <tr>
	<td><font size='4'>Alamat Kost</font></td><td>:</td><td><font size='4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$t[alamat_kost]&nbsp;Bulan</font></td>
	</tr>
<tr>
             <td><font size='4'>Kecamatan</font></td><td>:</td><td><font size='4'>&nbsp;";
$query = mysql_query("select *from kecamatan");
$data = mysql_fetch_array($query);
echo "<option value='$data[id_kecamatan]'>$data[nama_kec]</option>";
echo "</font></td></td></tr>
<tr>
             <td><font size='4'>Kelurahan / Desa</font></td><td>:</td><td ><font size='4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$query = mysql_query("select *from kelurahan");
$data = mysql_fetch_array($query);
echo "<option value='$data[id_kelurahan]'>$data[nama_kel]</option>";
echo "</font></td></td></tr>

    
   <tr>
	<td><font size='4'>Fasilitas</font></td><td>:</td><td><font size='4'>&nbsp;$t[fasilitas]</font></td>
</tr>
<tr>
</td></td></tr>
     <tr>
	<td><font size='4'>Keterangan</font></td><td>:</td><td><font size='4'>&nbsp;$t[lain_lain]</font></td>
</tr>
 <tr>
	<td><font size='4'>Tipe Kost</font></td><td>:</td><td><font size='4'>&nbsp;$t[jenis_kost]</font></td>
</tr>
 <tr>
	<td><font size='4'>Harga minimal </font></td><td>:</td><td><font size='4'>&nbsp;$t[harga_terendah]</font></td>
</tr>

            
            
            
            
                    </table>
</center> </div></div></div>";
?>
        



