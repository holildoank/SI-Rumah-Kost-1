
<div class="wrapper row3">
    <div class="rounded">
        <div main class="container clear"> 
            <!-- main body --> 
            <!-- ################################################################################################ -->
            <div class="group btmspace-30"> 
                <h2><center>Selamat Datang Di Web Rumah Kost Bangkalan</center></h2>

                <li class="clear">
                    <?php include 'config/config.php'; ?>
                    <script language="javascript">
                        <!--
                        function konfirm(id_kamar)
                        {
                            tanya=confirm("Apakah anda yakin akan memlih kamar  ini ?")
                            if (tanya !="0")
                            {
                              
                                //alert(idbrg);index.php?page=1
                                top.location="index.php?page=6&id_kamar=+id_kamar&id_rumah="+id_rumah;
                            }
                        }
                    </script>
                    <?php
                    include "config/config.php";
                    $id_rumah = $_REQUEST['id_rumah'];
                    $Nama_kost = mysql_result(mysql_query("select Nama_kost from rumah_kost where id_rumah='" . $id_rumah . "'"), 0);
                    ?>
                    <div align="center"><? echo $_GET['status'] ?></div>
                    <br />
                   

                    <!-- / Middle Column --> 
                    <!-- Right Column -->
                    <!--?php include"pemesan/kanan.php"; ?>-->
                    <!-- / Right Column --> 
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
</main>
</div>