<?php include"config/config.php"; ?>
<div class="wrapper row3">
    <div class="rounded">
        <main class="container clear"> 
            <style>
                html{
                    height:100%;	
                }
                body{
                    height:100%;	
                }
                #canvas{
                    height:70%;	
                }

            </style>
            <title>Peta Dinamis Pertamaku</title>
            <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBzFvqXHfrY7UrqyDZ9khbol0x-LVjv1mY&sensor=false&language=id"></script>
            <script type="text/javascript">
                //Mendeklarasikan Array untuk menampung marker dan balloon yang ada sehiingga mempermudah saat memanggilnya kembali
                var markers=new Array();
                var infowindows=new Array();
	
                var refreshId2 = setInterval(function(){navigator.geolocation.getCurrentPosition(foundLocation, noLocation);}, 10000);
	
//                function noLocation() {
//                    alert("Sensor GPS tidak ditemukan");
//                }
//	
//                function foundLocation(position) {
//                    var lat2 = position.coords.latitude;
//                    var lon2 = position.coords.longitude;
//		
//                    var uri = "simpandata.php";		
//                    $.ajax({
//                        type: 'POST',
//                        async: false,
//                        dataType: "html",
//                        url: uri,
//                        data: "latitude="+lat2+"&longitude="+lon2,
//                        success: function(data) {
//					
//                        }
//                    });
//                }
                function initialize(){
                    var myLatLng = new google.maps.LatLng(-7.036497864427332, 112.8573989868164);
                    var myOptions = {
                        zoom: 16,
                        center:myLatLng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
		
                    map = new google.maps.Map( document.getElementById('canvas'),myOptions);
		
<?php
//Mengambil data dari database dan melakukan looping untuk menampilkan marker sesuai kordinat pada database
$sql = "select * from rumah_kost  order by harga_terendah";
$query = mysql_query($sql) or die(mysql_error());
while ($data = mysql_fetch_array($query)) {
    ?>
                var marker= new google.maps.Marker({
                    position:new google.maps.LatLng(<?php echo $data['latitude']; ?>, <?php echo $data['longitude']; ?>),
                    map:map,
                    title:"Saya disini"
                });
                marker.setIcon({ url: "logo.png", scaledSize: new google.maps.Size(30, 24) , anchor: new google.maps.Point(15, 12)});
                markers.push(marker);
                                    			
                var infowindow= new google.maps.InfoWindow({
                    //                    content:"<img src='<?php echo $data['Nama_kost']; ?>' width='100' align='left' /><?php echo $data['harga_terendah']; ?>",
                    content:"<?php echo $data['Nama_kost']; ?><?php echo $data['harga_terendah']; ?>",
                    size: new google.maps.Size(50,50),
                    position:new google.maps.LatLng(<?php echo $data['latitude']; ?>, <?php echo $data['longitude']; ?>)
                });
                infowindow.open(map);
                                    			
                infowindows.push(infowindow);
    <?php
}
?>
	
        $('#cari').change(function(){
            var i=$('#cari').val();
            var koodinat=markers[i].getPosition();
            map.panTo(koodinat);
            updatedata();
        });

    }
            </script>
            </head>
            <body onLoad="initialize()">
                <div id="canvas"></div>
                <p><h3>Cari Berdasarkan Harga</h3></p>
                <table>
                    <select  width="100px" id="cari" name="cari">
                        <?php
                        $sql = "select * from rumah_kost order by harga_terendah asc";
                        $query = mysql_query($sql) or die(mysql_error());
                        $n = 0;
                        while ($data = mysql_fetch_array($query)) {
                            ?>
                            <option value="<?php echo $n; ?>"><?php echo $data['harga_terendah']; ?></option>
                            <?php
                            $n++;
                        }
                        ?>
                    </select></table>
            </body>
        </main></div></div>