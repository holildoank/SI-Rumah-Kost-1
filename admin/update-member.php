<?php

include "../config/config.php";
if (isset($_POST)) {
    $query = "UPDATE member SET nama = '$_POST[nama]',
                                     ktp = '$_POST[ktp]',
                                     username  = '$_POST[username]',
									 alamat  = '$_POST[alamat]',
									 tempat_lahir = '$_POST[tempat_lahir]',
									 tgl_lahir  = '$_POST[tgl_lahir]',
									 username  = '$_POST[username]',
									 no_hp  = '$_POST[no_hp]',
                                                                         No_rek = '$_POST[No_rek]',
                                                                         Bank = '$_POST[Bank]'
                                 WHERE id_member = '$_POST[id_member]' ";
    //$dbh->exec($sql);
    $dataTampil = mysql_query($query);
}
include "index.php?page=3";
?>