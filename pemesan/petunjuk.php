
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
                            <br>
                            <div class="faicon-twitter" ><h2><center>PETUNJUK PEMESAN KAMAR</center></h2></div>
                            <table width="100%" height="10%" border="1" cellpadding="0" cellspacing="0" bordercolor="#ffffff" class="tbTopik"
                                   <tbody>
                                    <tr>
                                        <th ><center>Terimakasih Telah mengunjungi situs<br> E-KOST-Bangkalan.com<br> Situs ini menyediakan beberpa layanan yang sangat membantu para pemilik kost untuk memasarkan rumah kost yang
                                    dimilikinya ataupun para mahasiswa yang sedang mencari tempat tinggal sementara
                                </center></th></tr><tr>
                                    <th>Cara Pemesan Kamar kost dan cara mengetahui rute jalan dari kampus tempat kalian kuliah ke tempat kost yang akan di tempati</th>
                            </tr><tr>
                                <th><left>1. &nbsp;&nbsp; mmmmm</left></th>
                            </tr>

                                </tbody>
                            </table>
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
