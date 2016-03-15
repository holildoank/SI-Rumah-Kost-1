<?php

include "config/config.php";

$id = $_POST['id'];

$query = mysql_query("select * from kelurahan where id_kecamatan='" . $id . "'");
$row = mysql_num_rows($query);
if ($row > 0) {
    while ($data = mysql_fetch_array($query)) {
        echo "<option value=" . $data["id_kelurahan"] . ">" . $data["kelurahan"] . "</option>";
    }
}
?>
