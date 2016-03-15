<div class="wrapper row3">
    <div class="rounded">
        <div main class="container clear"> 
            <!-- main body --> 
            <div id="content" class="three_quarter first"> 
                <h2><center>Selamat Datang Di Web Rumah Kost Bangkalan</center></h2>

                <li class="clear">
                    <?php
                    include 'config/config.php';
                    $query = mysql_db_query($db, "select * from kamar ", $koneksi);
                    ?>
                    <script language="javascript">
                        function konfirm(id_kamar,id_rumah,id_member)
                        {
                            tanya=confirm("Apakah anda yakin akan memlih kamar  ini ?")
                            if (tanya !="0")
                            {
                                top.location="index.php?page=6&id_kamar="+id_kamar+"&id_rumah="+id_rumah+"&id_member="+id_member+"";
                            }
                        }
                    </script>
                    <?php
                    include "config/config.php";
                    $id_member = $_REQUEST['id_member'];
                    $id_rumah = $_REQUEST['id_rumah'];
                    ?>
                    <div align="center"><? echo $_GET['status'] ?></div>
                    <br />
                    <table width="42%" border="0" cellpadding="0" cellspacing="0" bordercolor="#ffffff" align="center">
                        <tr> 
                            <td colspan="6" width="90%" bgcolor="#008000" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Silahkan Pilih Kamar di rumah Kost    <?php echo $Nama_kost; ?></font></strong></div></td>
                        </tr>
<!--                        <tr>   
                            <td>  -->
<!--                                <table width="505" align="center"bordercolor="#000000"> -->
                        <tr> <td colspan="6"><center> <?
                    $query = mysql_db_query($db, "select * from kamar  ", $koneksi); //input
                    $get_pages = mysql_num_rows($query);

                    if ($get_pages > $entries) {  //proses
                        echo "Halaman : ";
                        $pages = 1;
                        while ($pages <= ceil($get_pages / $entries)) {
                            if ($pages != 1) {
                                echo " | ";
                            }
                            ?>
                                    <a href="index.php?page=10&id=<? echo ($pages - 1); ?> " style="text-decoration:none"><font color="#0066FF"><? echo $pages; ?></font></a> 
                                    <?
                                    $pages++;
                                }
                            } else {
                                $pages = 0;
                            }
                            ?></center>
                        </font>
                        </p>
                        <?
                        $page = (int) $_GET['id'];
                        $id_member = $_REQUEST['id_member'];
                        $id_rumah = $_REQUEST['id_rumah'];
                        $offset = $page * $entries;
                        $result = mysql_db_query($db, "select * from kamar order by kamar asc limit $offset,$entries", $koneksi); //output
                        $jumlah = mysql_num_rows($query);
                        if ($jumlah) {
                            ?>	   
                            <tr>
                                <td width="22%" bgcolor="#D3D3D3">Kamar</td>
                                <td width="22%" bgcolor="#D3D3D3">Fasilitas </td>
                                <td width="12%" bgcolor="#D3D3D3">Kouta</td>
                                <td width="22%" bgcolor="#D3D3D3">Harga </td>
                                <td width="22%" bgcolor="#D3D3D3">Keterangan</td>
                                <td width="13%" bgcolor="#D3D3D3">AKSI </td>
                            </tr>
                            <?
                            while ($row = mysql_fetch_array($result)) {
                                $jml_kmr = mysql_result(mysql_query("select count(*) from kamar where id_rumah='" . $row['id_rumah'] . "'"), 0);
                                ?>
                                                                                                                                                                                                                <!--                                            <tr>
                                                                                                                                                                                                                <td align="center" valign="top">-->
                                <?
                                $id_member = $row['id_member'];
                                $id_kamar = $row['id_kamar'];
                                $id_rumah = $row['id_rumah'];
                                ?>
                                                                                                                                                                                                                <!--                                                    <img src="./admin/gambar/<? echo $pic; ?>" width="100" height="100" border="0">
                                                                                                                                                                                                                </td>-->
                                                                                                                                                                                                                <!--                                                <td align="left" valign="top">
                                                                                                                                                                                                                <font face="verdana" size="2" color="#666666">
                                <?
                                $query = mysql_db_query($db, "select * from member where id_member='$id_member'", $koneksi); //input
                                while ($data = mysql_fetch_array($query)) {
                                    echo "<option value=$data[id_member]>$data[nama]</option>";
                                }
                                ?></font>
                                                                                                                                                                                                                </td>-->
                                <td align="left" valign="top"><? echo $row['kamar'] ?></td>
                                <td><?php echo $row['fasilitas_kamar']; ?></td>
                                </td>
                                <td align="left"><? echo "" . $row['kouta']; ?></td>
                                <td align="left"><? echo "Rp " . $row['harga']; ?>/bulan  <?php
                        echo "<b>Minimal Pembayaran</b> &nbsp;";
                        echo"<br>";
                        echo $row['waktu_sewa'];
                                ?>&nbsp;bulan</font>
                                </td>
                                <td align="left"><? echo "" . $row['keterangan_kamar']; ?></td>

                                <td align="center">
                                    <!--?php
//                                    session_start();
//
//                                    if ($_SESSION['id_penghuni']) {
//
//                                        echo"-->
                                        <a  href='#' title='Klik untuk membeli' onClick='konfirm(<? echo $id_kamar; ?>,<? echo $id_rumah; ?>,<? echo $id_member; ?>)'>pesan</a>
                                            </td>
<!--                                            ";
                                    } else {
                                        
                                    }
                                    ?>-->
                                </td> </tr>     
                                <?
                            }
                            ?>                                                    
                            <?
                        } else {
                            echo "<font color='#FF0000' face='verdana' size='2'><b>Belum ada data!!</b></font>";
                        }
                        ?>
                        </td></tr> 
                        <!--                                </table>-->
                        <tr> 
                            <td colspan="6" bgcolor="#00800" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Jumlah Kamar Tersedia : <b><? echo $jumlah; ?></font></strong></div></td>
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
                
            }
            ?>
            <!-- / Right Column --> 

        </div>
    </div>
</div>
<div class="clear"></div>
</main>
</div>