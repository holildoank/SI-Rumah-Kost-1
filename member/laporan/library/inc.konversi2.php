<?php
# Fungsi untuk membuat pengetahuan
function sikapsiswa($nilai) {
if($nilai>='SB'){   
	$keterangan = 'Sudah Menunjukkan Sikap Ketaatan menjalankan agama,
Kreatifitas,
Kejujuran,
Kedisiplinan,
Kecermatan,
Ketekunan,
Tanggung Jawab,
Kerja Sama,
Toleransi,
Kesantunan,
Kerensponsifan dan
Keproaktifan';

}
elseif($nilai>='B'){  
	$keterangan = 'Sudah Menunjukkan Sikap Ketaatan menjalankan agama,
Kreatifitas,
Kejujuran,
Kedisiplinan,
Kecermatan,
Ketekunan,
Tanggung Jawab,
Kerja Sama dan
Toleransi';
}
elseif($nilai>='C'){ 
	$keterangan = 'Sudah Menunjukkan Sikap Ketaatan menjalankan agama,
Kreatifitas,
Kejujuran,
Kedisiplinan,
Kecermatan dan
Ketekunan';

}
else {  
	$keterangan = 'Sudah Menunjukkan Sikap Ketaatan menjalankan agama,
Kreatifitas dan
Kejujuran';
}
	return $keterangan;
}
?>

<?php
# Fungsi untuk membuat konversi nilai
function semester($nilai) {
if($nilai==1){   
	$semester = '(SATU)';
}
elseif($nilai==2){  
	$semester = '(DUA)';
}
elseif($nilai==3){  
	$semester = '(TIGA)';
}
elseif($nilai==4){  
	$semester = '(EMPAT)';
}
elseif($nilai==5){  
	$semester = '(LIMA)';
}
else {  
	$semester = '(ENAM)';
	}
	return $semester;
}
?>