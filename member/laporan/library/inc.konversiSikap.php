<?php
# Fungsi untuk membuat konversi sikap
function sikapSiswa($nilai) {
if($nilai=='Kurang'){   
	$nilai = 1;
}
elseif($nilai=='Cukup'){  
	$nilai = 2;
}
elseif($nilai=='Baik'){  
	$nilai = 3;
}
else {  
	$nilai = 4;
}
	return $nilai;
}
?>

<?php
# Fungsi untuk membuat konversi sikap
function nilaiSiswa($nilai) {
if($nilai==0){   
	$nilai = '';
}
elseif($nilai==4){   
	$nilai = 'SB';
}
elseif($nilai==3){  
	$nilai = 'B';
}
elseif($nilai==2){  
	$nilai = 'C';
}
else {  
	$nilai = 'K';
}
	return $nilai;
}
?>

<?php
# Fungsi untuk membuat konversi sikap
function tampilSikap($nilai) {
if($nilai== '1'){   
	$nilai = 'Kurang';
}
elseif($nilai== '2'){  
	$nilai = 'Cukup';
}
elseif($nilai== '3'){  
	$nilai = 'Baik';
}
else {  
	$nilai = 'Baik Sekali';
}
	return $nilai;
}
?>
