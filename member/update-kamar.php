<?php

include "../config/config.php";
if (isset($_POST)) {
    $query = "UPDATE kamar SET 
                                            kamar = '$_POST[kamar]',
                                            fasilitas_kamar = '$_POST[fasilitas_kamar]',
                                             kouta = '$_POST[kouta]',
                                            harga = '$_POST[harga]',
                                            waktu_sewa = '$_POST[waktu_sewa]',
                                            keterangan_kamar = '$_POST[keterangan_kamar]',

                                             id_rumah = '$_POST[id_rumah]'
         where id_kamar='$_POST[id_kamar]' ";
    $dataTampil = mysql_query($query);
    if ($query) {
        echo "<script> document.location.href='index.php?page=5&status=sukses'; </script>";
    } else {
        echo "<script> document.location.href='index.php?page=2'; </script>";
    }
}
?>
