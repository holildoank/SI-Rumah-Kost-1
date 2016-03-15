<? session_start();
if ($_SESSION['id_member']) 
{
	   include "../config/config.php";
	$id_penghuni=$_GET['id_penghuni'];
	$id_pesan=$_GET['id_pesan'];
	$id_pesan=$_GET['id_pesan'];
	
	$hasil=mysql_db_query($db,"delete from pesan where id_pesan='$id_pesan' and id_penghuni='$id_penghuni'",$koneksi);
	$pemesanan=mysql_db_query($db,"delete from sewa where id_pesan='$id_pesan' and id_penghuni='$id_penghuni'",$koneksi);
	if ($hasil)
	{
		?><script> document.location.href='index.php?page=9&status=Data sudah di hapus'; </script><?
	}
	else
	{
		echo "Proses Penghapusan data gagal";
		echo mysql_error();
	}
	

}else{
	echo "<script> document.location.href='index.php?page=1'; </script>";
}
?>