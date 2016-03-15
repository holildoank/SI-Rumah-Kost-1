<?
include "config/config.php";
date_default_timezone_set("Asia/Jakarta");
$tglnow = date('Y-m-d H:i:s');
$timer_pemesanan = $_GET['timer_pemesanan'];
$view = mysql_db_query($db, "select * from sewa where status='Belum Bayar'   ", $koneksi);
while ($row = mysql_fetch_array($view)) {
    $status = $row['status'];
    $id_pesan = $row['id_pesan'];
    $id_penghuni = $row['id_penghuni'];
    $timer_pemesanan = $row['timer_pemesanan'];
}

$view = mysql_db_query($db, "select * from penghuni where id_penghuni='$id_penghuni' ", $koneksi);
while ($row = mysql_fetch_array($view)) {
    $nama_p = $row['nama_p'];
    $phone = $row['phone'];
    $id_penghuni = $row['id_penghuni'];
}
$bro = $row['timer_pemesanan'];
$bro2 = $row['tanggal'];
$skrg = strtotime($tglnow);
$batal = strtotime($bro);
$buka = strtotime($bro2);
$diff = abs($tutup - $buka);
$batasq = $diff / 86400; //sehari ada 86400 detik
//
if (($timer_pemesanan <= $tglnow) && ($status == 'Belum Bayar')) {

?>
    <?php

    $view = mysql_db_query($db, "select * from tb_peringatan where id_penghuni='$id_penghuni'", $koneksi);
    while ($row = mysql_fetch_array($view)) {
        
    }
    $cek = mysql_num_rows($view);
    if (!empty($cek)) {
        
    } else {

        $noTujuan = $phone;
        $query2 = "INSERT INTO tb_peringatan (id_penghuni,phone, tgl_kirim) VALUES ('$id_penghuni','$noTujuan', '$tglnow')";
        $message = "Peringatan !! Batas Pemabayaran anda akan segera berakhir lakukan seceptanya pemabayaran jika anda serius melakukan penyewaan kost ";

        $hasil2 = mysql_query($query2);
        exec('c:\xampp\htdocs\ta-rumahkost\gammu-smsd-inject.exe -c c:\xampp\htdocs\ta-rumahkost\smsdrc EMS ' . $noTujuan . ' -text "' . $message . '"');

        $query = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noTujuan', '$message', 'Gammu')";
        $hasil = mysql_query($query);
    }
} else {
    
}
    ?>