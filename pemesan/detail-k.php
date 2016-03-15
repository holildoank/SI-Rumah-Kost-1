<?php
include "config/config.php";

$id_member = $_GET['id_member'];
$id_rumah = $_GET['id_rumah'];
$id_kecamatan = $_GET['id_kecamatan'];
$id_kelurahan = $_GET['id_kelurahan'];
?> 
<script language="javascript">
                        
    function konfirm(id_rumah,id_member)
    {
        tanya=confirm("Apakah anda yakin akan memlih kost ini ?")
        if (tanya !="0")
        {
            //top.location="index.php?page=6&id_kamar="+id_kamar+"&id_rumah="+id_rumah+"&id_member"+id_member+"";
            top.location="index.php?page=5&id_rumah="+id_rumah+"&id_member="+id_member;
        }
    }
    //-->
</script>
<div class="wrapper row3">
    <div class="rounded">
        <div main class="container clear"> 
            <div class="group btmspace-30"> 
                <!-- Left Column -->
                <?php include "kiri.php"; ?>
                <div class="one_half" backgrou-color="yellow"> 
                    <!-- ################################################################################################ -->
                    <h2><marquee>Selamat Datang Di Web Rumah Kost Bangkalan</marquee></h2>
                    <ul class="nospace listing">
                        <li class="clear">
                            <?
                            include "./config/config.php";
                            $query = mysql_db_query($db, "select * from rumah_kost where id_member='$id_member'  order by Nama_kost", $koneksi);

                            $cek = mysql_num_rows($query);
                            ?>
                            <?
                            $row = mysql_fetch_array($query);

                            $id_member = $row['id_member'];
                            $id_rumah = $row['id_rumah'];
                            $Nama_kost = $row['Nama_kost'];
                            $alamat_kost = $row['alamat_kost'];
                            $jenis_kost = $row['jenis_kost'];
                            $fasilitas = $row['fasilitas'];
                            $lain_lain = $row['lain_lain'];
                            $harga_terendah = $row['harga_terendah'];
                            $id_kelurahan = $row['id_kelurahan'];

                            $id_kecamatan = $row['id_kecamatan'];
                            ?>
                            <?php
                            $transbrg = mysql_db_query($db, "select * from member where id_member='$id_member'", $koneksi);
                            while ($row = mysql_fetch_array($transbrg)) {
                                $nama = $row['nama'];
                                $Bank = $row['Bank'];
                                $No_rek = $row['No_rek'];
                                $no_hp = $row['no_hp'];
                            }
                            ?>
                            <?php
                            $transbrg = mysql_db_query($db, "select * from kecamatan where id_kecamatan='$id_kecamatan'", $koneksi);
                            while ($row = mysql_fetch_array($transbrg)) {
                                $nama_kec = $row['nama_kec'];
                            }
                            ?>
                            <?php
                            $transbrg = mysql_db_query($db, "select * from kelurahan where id_kelurahan='$id_kelurahan'", $koneksi);
                            while ($row = mysql_fetch_array($transbrg)) {
                                $nama_kel = $row['nama_kel'];
                            }
                            ?>
                            <table >
                                <tr>
<!--                                    <th colspan="3" bgcolor="#5bc0de" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">////</font></strong></div></th>-->
                                </tr>
                                <p><font color='#0066FF' face='verdana' size='2'><div align="center"><? echo $_GET['status'] ?></div></font></p>
                                <tr>

                                    <th colspan="2" class="left">Rumah Kost</th>
                                    <th class="left"><? echo $Nama_kost; ?></th>
                                    <th></th>
                                <tr>


                                    <th colspan="2" class="left">Fasilitas Kost</th>
                                    <th colspan="2"><? echo $fasilitas; ?></th>

                                </tr>
                                <tr>


                                    <th colspan="2" class="left">Harga Paling murah/penghuni</th>
                                    <th colspan="2"><? echo $harga_terendah; ?>/Bulan</th>

                                </tr>
                                <tr><th class="left">Catatan</th><th></th>:
                                    <th colspan="2"><? echo $lain_lain; ?></th>
                                </tr> 
                                <tr><th class="left">Kelurahan</th><th></th>:
                                    <th colspan="2"><? echo $nama_kel; ?></th>
                                </tr>  
                                <tr><th class="left">Kecamatan</th><th></th>:
                                    <th colspan="2"><? echo $nama_kec; ?></th>
                                </tr>   

                                </tr>
                                <tr>   
                                    <th colspan="2" class="left">Jenis Kost</th>
                                    <th class="left"><? echo $jenis_kost; ?></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="2" class="left">Nama Pemilik</th>
                                    <th colspan="2"><? echo $nama; ?></th>

                                </tr>
                                <tr>
                                    <th colspan="2" class="left">No HP</th>
                                    <th><? echo $no_hp; ?></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="left">Metode Pembayaran yang di sediakan Adalah Via Bank</th>
                                </tr>
                                <tr><th class="left">BANK </th><th></th>:<th colspan="2"><?php echo $Bank; ?></th>
                                </tr>
                                <tr><th class="left">No Rek</th><th></th>:
                                    <th colspan="2"><? echo $No_rek; ?></th>
                                </tr>
                                <tr><th class="left">Atas Nama</th><th></th>:
                                    <th colspan="2"><? echo $nama; ?></th>
                                </tr> 

                                <tr>
                                    <th colspan="4">Info Lebih Lanjut Silahkan Hubungi Alamat di Atas</th>

                                </tr> 

<tr><th colspan="4">
                                        <button type="button" class="btn-info"> <a  href="index.php?page=2" title="Klik untuk melihat kamar">Kembali</a></button>
                                    </th>        </tr>
                                <tr><th colspan="4">
                                        <button type="button" class="btn-info"> <a  href="#" title="Klik untuk melihat kamar" onClick="konfirm(<? echo $id_rumah; ?>,<? echo $id_member; ?>)">Lanjutkan Untuk Melihat Kamar</a></button>
                                    </th>        </tr>
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