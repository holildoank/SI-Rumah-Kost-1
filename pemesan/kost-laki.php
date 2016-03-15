<?php
session_start();
include "config/config.php";

$username = $_SESSION['username'];
?> 

<div class="wrapper row3">
    <div class="rounded">
        <main class="container clear"> 



            <div class="wrapper row3">
                <div class="rounded">
                    <div main class="container clear"> 
                        <!-- main body --> 
                        <div id="content" class="three_quarter first"> 
                            <!-- ################################################################################################ -->

                            <h2><marquee>Selamat Datang Di Web Rumah Kost Bangkalan</marquee></h2>
                            <li class="clear">
                                <?php echo $username; ?>
                                <?php include 'config/config.php'; ?>

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
                                <?php
                                include "config/config.php";
                                $id_member = $_REQUEST['id_member'];
                                $query = mysql_db_query($db, "select nama from member where id_member='$id_member' order by nama asc limit $offset,$entries", $koneksi);
                                ?>
                                <div align="center"><? echo $_GET['status'] ?></div>
                                <br />
                                <table>
                                    <tr> 
                                        <td width="90%" bgcolor="#f0ad4e" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">SILAHKAN PILIH KOST YANG DI MINATI</font></strong></div></td>
                                    </tr>
                                    <tr>   
                                        <td>  
                                            <table> 
                                                <tr>                                             
                                                    <?
                                                    $query = mysql_db_query($db, "select * from rumah_kost   ", $koneksi); //input
                                                    $get_pages = mysql_num_rows($query);
                                                    ?>

                                                    <?
                                                    $page = (int) $_GET['id'];
                                                    $id_member = $_GET['id_member'];

                                                    $offset = $page * $entries;
                                                    $result = mysql_db_query($db, "select * from rumah_kost where jenis_kost='laki-laki'order by Nama_kost asc limit $offset,$entries", $koneksi); //output
                                                    $jumlah = mysql_num_rows($query);
                                                    if ($jumlah) {
                                                        ?>

                                                    <tr>
                                                        <td width="15%"  bgcolor="#D3D3D3">Nama KOst</td>
                                                        <td width="22%" bgcolor="#D3D3D3">Fasilitas</td>

                                                        <td width="13%" bgcolor="#D3D3D3">Jumlah kamar </td>
                                                        <td width="15%" bgcolor="#D3D3D3">Kouta </td>
                                                        <td width="13%" bgcolor="#D3D3D3">Min HARGA</td>

                                                        <td width="13%" bgcolor="#D3D3D3">AKSI  </td>
                                                    </tr>
                                                    <?
                                                    while ($row = mysql_fetch_array($result)) {
                                                        $jml_kmr = mysql_result(mysql_query("select count(*) from kamar where id_rumah='" . $row['id_rumah'] . "'"), 0);
                                                        $totalkouta = mysql_result(mysql_query("select SUM(kouta) AS totalkouta from kamar where id_rumah='" . $row['id_rumah'] . "'"), 0);
                                                        ?>                  
                                                        <?
                                                        $id_rumah = $row['id_rumah'];
                                                        $id_member = $row['id_member'];
                                                        ?>

                                                        <td align="left">
                                                            <? echo $row['Nama_kost']; ?><br>
                                                            <? echo $row['jenis_kost']; ?>
                                                        </td>
                                                        <td><?php echo $row['fasilitas']; ?></td>

                                                        <td color="black"><?php echo $jml_kmr; ?> &nbsp; Kamar</td>
                                                        <td align="left"><?php echo $totalkouta; ?>&nbsp; Orang</td>
                                                        <td color="black"><?php echo $row['harga_terendah']; ?></td>
                                                        <td align="center">
                                                            <button type="button" class=" btn-info"><a href="index.php?page=18&id_rumah=<?php echo $row['id_rumah']; ?>&id_member=<?php echo $row['id_member']; ?>">DETAIL</a></button>&nbsp;&nbsp;
                                                            <button type="button" class="btn-info">     <a  href="#" title="Klik untuk membeli" onClick="konfirm(<? echo $id_rumah; ?>,<? echo $id_member; ?>)">Pilih</a></button>
                                                        </td>
                                            </tr>
                                            <?
                                        }
                                        ?>                                                       </table>
                                        <?
                                    } else {
                                        echo "<font color='#FF0000' face='verdana' size='2'><b>Belum ada data!!</b></font>";
                                    }
                                    ?>
                                </td></tr> 
                            <tr> 
                                <td bgcolor="#f0ad4e" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF"></font></strong></div></td>
                            </tr>
                            </table>
                        </div>
                        <!-- / Middle Column --> 
                        <!-- Right Column -->
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