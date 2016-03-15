<?php

include "../config/config.php";
if (isset($_POST)) {
    $query = "UPDATE kecamatan SET 
    nama_kec  = '$_POST[nama_kec]'
                             WHERE    id_kecamatan = '$_POST[id_kecamatan]' ";
    //$dbh->exec($sql);
    $dataTampil = mysql_query($query);
}
 echo "<script> document.location.href='index.php?page=5&status=<font color=Black>Berhasil merubah data</font>'; </script>";
    
?>