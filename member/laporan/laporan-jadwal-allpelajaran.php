<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2012 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @category PHPExcel
 * @package PHPExcel
 * @copyright Copyright (c) 2006 - 2012 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt LGPL
 * @version 1.7.7, 2012-05-19
 */
 
/** Error reporting */
error_reporting(E_ALL);
 
date_default_timezone_set('Europe/London');
 
/** Include PHPExcel */
require_once 'Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
 
// Set document properties
$objPHPExcel->getProperties()->setCreator("Admin")
							 ->setLastModifiedBy("Admin")
							 ->setTitle("Data Guru Dan Pegawai SMKN 1 Pakong")
							 ->setSubject("Data Guru Dan Pegawai SMKN 1 Pakong")
							 ->setDescription("Menampilkan Data Guru Dan Pegawai SMKN 1 Pakong Dalam bentuk Excell")
							 ->setKeywords("Data Guru Dan Pegawai SMKN 1 Pakong")
							 ->setCategory("Data Guru");
 
// Create the worksheet
$objPHPExcel->setActiveSheetIndex(0);

// mulai judul kolom dengan row 12
$objPHPExcel->getActiveSheet()->setCellValue('A12', "NO")
							  ->setCellValue('B12', "NAMA GURU")
							  ->setCellValue('C12', "KELAS")
							  ->setCellValue('D12', "PELAJARAN")
							  ->setCellValue('E12', "HARI")
							  ->setCellValue('F12', "JAM")
							  ->setCellValue('G12', "Tahun AJARAN");

// koneksi database
include("library/inc.connection.php");

// query database
$SQL=mysql_query("select *from tabel_jadwal_pelajaran, tabel_kelas, tabel_guru, tabel_tahun_ajaran, tabel_mapel_all where
tabel_jadwal_pelajaran.kd_kelas=tabel_kelas.kd_kelas and
tabel_jadwal_pelajaran.kd_guru=tabel_guru.kd_guru and
tabel_jadwal_pelajaran.kd_mapel=tabel_mapel_all.kd_mapel and
tabel_jadwal_pelajaran.id_ta=tabel_tahun_ajaran.id_ta 
");

// jumlah data
$jumlah = mysql_num_rows($SQL);
  
$dataArray= array();
$no=0;

// menampilkan data, susunan field sesuai dengan urutan judul kolom 
while($row = mysql_fetch_array($SQL, MYSQL_ASSOC)){
	$no++;
	$row_array['no'] 		  = $no;
	$row_array['nm_guru'] 	  	  = $row['nm_guru'];
	$row_array['nm_kelas']    	  = $row['nm_kelas'];
	$row_array['nm_mapel'] 	  = $row['nm_mapel'];
	$row_array['hari'] 		=  $row['hari'];
	$row_array['jam'] 	  = $row['jam'];
	$row_array['nama_ta'] 	  = $row['nama_ta'];
	
	array_push($dataArray,$row_array);
}

// Mulai record dengan row 8
$nox=$no+12;
$objPHPExcel->getActiveSheet()->fromArray($dataArray, NULL, 'A13'); 

// Set page orientation and size
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.75);
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
 
// Set title row bold;
$objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFont()->setBold(true);
// Set fills
$objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->getStartColor()->setARGB('FF808080');

//untuk auto size colomn 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
 
$sharedStyle1 = new PHPExcel_Style();
$sharedStyle2 = new PHPExcel_Style();
 
$sharedStyle1->applyFromArray(
 array('borders' => array(
 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
 'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
 ),
 ));
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A12:G$nox");
 
// Set style for header row using alternative method
$objPHPExcel->getActiveSheet()->getStyle('A12:G12')->applyFromArray(
 array(
 'font' => array(
 'bold' => true
 ),
 'alignment' => array(
 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
 ),
 'borders' => array(
 'top' => array(
 'style' => PHPExcel_Style_Border::BORDER_THIN
 )
 ),
 'fill' => array(
 'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
 'rotation' => 90,
 'startcolor' => array(
 'argb' => 'FFA0A0A0'
 ),
 'endcolor' => array(
 'argb' => 'FFFFFFFF'
 )
 )
 )
);
 
// Add a drawing to the worksheet
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('images/logo_smk.png');
$objDrawing->setCoordinates('B2');
$objDrawing->setHeight(100);
$objDrawing->setWidth(100);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
 
//untuk font dan size data
$objPHPExcel->getActiveSheet()->getStyle('A12:G1000')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A12:G1000')->getFont()->setSize(12);
 //MENGATUR JUDUL
// Mulai Merge cells Judul
$objPHPExcel->getActiveSheet()->mergeCells('C2:G2');
$objPHPExcel->getActiveSheet()->setCellValue('C2', "JADWAL PELAJARAN");

$objPHPExcel->getActiveSheet()->mergeCells('C3:G3');
$objPHPExcel->getActiveSheet()->setCellValue('C3', "SMK NEGERI 1 PAKONG");

$objPHPExcel->getActiveSheet()->mergeCells('C4:G4');
$objPHPExcel->getActiveSheet()->setCellValue('C4', "TINGKAT SLTA / SEDERAJAT");


$objPHPExcel->getActiveSheet()->getStyle('C2:G5')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('C2:G5')->getFont()->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('C2:G5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C3:G5')->getFont()->setSize(16);

// untuk sub judul
$objPHPExcel->getActiveSheet()->setCellValue('G7', "JUMLAH DATA : $jumlah");

$objPHPExcel->getActiveSheet()->setCellValue('A8', "KOTA : PAMEKASAN");
$objPHPExcel->getActiveSheet()->setCellValue('A9', "PROPINSI : JAWA TIMUR");

$objPHPExcel->getActiveSheet()->setCellValue('E8', "TINGKAT : SMK");
$objPHPExcel->getActiveSheet()->setCellValue('E9', "SEKOLAH : SMK NEGERI 1 PAKONG ");

$objPHPExcel->getActiveSheet()->getStyle('A7:G9')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A7:G9')->getFont()->setSize(12);

// Judul Center
$objPHPExcel->getActiveSheet()->getStyle('C2:G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="jadwal_pelajaran"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
 
// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));