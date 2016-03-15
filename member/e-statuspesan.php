<?php
session_start();

if ($_SESSION['id_member']) {

    //koneksi terpusat
    include "../config/config.php";
    $username = $_SESSION['username'];
    $nama_p = $_GET['nama_p'];
    $id_pesan = $_GET['id_pesan'];
    date_default_timezone_set("Asia/Jakarta");
    $tanggal = date('Y-m-d H:i:s');
    $id_penghuni = $_GET['id_penghuni'];
    $id_kamar = $_GET['id_kamar'];
    $kamar = $_GET['kamar'];
    $id_rumah = $_GET['id_rumah'];
    $Nama_kost = $_GET['Nama_kost'];
    $view = mysql_db_query($db, "select * from penghuni where id_penghuni='$id_penghuni'", $koneksi);
    while ($row = mysql_fetch_array($view)) {
        $nama_p = $row['nama_p'];
        $phone = $row['phone'];
    }
    $view = mysql_db_query($db, "select * from member where id_member='$id_member'", $koneksi);
    while ($row = mysql_fetch_array($view)) {
        $nama = $row['nama'];
    }
    $tampil = mysql_db_query($db, "select * from rumah_kost where id_rumah='$id_rumah' ", $koneksi);
    while ($row = mysql_fetch_array($tampil)) {
        $Nama_kost = $row['Nama_kost'];
    }
    $tampil = mysql_db_query($db, "select * from kamar where id_kamar='$id_kamar' ", $koneksi);
    while ($row = mysql_fetch_array($tampil)) {
        $kamar = $row['kamar'];
    }
    $view = mysql_db_query($db, "select * from sewa where id_penghuni='$id_penghuni'", $koneksi);
    while ($row = mysql_fetch_array($view)) {
        $status = $row['status'];
    }
    if (isset($_POST['ubah'])) {
        $id_penghuni = $_POST['id_penghuni'];
        $status = $_POST['status'];
//        $querys = mysql_db_query($db, "select * from sewa where id_penghuni='$id_penghuni' && status='Belum Bayar'", $koneksi);
//        while ($ggd = mysql_fetch_array($querys))

        $simpan = mysql_query("UPDATE sewa SET status='$_POST[status]' where id_pesan='$id_pesan' and id_penghuni='$id_penghuni' ", $koneksi);

        if ($simpan) {

            $noTujuan = $phone;
            $message = "Pemesanan Anda terhadap kamar $kamar di sebuah rumah kost $Nama_kost milik $nama telah di komfirmasi pada tanggal $tanggal dengan Status $status";

            exec('c:\xampp\htdocs\ta-rumahkost\gammu-smsd-inject.exe -c c:\xampp\htdocs\ta-rumahkost\smsdrc EMS ' . $noTujuan . ' -text "' . $message . '"');

            $query = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noTujuan', '$message', 'Gammu')";
            $hasil = mysql_query($query);
            echo "<script> document.location.href='index.php?page=9'; </script>";
        } else {
            echo "gagal";
        }
    } else {
        unset($_POST['si,,mpan']);
    }
    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <form method="post" class="form-horizontal style-form" >
                    <font face="verdana" size="2">Ganti status pemesanan untuk pelanggan :  <? echo $nama_p; ?><?php echo $kamar; ?></font><br /><br><br /> 
                    <input type="hidden" name="id_penghuni" value="<? echo $id_penghuni; ?>" />
                    <select name="status"  id="">
                        <option value="lunas">Lunas</option>
                        <option value="Proses">Proses</option>

                    </select>
                    <input type="submit" value="Ubah" name="ubah">		
                </form>

    <?
} else {
    echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>
        </div>
    </div>
</div>