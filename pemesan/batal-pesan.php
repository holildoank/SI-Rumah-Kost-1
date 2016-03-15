<?
session_start();
if ($_SESSION['id_penghuni']) {
    include "config/config.php";
    $id_penghuni = $_SESSION['id_penghuni'];
    $id_member = $_GET['id_member'];
    $id_pesan = $_GET['id_pesan'];
    $id_penghuni = $_GET['id_penghuni'];
    $id_kamar = $_GET['id_kamar'];
    $kouta = $_GET['kouta'];
    $id_rumah = $_GET['id_rumah'];
     $view = mysql_db_query($db, "select * from penghuni where id_penghuni='$id_penghuni'", $koneksi);
    while ($row = mysql_fetch_array($view)) {
        $nama_p = $row['nama_p'];
        $phone = $row['phone'];
    }
    $pemesanan = mysql_db_query($db, "delete from sewa where  id_penghuni='$id_penghuni' ", $koneksi);

    $query2 = mysql_db_query($db, "UPDATE kamar SET kouta=(kouta+1) WHERE id_kamar='$id_kamar'  ", $koneksi) or die("Gagal Masuk" . mysql_error());
    

    $noTujuan = $phone;
    $message = "Pemesanan Kamar kost Anda Telah di batalkan  ";

    exec('c:\xampp\htdocs\ta-rumahkost\gammu-smsd-inject.exe -c c:\xampp\htdocs\ta-rumahkost\smsdrc EMS ' . $noTujuan . ' -text "' . $message . '"');

    $query = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noTujuan', '$message', 'Gammu')";
    $hasil = mysql_query($query);
    if ($pemesanan) {
        ?><script> document.location.href='index.php?page=2&status=Pembatalan pemesanan sukses'; </script><?
    } else {
        echo "Proses Penghapusan data gagal";
        echo mysql_error();
    }
} else {
    echo "<script> document.location.href='index.php?page=1'; </script>";
}
?>