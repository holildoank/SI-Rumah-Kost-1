<?php
//if($_SESSION['sebagai']=='member'){
//$id_member=$_SESSION['id_member'];
//$username=$_SESSION['username'];

$data = mysql_fetch_array(mysql_query("select * from member where id_member='$id_member'"));
$pengguna = $username;
?> 
<div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">

<!--        <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>-->
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
                <span>Member</span>
            </a>
            <ul class="sub">
                <li><a  href="index.php?page=2">Tambah Member</a></li>
                <li><a  href="index.php?page=3">Lihat Data member</a></li>
            </ul>
        </li>

        <li class="sub-menu">
            <a href="" >
                <i class="fa fa-cogs"></i>
                <span>Kecamatan</span>
            </a>
            <ul class="sub">
                <li><a  href="index.php?page=4">Tambah Kecamatan</a></li>
                <li><a  href="index.php?page=5">Liha Kecamatan</a></li>

            </ul>
        </li>
        <li class="sub-menu">
            <a href="" >
                <i class="fa fa-book"></i>
                <span>Kelurahan</span>
            </a>
            <ul class="sub">
                <li><a  href="index.php?page=6">Tambah Kelurahan</a></li>
                <li><a  href="index.php?page=7">View Kelurahan</a></li>

            </ul>
        </li>
      <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-tasks"></i>
                <span>Kelola Layanan</span>
            </a>
            <ul class="sub">
                <li><a  href="index.php?page=9">Tambah Data Layanan</a></li>
            </ul>
          <ul class="sub">
                <li><a  href="index.php?page=10">Lihat Data Layanan</a></li>
            </ul>
        </li><!--
        <li class="sub-menu">
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