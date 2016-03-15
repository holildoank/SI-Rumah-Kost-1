<?php
include("library/inc.connection.php");
include_once "library/inc.library.php";
?>
<?php

	 //memulai pengaturan output PDF
	 //$id_kelas=(isset($_GET['id_kelas'])? $_GET['id_kelas'] :'');
	$kd_kelas=(isset($_GET['kd_kelas'])? $_GET['kd_kelas'] :'');
	$kelas=mysql_query("select *from tabel_kelas where kd_kelas='$kd_kelas'");
	while($hasil=mysql_fetch_array($kelas)){
$query="select nm_guru,nm_mapel,hari,jam from tabel_jadwal_pelajaran,tabel_guru,tabel_mapel_all where 
tabel_jadwal_pelajaran.kd_kelas='".$hasil['kd_kelas']."' and
tabel_jadwal_pelajaran.kd_mapel=tabel_mapel_all.kd_mapel and
tabel_jadwal_pelajaran.kd_guru=tabel_guru.kd_guru order by hari desc";
    $db_query = mysql_query($query) or die("Query gagal");
    //Variabel untuk iterasi
    $i = 0;
    //Mengambil nilai dari query database
    while($data=mysql_fetch_row($db_query))
    {
        $cell[$i][0] = $hasil[3];
		$cell[$i][1] = $data[0];
        $cell[$i][2] = $data[1];
        $cell[$i][3] = $data[2];
		$cell[$i][4] = $data[3];
		//$cell=$hasil['nama_kelas'];
        $i++;
    }
	}
    require('fpdf17/fpdf.php');	
   
    class PDF extends FPDF
    {
	
        //untuk pengaturan header halaman
        function Header()
        {
	$this->Image('images/logo_smk.png',2,1,2);
	$this->SetFont('Arial','B',11);
	$this->Cell(0,0.75,'DINAS PENDIDIKAN DAN KEBUDAYAAN',0,0,'C');
	$this->Ln();
	$this->SetFont('Arial','B',14);
	$this->Cell(0,0.75,'SMK NEGERI 1 PAKONG',0,0,'C');
	

	$this->Ln();
	$this->SetFont('Arial','',9);
	$this->Cell(0,0.5,'Jl. Raya Pakong Pamekasan',0,0,'C');
	$this->Ln();
 
	$this->Ln();
	$this->SetFont('Arial','',14);
	$this->Line(1, 4, 20, 4);
 	$this->Ln();
            //Pengaturan Font Header
            $this->SetFont('Times','B',14); //jenis font : Times New Romans, Bold, ukuran 14
            //untuk warna background Header
            $this->SetFillColor(255,255,255);
            //untuk warna text
            $this->SetTextColor(0,0,0);
            //Menampilkan tulisan di halaman
              //$pdf->Cell(2,1,'$nama_kelas','LBTR',0,'C'); //TBLR (untuk garis)=> B = Bottom,
             //L = Left, R = Right
            //untuk garis, C = center
			
			//echo'$nama_kelas';
			$this->Ln();
        }
    }
	
    //pengaturan ukuran kertas P = Portrait
    $pdf = new PDF('P','cm','A4');
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(1,1,'No','LRTB',0,'C');
	$pdf->Cell(2,1,'KELAS','LRTB',0,'C');
    $pdf->Cell(5,1,'NAMA GURU','LRTB',0,'C');
    $pdf->Cell(6,1,'PELAJARAN','LRTB',0,'C');
	$pdf->Cell(2,1,'HARI','LRTB',0,'C');
	$pdf->Cell(2,1,'JAM','LRTB',0,'C');
    $pdf->Ln();
    $pdf->SetFont('Times',"",10);
    for($j=0;$j<$i;$j++)
    {
        //menampilkan data dari hasil query database
        $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
        $pdf->Cell(2,1,$cell[$j][0],'LBTR',0,'C');
        $pdf->Cell(5,1,$cell[$j][1],'LBTR',0,'C');
        $pdf->Cell(6,1,$cell[$j][2],'LBTR',0,'C');
        $pdf->Cell(2,1,$cell[$j][3],'LBTR',0,'C');
		$pdf->Cell(2,1,$cell[$j][4],'LBTR',0,'C');
		//$cell=$hasil['nama_kelas'];
		//$pdf->Cell(2,1,$cell[$hasil][],'LBTR',0,'C');
        $pdf->Ln();
    }
    //menampilkan output berupa halaman PDF
    $pdf->Output();
?>