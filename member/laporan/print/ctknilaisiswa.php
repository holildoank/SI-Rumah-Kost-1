
<?php 
session_start();

if(isset($_SESSION['nis'])){

	include"../../include/koneksi.php";
	
	if(isset($_GET['nis'])){
		$nis=$_GET['nis'];
	}
	
	if(empty($_GET['nis'])){
		$nis=$_SESSION['nis'];
	}

	$query=mysql_fetch_array(mysql_query("select * from siswa where nis='$nis'"));
	$nis=$query['nis'];
	$nama_siswa=$query['nama_siswa'];
	
	?>
            
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
<table cellpadding="0" cellspacing="0" border="1" class="display" id="example" width="1000">
<tr>
<td colspan="2">NIS</td>
<td colspan="4"><?PHP echo $nis;?></td>
</tr>
<tr>
<td colspan="2">NAMA SISWA</td><td colspan="4"><?PHP echo $nama_siswa;?></td>
</tr>

				<tr>
                  <th width="8%" >Nomor</th>
                    <th width="26%">Nama Guru</th>
					<th width="11%">Semester</th>
				  <th width="9%">Kelas</th>
				  <th width="37%">Mata Pelajaran</th>
				  <th width="9%">Nilai</th>
				</tr>
                </thead>
                <tbody>
                
                
                <?php
				
				if(isset($_POST['submit'])){
					//$nis=htmlentities($_POST['nis']);
					$id_kelas=htmlentities($_POST['id_kelas']);
					$id_smt=htmlentities($_POST['id_smt']);
					if($nis!=="0"){
						$filter_siswa="and nilai.nis='$nis'";
					}else{
						$filter_siswa="";
					}
					if($id_kelas!=="0"){
						$filter_kelas="and nilai.id_kelas='$id_kelas'";
					}else{
						$filter_kelas="";
					}
					
					if($id_smt!=="0"){
						$filter_semester="and nilai.id_smt='$id_smt'";
					}else{
						$filter_semester="";
					}
					
				}else{
					unset($_POST['submit']);
				}
				
				
				$view=mysql_query("SELECT * FROM nilai,pelajaran,kelas,guru,semester WHERE 
				nilai.nis='$nis' and
				 nilai.id_kelas=kelas.id_kelas and
				  nilai.id_smt=semester.id_smt and
				  nilai.id_pelajaran=pelajaran.id_pelajaran and
				   nilai.nip=guru.nip 
				    $filter_siswa 
					 $filter_kelas
					 $filter_semester");

				$i = 1;
				while($row=mysql_fetch_array($view)){
					$id_kelas=$row['id_kelas'];
					?>
					<tr>
						
                        <td><?php echo $i;?></td>
                        <td><?php echo $row['nama_guru'];?></td>
						<td><?php echo $row['nama_smt'];?></td>
						<td><?php echo $row['nama_kelas'];?></td>
                        <td><?php echo $row['nama_pel'];?></td>
                        <td><?php echo $row['NR'];?></td>
					</tr>
					<?php
					$i++;
				}
					$jumSis = $i-1;
				?> 
                 <tr>
   
    <td colspan="5">RATA-RATA:<?php $tat=mysql_fetch_array(mysql_query("select avg(NR) as nilainya from nilai where nis='$nis'  $filter_siswa 
					 $filter_kelas
					 $filter_semester"));
	$nilainya=$tat['nilainya'];
	?></td>
    <td >[<?php echo substr($nilainya,0,4);?>]</td>
   
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
										<?PHP $q=mysql_fetch_array(mysql_query("select * from guru,kelas where guru.nip=kelas.nip and kelas.id_kelas='".$id_kelas."'"));
	$nip=$q['nip'];
	$nama_guru=$q['nama_guru'];
									echo $nama_guru;	?><hr/>
										NIP:<?php echo $nip;?></center></td>
								</tr>
							</table> 
  
  
  
  
  </td>
    
  </tr>
      
</table>
</div>
</body>
</html>
              <?php
}else{
	header("Location:index.php");

}
?>