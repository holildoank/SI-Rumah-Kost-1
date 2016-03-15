<?php

session_start();
include "config/config.php";

$username = $_SESSION['username'];

?> 
<div class="wrapper row3">
    <div class="rounded">
        <div main class="container clear"> 
            <!-- main body --> 
            <!-- ################################################################################################ -->
            <div class="group btmspace-30">
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
                    $query = mysql_db_query($db,"select nama from member where id_member='$id_member' order by nama asc limit $offset,$entries", $koneksi);
                    
                    ?>
                     <div align="center"><? echo $_GET['status'] ?></div>
                    <br />
                    <table width="42%" border="0" cellpadding="0" cellspacing="0" bordercolor="#ffffff" align="center">
                        <tr> 
                            <td width="90%" bgcolor="#008000" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">SILAHKAN PILIH KOST YANG DI MINATI</font></strong></div></td>
                        </tr>
                        <tr>   
                            <td>  
                                <table width="505" align="center"> 
                                    <tr><td width="497">     
                                            <div align="center">

                                                <p><font color='#0066FF' face='verdana' size='2'>
<!--                                                <div align="center"><? echo $_GET['status'] ?></div>-->
                                                </font>
                                            </div>
                                            <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
                                                <?
                                                //untuk paging
                                                $query = mysql_db_query($db, "select * from rumah_kost   ", $koneksi); //input
                                                $get_pages = mysql_num_rows($query);

                                                if ($get_pages > $entries) {  //proses
                                                    echo "Halaman : ";
                                                    $pages = 1;
                                                    while ($pages <= ceil($get_pages / $entries)) {
                                                        if ($pages != 1) {
                                                            echo " | ";
                                                        }
                                                        ?>
                                                        <a href="index.php?page=5&id=<? echo ($pages - 1); ?> " style="text-decoration:none"><font color="#0066FF"><? echo $pages; ?></font></a> 
                                                        <?
                                                        $pages++;
                                                    }
                                                } else {
                                                    $pages = 0;
                                                }
                                                ?>
                                                </font>
                                                </p>
                                                <?
                                                $page = (int) $_GET['id'];
                                                $offset = $page * $entries;
                                                $result = mysql_db_query($db, "select * from rumah_kost order by Nama_kost asc limit $offset,$entries", $koneksi); //output
                                                $jumlah = mysql_num_rows($query);
                                                if ($jumlah) {
                                                    ?>
                                                </div>
                                        <tr bgcolor="">
                                            <td width="26%" bgcolor="white"><div align="center"><b>
                                                        <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">GAMBAR</font></b></div>
                                            </td>
                                            <td width="39%" bgcolor="white"><div align="center"><b>
                                                        <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">Nama KOst</font></b></div></td>
                                            <td width="22%" bgcolor="white"><div align="center"><b>
                                                        <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">Alamat</font></b></div>
                                            </td>
                                            <td width="22%" bgcolor="white"><div align="center"><b>
                                                        <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">Jumlah kamar</font></b></div>
                                            </td>
                                            <td width="13%" bgcolor="white"><div align="center"><b>
                                                        <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">AKSI</font></b></div>
                                            </td>
                                        </tr>
                                        <?
                                        while ($row = mysql_fetch_array($result)) {
                                            $jml_kmr = mysql_result(mysql_query("select count(*) from kamar where id_rumah='" . $row['id_rumah'] . "'"), 0);
                                            ?>
                                            <tr>
                                                <td align="center" valign="top">
                                                    <?
//                                                      $gambar = $row['gambar'];
//                                                    $pic = substr($gambar, 15, 40);
                                                   $id_rumah = $row['id_rumah'];
                                                    $id_member= $row['id_member'];
                                                   ?>
                                                   <img src="./admin/gambar/
                                            <? echo $pic; ?>" width="100" height="100" border="0">
                                                    </td>
                                                <td align="left" valign="top">
                                                    <font face="verdana" size="2" color="#666666">
                                                    <?
                                                    echo "<font color='#99CC00' size=4>" .$row['Nama_kost'] . "</font>" ;
                                                    echo"<br>";
                                                    echo "<b>Fasilitas dan keterangan</b> &nbsp;";
                                                    echo $row['fasilitas'];
                                                    //echo $idbrg;
                                                    ?></font>
                                                </td>
                                                <td align="left">
                                                    <font face="verdana" size="2" color="#666666"><? echo "Rp " . $row['alamat_kost']; ?></font>
                                                </td>
                                                <td color="black"> <font face="verdana" size="2" color="#666666"><?php echo $jml_kmr; ?></font></td>
                                                <td align="center">
                                                  
                                                   <a  href="#" title="Klik untuk membeli" onClick="konfirm(<? echo $id_rumah; ?>,<? echo $id_member; ?>)">Pilih</a>
                                                </td>
                                            </tr>
        <!--                                                                <tr>
                                                <td colspan="6"><hr color="#CCCCCC"></td>
                                            </tr>-->
                                            <?
                                        }
                                        ?>                                                       </table>
                                    <?
                                } else {
                                    echo "<font color='#FF0000' face='verdana' size='2'><b>Belum ada data!!</b></font>";
                                }
                                ?>
                            </td></tr> 

                        </td>
                        </tr>
                        <tr> 
                            <td bgcolor="#00800" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Jumlah Kost Tersedia : <b><? echo $jumlah; ?></font></strong></div></td>
                        </tr>
                    </table>
               
                <!-- / Middle Column --> 
                <!-- Right Column -->
                <!--?php include"pemesan/kanan.php"; ?>-->
                <!-- / Right Column --> 
            </div>

        </div>
    </div>
    <div class="clear"></div>
</main>
</div>