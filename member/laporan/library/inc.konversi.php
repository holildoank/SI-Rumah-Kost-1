<?php
# Fungsi untuk membuat konversi nilai
function predikat($nilai) {
if($nilai<=0){   
	$predikat = '';
}
elseif($nilai<=1.17){   
	$predikat = 'D';
}
elseif($nilai<=1.50){   
	$predikat = 'D+';
}
elseif($nilai<=1.84){  
	$predikat = 'C-';
}
elseif($nilai<=2.17){ 
	$predikat = 'C';
}
elseif($nilai<=2.50){  
	$predikat = 'C+';
}
elseif($nilai<=2.84){  
	$predikat = 'B-';
}
elseif($nilai<=3.17){ 
	$predikat = 'B';
}
elseif($nilai<=3.50){  
	$predikat = 'B+';
}
elseif($nilai<=3.84){  
	$predikat = 'A-';
}
elseif($nilai<=4.00){  
	$predikat = 'A';
}
else {  
	$predikat = 'invalid';
}
	return $predikat;
}
?>
<?php
# Fungsi untuk membuat konversi sikap
function kriteria($nilai) {
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
