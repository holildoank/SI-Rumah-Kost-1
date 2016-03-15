<?php
session_start();
if ($_SESSION['id_member']) {
    include "../config/config.php";
    $id_member = $_SESSION['id_member'];
    $username = $_SESSION['username'];
    $id_pesan = $_GET['id_pesan'];
    $id_kamar = $_GET['id_kamar'];
    $kamar = $_GET['kamar'];

    $id_penghuni = $_GET['id_penghuni'];
    $id_kecamatan = $_GET['id_kecamatan'];
    $id_kelurahan = $_GET['id_kelurahan'];
    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <head>
            <title>SISTEM INFORMASI RUMAH KOST</title>
            <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
                <meta name="robots" content="noindex,nofollow,no-cache">
                    <meta name="description" content="universitas trunojoyo madura">
                        <meta name="keywords" content="SIKJD">
                            <meta name="author" content="">
                                <link href="./logo.png" rel="shortcut icon" type="image/png"><style type="text/css" media="screen,print">
                                        *{
                                            margin:0;
                                            padding:0;
                                        }
                                        body{
                                            background-color:#CCCCCC;
                                            color:white;
                                            font:normal 8pt/100% Arial,tahoma,sans-serif;
                                        }
                                        div.page{
                                            background-color:white;
                                            color:black;
                                            min-height:33cm;
                                            margin:1cm auto;
                                            padding: 0.5cm 1cm 1cm 1cm;
                                            width:21.5cm;
                                        }
                                        div.header{
                                            background-color:white;
                                            border-bottom:3px solid black;
                                            font-family:"Times New Roman",serif;	
                                            padding-bottom:.5cm;
                                            text-align:center;
                                            color:black;
                                        }
                                        div.header2{
                                            text-align:center;
                                            font-size:13pt;
                                            font-weight:bold;
                                            line-height:120%;
                                            padding-top:0.2cm;
                                        }
                                        div.header div.h1{
                                            font-size:16pt;
                                            font-weight:bold;
                                            line-height:18pt;	
                                        }
                                        div.header div.h2{
                                            font-size:16pt;	
                                            line-height:16pt;	
                                        }
                                        div.header div.h3{
                                            font-size:11pt;	
                                            line-height:12pt;	
                                        }
                                        div.content{
                                            margin-top:.2cm;
                                        }
                                        table.data{	
                                            border-collapse:collapse;
                                            width:100%;
                                        }
                                        th{
                                            padding:3px;
                                            border:1px solid black;
                                        }
                                        table.data td{
                                            padding:5px;
                                        }
                                        span.pilihan{
                                            border-bottom:1px dotted black;
                                        }
                                        table.tbTopik{	
                                            width:100%;
                                        }

                                        table.tbTopik tr td {
                                            margin:2px;
                                            padding:3px;	
                                        }
                                        tr td{
                                            font-weight:bold;
                                            border:1px solid #000000;
                                            border-width:1px;
                                        }
                                        td.center{
                                            text-align:center;
                                        }

                                        td.center img{
                                            display:inline;
                                            vertical-align:middle;
                                        }
                                    </style>
                                    <style type="text/css" media="print">
                                        body{
                                            background-color:white;
                                        }
                                        div.page{
                                            margin:auto;
                                            min-height:29.5cm;
                                            margin:auto;
                                            padding:0 1cm;	
                                            width:21.5cm;
                                        }
                                        div.header{		
                                            padding-bottom:.5cm;
                                        }
                                    </style>
                                    </head><body>
                                        <a href="#" id="print" onclick="window.print();document.getElementById('print').style.display='none';window.close();" style="text-decoration:none; color:white;" title="Print">Print</a>			
                                        <?
                                        //untuk paging
                                        $query = mysql_db_query($db, "select * from sewa order by tanggal asc", $koneksi); //input
                                        $get_pages = mysql_num_rows($query);
                                        ?>
                                        <?php
                                        $page = (int) $_GET['id'];
                                        $offset = $page * $entries;

                                        $result = mysql_db_query($db, "select * from sewa  where id_member='$id_member' order by tanggal desc limit $offset,$entries", $koneksi); //output
                                        ?>
                                        <div class="page">
                                            <div class="header">
<!--                                                <img style="float: left;" src="logo.png" alt="tut" width="75">-->
                                                    <div class="h1"><center>SISTEM INFORMASI RUMAH KOST</center></div>
                                                    <div class="h1"><center>DATA PEMESAN KAMAR KOST</center></div>
                                                    			
                                            </div>


                                            <div class="header5">			
                                                <div> <? echo date('Y-m-d H:i:s') ?></div>
                                            </div>
                                            <div class="content"> 
                                                <table width="100%" height="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#ffffff" class="tbTopik">
                                                    <tr>
                                                        <td height="30px"  bgcolor="#CCCCCC">No</td>
                                                        <td height="30px"  bgcolor="#CCCCCC">NAma Pemesan</td>
                                                        <td height="30px"  bgcolor="#CCCCCC">Kost</td>
                                                        <td height="30px"  bgcolor="#CCCCCC">Kamar</td>
                                                        <td height="30px"  bgcolor="#CCCCCC">Tanggal Pemesanan</td>
                                                        <td height="30px"  bgcolor="#CCCCCC">Status</td>
                                                    </tr>
                                                    <?php
                                                    include "../config/config.php";
                                                    while ($row = mysql_fetch_array($result)) {

                                                        $id_pesan = $row['id_pesan'];
                                                        $id_penghuni = $row['id_penghuni'];
                                                        $id_rumah = $row['id_rumah'];
                                                        $id_kamar = $row['id_kamar'];
                                                        $tanggal = $row['tanggal'];
                                                        $status = $row['status'];


                                                        //translate id
                                                        $tampil = mysql_db_query($db, "select * from penghuni where id_penghuni='$id_penghuni' ", $koneksi);
                                                        while ($row = mysql_fetch_array($tampil)) {
                                                            $nama_p = $row['nama_p'];
                                                        }
                                                        $tampil = mysql_db_query($db, "select * from rumah_kost where id_rumah='$id_rumah'", $koneksi);
                                                        while ($row = mysql_fetch_array($tampil)) {
                                                            $Nama_kost = $row['Nama_kost'];
                                                        }
                                                        $tampil = mysql_db_query($db, "select * from kamar where id_kamar='$id_kamar' ", $koneksi);
                                                        while ($row = mysql_fetch_array($tampil)) {
                                                            $kamar = $row['kamar'];
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td height="20px"  ><?php echo $i + 1; ?></td>
                                                            <td height="20px"><?php echo $nama_p; ?></td>
                                                            <td height="20px"><?php echo $Nama_kost; ?></td>
                                                            <td height="20px"><?php echo $kamar; ?></td>
                                                            <td height="20px"><?php echo $tanggal; ?></td>
                                                            <td height="20px"><?php echo $status; ?></td>


                                                            </br></br>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                    }
                                                    ?>
                                                </table>

                                            </div>
                                            <?php
                                        } else {
                                            echo "<script> document.location.href='index.php?page=1&status=<font color=red>Maaf, Sebelum transaksi Anda harus daftar dan login member </font>'; </script>";
                                        }
                                        ?>