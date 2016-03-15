<!--
 
//session_start();
//
//if(isset($_SESSION['nis'])){
//
//	include"../../include/koneksi.php";
//	
//	if(isset($_GET['nis'])){
//		$nis=$_GET['nis'];
//	}
//	
//	if(empty($_GET['nis'])){
//		$nis=$_SESSION['nis'];
//	}
//
//	$query=mysql_fetch_array(mysql_query("select * from siswa where nis='$nis'"));
//	$nama_siswa=$query['nama_siswa'];
//	$foto=$query['foto'];
//-->	
<a href="javascript:window.print()">Cetak Halaman</a>
<html>
    <head>
        <title>Cetak Rapor</title>
        <style type="text/css">
        /* CSS Document */
        
        .page{
        	width:950px;
        	margin:10px auto;
        	border:0px solid #999;
        	-webkit-border-radius: 3px;
               -moz-border-radius: 3px;
                    border-radius: 3px;
        	padding:5px;
        }
        
        .header{
        	height:100px;
        	border-bottom:0px solid #999;
        	padding:5px;
        	margin-bottom:10px;
        }
        
        .listdata{
        	
        }
        
        .listdata table{
        	border:1px solid #999;
        	border-spacing:0;
        	width:100%;
        	padding:0px;
        	-webkit-border-radius: 3px;
               -moz-border-radius: 3px;
                    border-radius: 3px;
        }
        
        .listdata table thead tr td{
        	border-left:1px solid #999;
        	border-bottom:1px solid #999;
        	border-spacing:0;
        	text-align:center;
        	font-size:15px;
        	font-weight:900
        }
        
        .listdata table tbody tr td{
        	border-left:1px solid #999;
        	border-spacing:0;
        	font-size:15px;
        	border-bottom:1px solid #999;
        	padding:3px;
        }
        
        .logo{
        	border:0px solid #999;
        	width:100px;
        	height:100px;
        	float:left;
        	margin-left:130px
        }
        
        .judul{
        	border:0px solid #999;
        	margin-left:70px;
        	margin-top:5px;
        	padding-left:200px;
        }
        
        .a1{
        	font-size:25px;
        }
        </style>
        <script type="text/javascript" language="javascript" src="../../walik/konversi.js"></script>
    </head>
    <body>
    <div class="page"><div class="header"><div class="logo"><img src="logoman.png" style="width: 100%; height: 100%;" />
      </div>
                
                <div class="judul">
                  <table style="border-spacing: 0;">
                    <tr>
                      <td style="text-align: center;">KEMENTRIAN AGAMA</td>
                    </tr>
                    <tr>
                      <td class="a1" style="text-align: center;">MAN SAMPANG</td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">Jl. Jaksa Agung Suprapto no. 88 Telp (0323) 321513 Sampang</td>
                    </tr>
                  </table>
                </div>
    </div>
            <hr />

            
            <div class="listdata">
                <?php include"../../include/koneksi.php";
$nis=(isset($_GET['nis']) ? $_GET['nis']: '');
$uts=(isset($_GET['UTS']) ? $_GET['UTS']: '');
$query=mysql_query("select*from siswa,kelas,guru where siswa.id_kls=kelas.id_kelas and kelas.nip=guru.nip and nis='$nis'");
while($d=mysql_fetch_array($query)){
	@$nis=$d['nis'];
	@$nama_siswa=$d['nama_siswa'];
	$nama_kelas=$d['nama_kelas'];
	$nama_guru=$d['nama_guru'];
	$nip=$d['nip'];
	}

?>

<table width="90%" border="1" align="center">
  <tr>
    <td colspan="2" >Madrasah Aliah Negeri</td>
    <td colspan="4" >MAN SAMPANG</td>
  </tr>
  <tr>
    <td colspan="2" >Nama Peserta Didik</td>
    <td width="21%" ><?php echo $nama_siswa;?></td>
    <td  colspan="2">  Kelas/Semester:</td>
    <td width="14%" ><?php echo $nama_kelas;?>/Ganjil&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" >NIS</td>
    <td ><?PHP echo $nis;?></td>
    <td  colspan="2">Tahun Ajaran:&nbsp;</td>
    <td ><?php $ta=mysql_fetch_array(mysql_query("select*from nilai,tahun_ajaran where nilai.id_ta=tahun_ajaran.id_ta"));?>
	<?php echo $ta['nama_ta'];?>&nbsp;</td>
  </tr>
 
  <tr>
    <td width="3%" height="50"  >NO</td>
    <td colspan="2">PELAJARAN</td>
    <td width="20%">NILAI ANGKA</td>
    <td width="20%" >NILAI HURUF</td>
    <td>&nbsp;</td>
  </tr>
   <?php 
    $no=0;
  $nilainya=mysql_query("select*from nilai,pelajaran where  
  nilai.id_pelajaran=pelajaran.id_pelajaran and 
   nis='$nis' and nilai.id_smt=1");

  while($r=mysql_fetch_array($nilainya)){
	  $no++;
  ?>
  <tr>
    <td ><?php echo $no;?></td>
    <td colspan="2"><?php echo $r['nama_pel'];?></td>
    <td ><?php echo $r['NR'];?></td>
    <td><script>document.write(toWords("<?php echo $r['NR'];?>"))</script></td>
    <td>&nbsp;</td>
  </tr>
   <?php
  }
  
 
  ?>
  
  
  <tr>
    <td >&nbsp;</td>
    <td  colspan="2">&nbsp;</td>
    <td >RATA-RATA:[<?php $tat=mysql_fetch_array(mysql_query("select avg(NR) as nilainya from nilai where nis='$nis' and id_smt=1"));
	$nilainya=$tat['nilainya'];
	?><?php echo substr($nilainya,0,4);?>]</td>
    <td ><script>document.write(toWords("<?php echo substr($nilainya,0,4);?>"))</script>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td colspan="6">
  
  
  
  
 <table style="border:0">
								<tr>
									<?php 
										$ql = mysql_query("Select*from siswa,wali where siswa.nis=wali.nis"); 
										while ($datawali = mysql_fetch_array($ql)){ $nama_wali = $datawali['nama_wali'];}
									?>
								
									<td style="border:0" width="300"><center>Mengetahui<br/>Wali Murid<br/><br/><br/><br/><br/><br/><?php echo $nama_wali; ?><hr/></center></td>
									<td style="border:0">&nbsp;</td>
									
									<td style="border:0" width="300"><center>
									    Sampang, <?php
										$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
$hari = $array_hari[date('N')];
$tanggal = date ('j');
$array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
$bulan = $array_bulan[date('n')];
$tahun = date('Y');
										 echo $hari . " " . $tanggal . $bulan . "  " . $tahun; ?><br/>
									    Wali Kelas<br/><br/><br/><br/><br/><br/>
										<?php echo $nama_guru; ?><hr/>
										NIP:<?php echo $nip; ?></center></td>
								</tr>
							</table> 
  
  
  
  
  </td>
    
  </tr>
</table>
            </div>
    </div>
    </body>
</html>

<!--
//}else{
//	 unset($_SESSION['nis']);
//	header("Location:index.php");
//
//}-->
