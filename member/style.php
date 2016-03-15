<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SISTEM INFORMASI RUMAH Kost</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
        <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css"> 



        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="media/css/demo_table_jui.css" />
        <link rel="stylesheet" type="text/css" href="media/themes/smoothness/jquery-ui-1.8.4.custom.css" />
        <script src="media/js/jquery.js"></script>
        <script src="media/js/jquery.dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                oTable = $('#tabel').dataTable({
                    "bJQueryUI" : true,
                    "sPaginationType" : "full_numbers"
                });
            });
        </script>
        <script src="assets/js/chart-master/Chart.js"></script>
        <!--datatable--
        <link rel="stylesheet" href="assets/datatable/bootstrap.min.css"/>
            <link rel="stylesheet" href="assets/datatable/dataTables.bootstrap.css"/>
            <link rel="stylesheet" href="assets/datatable/dataTables.responsive.css"/>
            <style>
                body {
                    font-size: 140%;
                }
        
                table.dataTable th,
                table.dataTable td {
                    Blue-space: nowrap;
                }
            </style>
        --
           <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- MetisMenu CSS -->


        <!-- DataTables CSS --
        <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">
    
    <script src="assets/js/chart-master/Chart.js"></script>-->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
      var peta;
      var koorAwal = new google.maps.LatLng(-7.036497864427332, 112.8573989868164);
function peta_awal(){
    loadDataLokasiTersimpan();
    var settingpeta = {
        zoom: 11,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}

function tandai(lokasi){
    $("#koorX").val(lokasi.lat());
    $("#koorY").val(lokasi.lng());
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta
    });
}

$(document).ready(function(){
    $("#simpanpeta").click(function(){
        var koordinat_x = $("#koorX").val();
        var koordinat_y = $("#koorY").val();
		var nama_jenis = $("#namajenis").val();
        var nama_layanan = $("#namaLayanan").val();
		var nama_kec = $("#namakec").val();	
		var alamat = $("#alamat").val();
		var no_tlp = $("#notlp").val();
		var deskripsi = $("#deskripsi").val();
        $.ajax({
            url: "simpan_lokasi_baru.php",
            data: "koordinat_x="+koordinat_x+"&koordinat_y="+koordinat_y+"&nama_jenis="+nama_jenis+"&nama_layanan="+nama_layanan+"&nama_kec="+nama_kec+"&alamat="+alamat+"&no_tlp="+no_tlp+"&deskripsi="+deskripsi,
            success: function(msg){
				$("#namajenis").val(null);
                $("#namaLayanan").val(null);
				$("#namakec").val(null);
				$("#alamat").val(null);
				$("#notlp").val(null);
				$("#deskripsi").val(null);
            }
        });
    });
});



function loadDataLokasiTersimpan(){
    $('#kordinattersimpan').load('tampilkan_lokasi_tersimpan.php');
}
setInterval (loadDataLokasiTersimpan, 3000);

function carikordinat(lokasi){
    var settingpeta = {
        zoom: 10,
        center: lokasi,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta
    });
    google.maps.event.addListener(tanda, 'click', function() {
      infowindow.open(peta,tanda);
    });
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}


function gantipeta(){
    loadDataLokasiTersimpan();
	var isi = document.getElementById('cmb').value;
	if(isi=='1')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
	}
	else if(isi=='2')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.TERRAIN 
        };
	}
	else if(isi=='3')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.SATELLITE  
        };
	}
	else if(isi=='4')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.HYBRID  
        };
	}
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}

</script>

        <!--secrip combo-->
        <script type="text/javascript" src="assets/jquery-1.8.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#kecamatan").change(function(){
                    var kecamatan = $("#kecamatan").val();
                    $.ajax({
                        url:"cek-kel.php",
                        data:"kecamatan="+kecamatan,
                        success:function(data){
                            $("#kelurahan").html(data);
                        }
                    });
                });
            });
        </script>
    </head>
    <body onLoad="peta_awal()">
    <center>
        <div id='badan'>
            <div id='header'>
            </div>
