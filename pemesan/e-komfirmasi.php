<?php
session_start();
if ($_SESSION['id_penghuni']) {
    include "config/config.php";
    $id_penghuni = $_SESSION['id_penghuni'];
    $username = $_SESSION['username'];
    $id_member = $_GET['id_member'];
    $id_rumah = $_GET['id_rumah'];
    $id_kamar = $_GET['id_kamar'];
    ?>
    <div class="wrapper row3">
        <div class="rounded">
            <div main class="container clear"> 
                <div class="group btmspace-30"> 
                    <!-- Left Column -->
                    <?php include "kiri.php"; ?>
                    <div class="one_half" backgrou-color="yellow"> 
                        <h2><marquee>Selamat Datang Di Web Rumah Kost Bangkalan</marquee></h2>
                        <ul class="nospace listing">
                            <li class="clear">
                                <br>
                                <?
                                include "./config/config.php";
                                $query = mysql_db_query($db, "select * from sewa where id_penghuni='$id_penghuni'  order by tanggal", $koneksi);
                                $sewa = mysql_db_query($db, "select * from pesan where id_penghuni='$id_penghuni' order by tanggal", $koneksi);
                                $cek = mysql_num_rows($query);
                                if (!empty($cek)) {
                                    ?>
                                    <?
                                    $row = mysql_fetch_array($query);
                                    $id_pesan = $row['id_pesan'];
                                    $id_kamar = $row['id_kamar'];
                                    $id_member = $row['id_member'];
                                    $id_rumah = $row['id_rumah'];
                                    $status = $row['status'];
                                    $tanggal = $row['tanggal'];
                                    $batas = $row['batas'];
                                    $timer_pemesanan = $row['timer_pemesanan'];
                                    $trow = mysql_fetch_array($sewa);
                                    $id_pesan = $trow['id_pesan'];
                                    ?>
                                    <?php
                                    $transbrg = mysql_db_query($db, "select * from kamar where id_kamar='$id_kamar'", $koneksi);
                                    $row = mysql_fetch_array($transbrg);
                                    $kamar = $row['kamar'];
                                    $harga = $row['harga'];
                                    $kouta = $row['kouta'];
                                    $waktu_sewa = $row['waktu_sewa'];
                                    $total = $harga * $waktu_sewa;
                                    ?>
                                    <?php
                                    $transbrg = mysql_db_query($db, "select * from penghuni where id_penghuni='$id_penghuni'", $koneksi);
                                    while ($row = mysql_fetch_array($transbrg)) {
                                        $nama_p = $row['nama_p'];
                                    }
                                    ?>
                                      <?php
                                    $transbrg = mysql_db_query($db, "select * from member where id_member='$id_member'", $koneksi);
                                    while ($row = mysql_fetch_array($transbrg)) {
                                        $nama = $row['nama'];
                                        $Bank =$row['Bank'];
                                        $No_rek=$row['No_rek'];
                                        $no_hp=$row['no_hp'];
                                    }
                                    ?>
                                    <?php
                                    $transbrg = mysql_db_query($db, "select * from rumah_kost where id_rumah='$id_rumah'", $koneksi);
                                    $row = mysql_fetch_array($transbrg);
                                    $Nama_kost = $row['Nama_kost'];
                                    $alamat_kost = $row['alamat_kost'];
                                    ?>
                                    <table >
                                        <tr>
                                            <th colspan="3" bgcolor="#5bc0de" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">TERIMAKASIH TELAH MELAKUKAN PEMESANAN KAMAR KOST</font></strong></div></th>
                                        </tr>
                                        <p><font color='#0066FF' face='verdana' size='2'><div align="center"><? echo $_GET['status'] ?></div></font></p>
                                        <tr>

                                            <th>Rumah Kost</th>
                                            <th class="left"><? echo $Nama_kost; ?></th>
                                            <th></th>
                                        <tr>

                                            <th>Alamat Kost</th>
                                            <th class="left"><? echo $alamat_kost; ?></th>
                                            <th></th>
                                        </tr>
                                        </tr>
                                        <tr>   
                                            <th>Kamar</th>
                                            <th class="left"><? echo $kamar; ?></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <th><? echo "Rp " . $harga; ?>/Bulan</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th>Waktu sewa</th>
                                            <th ><? echo $waktu_sewa; ?>&nbsp;&nbsp;Bulan </th>

                                            <th> </th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th><font color="red" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $status; ?></font></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th colspan="2">
                                        <p><b>TOTAL</b><? echo " : Rp " . $total; ?></p></th>
                                        <th></th>
                                    </tr><tr><th></th><th colspan="2">
                                            <button type="button" class="btn-info"> <a href="pemesan/kartupemesanan.php" target='_blank'> Lanjutkan</a></button>
                               
                                    <button type="button" class="btn-info">  <a href="index.php?page=12&id_penghuni=<? echo $id_penghuni; ?>&nama_p=<? echo $nama_p; ?>&id_member=<?php echo $id_member; ?>&id_pesan=<?php echo $id_pesan; ?>&id_kamar=<?php echo $id_kamar; ?>" onclick="return confirm('Anda yakin akan menghapus data Ini ?')">Batal</a></button>
                                </th>
                                </tr>
                                <tr>
                                    <th colspan="3">Silahkan lakukan pembayaran </th>
                                </tr>
                                <tr>
                                    <th colspan="3">Ke Rekening <?php echo $Bank; ?>&nbsp;&nbsp;<?php echo $No_rek;?> </th>
                                    
                                </tr>
                                 <tr>
                                     <th colspan="2">Atas Nama &nbsp;&nbsp;<?php echo $nama; ?></th>
                                    <th></th>
                                </tr>
                                <tr>
                                     <th colspan="2">Batas Pembayaran &nbsp;&nbsp;<?php echo $timer_pemesanan; ?></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="2">Jika sudah Melakukan pembayaran silahkan lakukan komfirasi Via SMS &nbsp;&nbsp;<?php echo $no_hp;?></th>
                                    <th></th>
                                </tr>
                                <!--                                                        </table>-->
                                <?
                            } else {
                                echo "<p align=center><font face='verdana' size='2' color='red'>Maaf, Belum ada Kamar yang Anda pilih<br><br></font></p>";
                            }
                            ?>



                        </table>
                        <!----->
                    </li>
                </ul>
            </div>
            <?php
            session_start();

            if ($_SESSION['id_penghuni']) {

                include "pemesan/statuss.php";
            } else {
                include "./login.php";
            }
            ?>
            <!-- / Right Column --> 
        </div>

    </div>
    </div>
    <div class="clear"></div>
    </main>
    </div>
    <?php
} else {
    echo "<script> document.location.href='index.php?page=1&status=<font color=red>Maaf, Sebelum transaksi Anda harus daftar dan login member </font>'; </script>";
}
?>