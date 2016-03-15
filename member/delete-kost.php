<? session_start();
if ($_SESSION['id_member']) 
{
	   include "../config/config.php";
	$id_rumah=$_GET['id_rumah'];
        $id_member=$_GET['id_member'];
	
	$hasil=mysql_db_query($db,"delete from rumah_kost where id_rumah='$id_rumah' and id_member='$id_member'",$koneksi);
	
	if ($hasil)
	{
		?><script> document.location.href='index.php?page=3&status=Data sudah di hapus'; </script><?
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