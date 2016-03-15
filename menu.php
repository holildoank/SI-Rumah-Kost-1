
<div class="wrapper row2">
    <div class="rounded">
        <nav id="mainav" class="clear"> 
            <!-- ################################################################################################ -->
            <ul class="clear"><b>
                    <li class="active"><a href="index.php?page=1">Home</a></li>
                    <li><a class="drop" href="#">Rumah Kost</a>
                        <ul>
                            <li><a class="drop" href="index.php?page=2">All Rumah kost</a>
                            <ul>
                                <li><a href="index.php?page=14">Rumah Kost Laki-laki</a></li>
                                <li><a href="index.php?page=15">Rumah Kost Perempuan</a></li>
                            </ul>
                                </li>
                            <li><a href="index.php?page=10">cari Kamar </a></li>
                        </ul>
                    </li>
                    <li><a class="drop" href="#">View Peta</a>
                        <ul>
                            <li><a href="index.php?page=3">Petunjuk Jalan</a></li>
                            <li><a class="drop" href="index.php?page=11">Peta Harga KOst</a>
                            </li>
                            <li><a class="drop" href="index.php?page=17">All Lokasi Kost</a>
                            </li>
<!--                              <li><a class="drop" href="index.php?page=19">sms</a>
                            </li>-->
<!--                            <li><a class="drop" href="index.php?page=16">Cari berdasarkan harga</a>
                            </li>-->
                        </ul>
                    </li>
<!--                    <li><a href="index.php?page=13">Cara Pemesanan Rumah Kost</a></li>-->
                    <!--                    <li><a href="index.php?page=4">Daftar</a></li>-->

                </b>
                <Li>    <?php
session_start();

if ($_SESSION['id_penghuni']) {

    include "menu2.php";
} else {
    
}
?></li>

            </ul>
            <!-- ################################################################################################ --> 
        </nav>
    </div>
</div>