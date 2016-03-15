<?php
include "../config/config.php";
if (isset($_GET['id_member'])) {
    mysql_query("DELETE FROM member WHERE id_member = '$_GET[id_member]'");
}
header("location:index.php?page=3")
?>