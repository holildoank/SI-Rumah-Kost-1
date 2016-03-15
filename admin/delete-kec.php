<?php
include "../config/config.php";
if (isset($_GET['id_kecamatan'])) {
    mysql_query("DELETE FROM kecamatan WHERE id_kecamatan = '$_GET[id_kecamatan]'");
}
header("location:index.php?page=5")
?>