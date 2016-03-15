<?php
session_start();
if ($_SESSION['id_penghuni']) {
    include "../config/config.php";
    $id_penghuni = $_SESSION['id_penghuni'];
    $username = $_SESSION['username'];
    $id_pesan = $_GET['id_pesan'];
    $id_kamar = $_GET['id_kamar'];
    $kamar = $_GET['kamar'];

    $id_member = $_GET['id_member'];
    ?>
    <div class="page">
        <div class="header"><BR>
            <br></br>
            <center> <img src="../images/demo/slider/headerholil.png" alt="">
                <div class="h1">TIKET E-RUMAH KOST</div>  
                <div class="h3">PUSAT RUMAH KOST ONLINE BANGKALAN</div>
                <div class="h3">Telp.  (0328) 662494, 662129, 662979. No. Fax. (0328) 662257</div></center>
        </div>
        <?php
        $ambil = mysql_query("select * from sewa where id_penghuni='$id_penghuni'");
        $t = mysql_fetch_array($ambil);
        echo "<div class='row mt'>
    <div class='col-lg-12'>
        <div class='form-panel'>
         <tr>
	<td><b>$t[status]</b></td>
	</tr>

                   <center> <table class='tabelform tabpad'>
                        <tr>
                            <td>Nama</td><td>:</td><td>";
        $bag = mysql_query("select * from penghuni where id_penghuni='$t[id_penghuni]'");
        $p = mysql_fetch_array($bag);
        echo "$p[nama_p]";
        echo "</td></td></tr>
              <tr>
	<td>Email</td><td>:</td><td>$p[email]</td>
	</tr>
            <tr><td ><b><i>Telah Menyewa Kamar</i></b></td></tr>         
  <tr>
             <td>Kamar</td><td>:</td><td>";
        $bag = mysql_query("select * from kamar where id_kamar='$t[id_kamar]'");
        $p = mysql_fetch_array($bag);

        $total = $p[harga] * $p[waktu_sewa];
        echo "$p[kamar]";
        echo "</td></td></tr>
  <tr>
	<td>Lama Sewa</td><td>:</td><td>$p[waktu_sewa]&nbsp;Bulan</td>
	</tr>
            <tr>
	<td>Total Yang Harus Di Bayar</td><td>:</td><td>&nbsp;Rp.$total Bulan</td>
	</tr>
<tr>
             <td>Rumah Kost</td><td>:</td><td>";
        $bag = mysql_query("select * from rumah_kost where id_rumah='$t[id_rumah]'");
        $p = mysql_fetch_array($bag);

        echo "$p[Nama_kost]";
        echo "</td></td></tr>
    
   <tr>
	<td>Alamat</td><td>:</td><td>&nbsp;$p[alamat_kost]</td>
</tr>
<tr>
             <td>Pemilik</td><td>:</td><td>";
        $bag = mysql_query("select * from member where id_member='$t[id_member]'");
        $p = mysql_fetch_array($bag);

        echo "$p[nama]";
        echo "</td></td></tr>
     <tr>
	<td>Alamat Pemilik Kost</td><td>:</td><td>&nbsp;$p[alamat]</td>
</tr>
 <tr>
	<td>Telpon</td><td>:</td><td>&nbsp;$p[no_hp]</td>
</tr>
    <tr>
	<td>Silahkan lakukan Pembayaran secepatnya Ke No Rek : $p[No_rek]</td>
</tr>
     <tr>
	<td>Bank</td><td>:</td><td>&nbsp;$p[Bank]</td>
</tr>
     <tr>
	<td>Atas Nama $p[nama]</td>
</tr>
                   </table>
</center> </div></div></div>";
        ?>

        <?php
    } else {
        echo "<script> document.location.href='index.php?page=1&status=<font color=red>Maaf, Sebelum transaksi Anda harus daftar dan login member </font>'; </script>";
    }
    ?>


