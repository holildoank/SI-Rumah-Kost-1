
<head>
    <style type='text/css'>
        #peta {
            width: 90%;
            height: 500px;

        } </style>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBzFvqXHfrY7UrqyDZ9khbol0x-LVjv1mY&sensor=false&language=id"></script>
    <script type="text/javascript">
    
        (function() {
            window.onload = function() {
                var map;
                var locations = [
<?php
//konfgurasi koneksi database 
mysql_connect('localhost', 'root', '');
mysql_select_db('rumah_kost');

$sql_lokasi = "select id_rumah,Nama_kost,latitude,longitude
                 from rumah_kost  ";
$result = mysql_query($sql_lokasi);
// ambil nama,lat dan lon dari table lokasi
while ($data = mysql_fetch_object($result)) {
    ?>
                    ['<?= $data->Nama_kost; ?>', <?= $data->latitude; ?>, <?= $data->longitude; ?>],
    <?
}
?>		
            ];

            //Parameter Google maps
            var options = {
                zoom: 12, //level zoom
                //posisi tengah peta
                center: new google.maps.LatLng(-7.036497864427332, 112.8573989868164),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            // Buat peta di 
            var map = new google.maps.Map(document.getElementById('peta'), options);
            // Tambahkan Marker 
            var infowindow = new google.maps.InfoWindow();
            var marker, i;
            /* kode untuk menampilkan banyak marker */
            for (i = 0; i < locations.length; i++) {  
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: 'icon.png'
                });
                /* menambahkan event clik untuk menampikan
          infowindows dengan isi sesuai denga
             marker yang di klik */
		
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
  

        };
    })();

    </script>
</head>
<body>
    <div class="wrapper row3">
        <div class="rounded">
            <main class="container clear"> 

                <div id="peta"></div>
            </main></div></div>
</body>
