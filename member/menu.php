<?php

//if($_SESSION['sebagai']=='member'){
$id_member = $_SESSION['id_member'];
$username = $_SESSION['username'];
$nama = $_SESSION['nama'];

$data = mysql_fetch_array(mysql_query("select * from member where id_member='$id_member'"));
$pengguna = $username;


?> 
<div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">

        <!--<p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>-->
        <h5 class="centered">Hai <?php echo $pengguna; ?> </h5>

        <li class="mt">
            <a class="active" href="index.php?page=1">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-desktop"></i>
                <span>KOST</span>
            </a>
            <ul class="sub">
                <li><a  href="index.php?page=2">Tambah Kost</a></li>
                <li><a  href="index.php?page=3">Lihat Data Kost</a></li>
            </ul>
        </li>

        <li class="sub-menu">
            <a href="" >
                <i class="fa fa-cogs"></i>
                <span>Pemesan Kost</span>
            </a>
            <ul class="sub">
                <li><a  href="index.php?page=9">Lihat Pemesan Kost</a></li>
<!--                <li><a  href="liha-kec.php">Riport Pemesan</a></li>-->

            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-book"></i>
                <span>Kamar</span>
            </a>
            <ul class="sub">
                <li><a  href="index.php?page=4">Tambah Kamar</a></li>
                <li><a  href="index.php?page=5">View Kamar</a></li>

            </ul>
        </li>
<!--    <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-tasks"></i>
                <span>Kelola Pembayaran</span>
            </a>
            <ul class="sub">
                <li><a  href="index.php?page=15">Tambah cara Pemabayaran</a></li>
                
            </ul>
        </li>-->
<!--        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-th"></i>
                <span>Data Tables</span>
            </a>
            <ul class="sub">
                <li><a  href="basic_table.html">Basic Table</a></li>
                <li><a  href="responsive_table.html">Responsive Table</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class=" fa fa-bar-chart-o"></i>
                <span>Charts</span>
            </a>
            <ul class="sub">
                <li><a  href="morris.html">Morris</a></li>
                <li><a  href="chartjs.html">Chartjs</a></li>
            </ul>
        </li>-->

    </ul>
    <!-- sidebar menu end-->
</div>