<?php  session_start();
if(isset($_SESSION['username']))
{
	session_destroy();
	header('Location:index.php?status=Anda sudah Keluar');
}else{
	session_destroy();
	header('Location:index.php?status=Silahkan Login!');
}
?>
<li><a class="logout" href="logout.php">Logout</a></li>