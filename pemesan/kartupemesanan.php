<?php
session_start();
if ($_SESSION['id_penghuni']) {
    include "../config/config.php";
    $id_penghuni = $_SESSION['id_penghuni'];
    $username = $_SESSION['username'];
    $id_pesan = $_GET['id_pesan'];
    $id_kamar = $_GET['id_kamar'];
    $kamar = $_GET['kamar'];

    $id_member = $_GET['id_member'];
    $id_kecamatan = $_GET['id_kecamatan'];
    $id_kelurahan = $_GET['id_kelurahan'];
    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>
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
                                            border-bottom:3px solid white;
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
                                            border:1px solid #ffffff;
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
                                        <?php
                                        $ambil = mysql_query("select * from sewa where id_penghuni='$id_penghuni'");
                                        $t = mysql_fetch_array($ambil);

                                        $bag = mysql_query("select * from penghuni where id_penghuni='$t[id_penghuni]'");
                                        $p = mysql_fetch_array($bag);

                                        $bag = mysql_query("select * from member where id_member='$t[id_member]'");
                                        $m = mysql_fetch_array($bag);

                                        $bag = mysql_query("select * from rumah_kost where id_rumah='$t[id_rumah]'");
                                        $r = mysql_fetch_array($bag);

                                        $bag = mysql_query("select * from kamar where id_kamar='$t[id_kamar]'");
                                        $k = mysql_fetch_array($bag);
                                        $total = $k[harga] * $k[waktu_sewa];
                                        ?>
                                        <div class="page">
                                            <div class="header">
                                                <img style="float: left;" src="images/logo.png" alt="tut" width="250">
                                                    <!--                                                    <div class="h1" >SISTEM INFORMASI RUMAH KOST</div>
                                                    <div class="h1">&nbsp; KABUPATEN BANGKALAN</div>-->
                                                    <br></br>
                                                    <div class="left"><h2>Rumah - <?php echo $r['Nama_kost']; ?></h2></div><br>
                                                    <div class="left"><h3><?php echo $m['nama']; ?> -Tlpn&nbsp;&nbsp;<?php echo $m['no_hp']; ?></h3></div>			
                                                    <br><div class="left">Alamat - <?php echo $r['alamat_kost']; ?>-POS-<?php echo $r['id_kecamatan'] ?></div>			
                                            </div>


                                            <div class="header5">			
                                                <div><B><i>Bukti Pemesanan Kamar <?php echo $k['kamar']; ?>di&nbsp;<?php echo $r['Nama_kost']; ?></i></b> <? echo date('Y-m-d H:i:s') ?></div>
                                            </div>
                                            <div class="content"> 
                                                <table width="100%" height="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#ffffff" class="tbTopik">
                                                    <tr class="head"  >

                                                        <td class="center" colspan="4" rowspan="2" height="30px"  bgcolor="#CCCCCC">IDENTITAS PEMESAN</td>
                                                        <td class="center"  colspan="3" rowspan="2" height="20px"></td>
                                                       <!--                                                        <td class="center"  colspan="3" rowspan="2" height="20px"><h2><i>NAMA KOST&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;<?php echo $r['Nama_kost']; ?></i></h2></td>-->
                                                           <!--                                                        <td class="center" colspan="3" height="20px">KETERANGAN</td>-->
                                                    </tr> 
                                                    <tr bgcolor="#5bc0de">

                        <!--                                                        <td class="center" height="20px">RUMAH KOST</td>		-->
                                                    </tr>
                                                    <tr > <td class="center" colspan="2" height="20px"></td>
                                                        <td class="left" height="20px">NAMA </td>
                                                        <td class="left"  height="20px"><b>:<?php echo $p['nama_p']; ?></b></td>	

                                                        <td class="center"   colspan="2" height="10px"<h2><i></i></h2></td>
                                                    </tr>
                                                    <tr> <td class="center" colspan="2" height="20px"></td>
                                                        <td class="left"  height="20px">NO IDENTITAS</td>
                                                        <td class="left" height="20px"><b>:<?php echo $p['no_identitas']; ?></b></td>	
                                                        <td bgcolor="black" class="center" rowspan="2" colspan="2" height="20px"><font color='red' face='verdana' size='5'><h1><b><?php echo $t['status']; ?> </b></h1></font></td>
    <!--                                                        <td class="center" height="20px"></td>	-->
                                                    </tr>
                                                    <tr > <td class="center" colspan="2" height="20px"></td>
                                                        <td class="left"  height="20px">ALAMAT</td>
                                                        <td class="left" height="20px" ><b> :<?php echo $p['alamat']; ?></b></td>	
    <!--                                                        <td class="left"colspan="2" height="20px"></td>-->
    <!--                                                        <td class="center" height="20px"></td>	-->
                                                    </tr>
                                                    <tr> <td class="center" colspan="2" height="20px"></td>
                                                        <td class="left"  height="20px">TEMPAT & TANGGAL LAHIR </td>
                                                        <td class="left" height="20px"><b> :<?php echo $p['tempat_lahir']; ?>&nbsp;<?php echo $p['tgl_lahir']; ?></b></td>	
                                                        <td class="left" height="20px"><h2><i></i></h2></td>
                                                        <td class="left" height="20px"></td>
                                                    </tr>
                                                    <tr> <td class="center" colspan="2" height="20px"></td>
                                                        <td class="left"  height="20px">JENIS KELAMIN </td>
                                                        <td class="left" height="20px"><b>:<?php echo $p['jk']; ?></b></td>	

                                                        <td class="center"   colspan="2" height="20px"></td>
                                                    </tr>
                                                    <tr> <td class="center" colspan="2" height="20px"></td>
                                                        <td class="left" height="20px">NO HP</td>
                                                        <td class="left" height="20px"><b> :<?php echo $p['phone']; ?></b></td>
                                                        <td class="center" colspan="2" height="20px"></td>
                                                    </tr>
                                                    <tr> <td class="center" colspan="2" height="20px"></td>
                                                        <td class="left"  height="20px">STATUS</td>
                                                        <td class="left" height="20px"><b> :<?php echo $p['status_p']; ?></b></td>	
                                                        <td class="left" height="20px"></td>
                                                        <td class="left" height="20px"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td lass="center" colspan="6"  height="20px"> <img style="float: left;" src="images/biru.png" alt="tut" width="100%" height="30"></img></td>
    <!--                                                        <td class="left" height="20px">Rp. 750.000,00</td>	-->
                                                    </tr>
                                                    <tr> <td class="center" colspan="2" height="20px"></td>
                                                        <td class="center" height="20px"></td>
                                                        <td class="left"colspan="3" height="30px"><h2><i>Kamar &nbsp; &nbsp; :<?php echo $k['kamar']; ?></i></h2></td>	
    <!--                                                        <td class="left"  height="20px"></td>-->

                                                    </tr>
                                                    <tr> <td class="center" colspan="2" height="20px"></td>
                                                        <td class="center" height="20px"></td>
                                                        <td class="left" height="20px"><b>Waktu Sewa </b></td>	
                                                        <td class="left" colspan="2" height="20px">: <?php echo $k['waktu_sewa']; ?>Bulan  / &nbsp;&nbsp; <?php echo $t['tanggal']; ?>&nbsp;&nbsp;-&nbsp;&nbsp; <?php echo $t['batas']; ?></td>

                                                    </tr>
                                                    <tr> <td class="center" colspan="2" height="20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td class="center" height="20px"></td>
                                                        <td class="left" height="20px"><b>Harga Kamar  </b></td>	
                                                        <td class="left" colspan="2" height="20px">Rp.<?php echo $k['harga']; ?></td>

                                                    </tr>
                                                     
                                                    <tr> <td class="center" colspan="2" height="20px"></td>

                                                        <td class="left" colspan="3" height="20px"><h1><b> </b></h1></td>	
                                                        <td class="left" height="20px"><h2></h2></td>

                                                    </tr>
                                                    <tr> <td class="center" colspan="2" height="20px"></td>

                                                        <td class="center" colspan="3" height="20px"><h1><b>TOTAL HARUS DI BAYAR </b></h1></td>	
                                                        <td class="center" height="20px"><h2>Rp.<?php echo $total; ?></h2></td>

                                                    </tr>
                           
                                        </tr><tr> <td class="center" colspan="2" rowspan="2" height="20px"></td>

                                        <td class="center" colspan="4" height="40px"></td>	

                                    </tr>
                                    </br></br></table>

                                </table>

                            </div>
                            <?php
                        } else {
                            echo "<script> document.location.href='index.php?page=1&status=<font color=red>Maaf, Sebelum transaksi Anda harus daftar dan login member </font>'; </script>";
                        }
                        ?>