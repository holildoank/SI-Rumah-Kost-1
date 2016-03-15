<?php  session_start();
if(isset($_SESSION['username']))
{
	session_destroy();
	header('Location:index.php?page=1&status=Anda sudah Keluar');
}else{
	session_destroy();
	header('Location:index.php?page=1&status=Silahkan Login!');
}
?>