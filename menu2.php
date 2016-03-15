<?php
include "config/config.php";
$id_penghuni = $_SESSION['id_penghuni'];
$username = $_SESSION['username'];
$query=mysql_db_query($db,"select * from penghuni where id_penghuni='$id_penghuni' ",$koneksi);
?><li><b><a href="index.php?page=7">Data Pesanan</a></b></li>
<li><b><a href="Logout.php">LOGOUT</a></b></li>
<li><h3><font color="gren"><?php echo $username; ?></font></h3></li>                   