<?php

session_start();

if ($_SESSION['id_penghuni']) {
    include "config/config.php";
    $id_penghuni = $_SESSION['id_penghuni'];
    $id_member = $_GET['id_member'];
    $id_kamar = $_GET['id_kamar'];
    $id_rumah = $_GET['id_rumah'];
    $kouta = $_GET['kouta'];
    date_default_timezone_set("Asia/Jakarta");
    $tanggal = date('Y-m-d H:i:s');

    $waktu_sewa = $_GET['waktu_sewa'];
    $view = mysql_db_query($db, "select * from kamar where id_kamar='$id_kamar' and id_rumah='$id_rumah' and id_member='$id_member'  ", $koneksi);
    while ($row = mysql_fetch_array($view)) {
        $kamar = $row['kamar'];
        $waktu_sewa = $row['waktu_sewa'];
        $akhir = $row['waktu_sewa'] * 31;
    }
    $batast = mktime(0, 0, 0, date("n"), date("j") + $akhir, date("Y"), date("H"));
    $batas = date("Y-m-d H:i:s", $batast);

    $timer = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"), date("H"));
    $timer_pemesanan = date("Y-m-d H:i:s", $timer);

    $view = mysql_db_query($db, "select * from penghuni where id_penghuni='$id_penghuni'", $koneksi);
    while ($row = mysql_fetch_array($view)) {
        $nama_p = $row['nama_p'];
        $phone = $row['phone'];
    }
    $view = mysql_db_query($db, "select * from member where id_member='$id_member'", $koneksi);
    while ($row = mysql_fetch_array($view)) {
        $nama = $row['nama'];
        $no_hp = $row['no_hp'];
    }
    $view = mysql_db_query($db, "select * from rumah_kost where id_rumah='$id_rumah' and id_member='$id_member' ", $koneksi);
    while ($row = mysql_fetch_array($view)) {
        $Nama_kost = $row['Nama_kost'];
    }
    $view = mysql_db_query($db, "select * from kamar where id_kamar='$id_kamar' and id_rumah='$id_rumah' and id_member='$id_member'  ", $koneksi);
    while ($row = mysql_fetch_array($view)) {
        $kamar = $row['kamar'];
        $waktu_sewa = $row['waktu_sewa'];
        $harga = $row['harga'];
        $kouta = $row['kouta'];
        $total = $row['harga'] * $row['waktu_sewa'];
    }

    $view = mysql_db_query($db, "select * from sewa where id_penghuni='$id_penghuni'", $koneksi);
    while ($row = mysql_fetch_array($view)) {
        $status = $row['status'];
    }
    $cek = mysql_num_rows($view);
    if (!empty($cek)) {
        echo "<script> document.location.href='index.php?page=2&status=<font color=Black>Maaf,transaksi Anda tidak dapat proses krena anda  sudah memesan kamar di salah satu rumah kost</font>'; </script>";
    }  else {
        
        if ($kouta == 0) {

            echo "<script> document.location.href='index.php?page=10&status=<font color=Black>Mohon Maaf Kouta Kamar ini sudah penuh silahkan pilih kamar lain</font>'; </script>";
        } else {

            $query = mysql_db_query($db, "insert into pesan(id_penghuni,id_rumah,id_kamar,id_member,tanggal) values('$id_penghuni','$id_rumah','$id_kamar','$id_member','$tanggal')", $koneksi);
            $transaksi = mysql_db_query($db, "insert into sewa(id_penghuni,id_rumah,id_kamar,id_member,tanggal,batas,timer_pemesanan,status) values('$id_penghuni','$id_rumah','$id_kamar','$id_member','$tanggal','$batas','$timer_pemesanan','Belum Bayar')", $koneksi);
            $query2 = mysql_db_query($db, "UPDATE kamar SET kouta=(kouta-1) WHERE id_kamar=$id_kamar ", $koneksi) or die("Gagal Masuk" . mysql_error());

            $noTujuan = $no_hp;
            $message = "Kami memberitahukan Bahwa $nama_p pada tanggal $tanggal telah memesan kamar $kamar di rumah Kost anda $Nama_kost Silahkan Cec akun anda ";

            exec('c:\xampp\htdocs\ta-rumahkost\gammu-smsd-inject.exe -c c:\xampp\htdocs\ta-rumahkost\smsdrc EMS ' . $noTujuan . ' -text "' . $message . '"');

            $query = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noTujuan', '$message', 'Gammu')";
            $hasil = mysql_query($query);

            $noTujuan = $phone;
            $message = "Terimakasih Anda telah memesan kamar $kamar di $Nama_kost pada tanggal $tanggal  silahkan melakukan pembayaran $total ";

            exec('c:\xampp\htdocs\ta-rumahkost\gammu-smsd-inject.exe -c c:\xampp\htdocs\ta-rumahkost\smsdrc EMS ' . $noTujuan . ' -text "' . $message . '"');

            $query = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noTujuan', '$message', 'Gammu')";
            $hasil = mysql_query($query);
        }}
        echo "<script> document.location.href='index.php?page=7&status=Terimakasih, Kamar yang anda pilih sudah masuk ke Database Kami'; </script>";
} else {
    
    echo "<script> document.location.href='index.php?page=2&status=<font color=red>Maaf, Sebelum transaksi Anda harus daftar dan login member </font>'; </script>";
}
?>