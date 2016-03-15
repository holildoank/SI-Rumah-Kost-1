<?php

include "config/config.php";

$id_kecamatan = $_GET["kecamatan"];

$query = mysql_query("select * from kelurahan where id_kecamatan=' $id_kecamatan'");

echo"<option>--Pilih Kelurahan--</option>";
    while ($tampil = mysql_fetch_array($query)) {
        echo "<option value='$tampil[id_kelurahan]'>$tampil[nama_kel] ";
   
}
?>
