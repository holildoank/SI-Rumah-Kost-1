<?php
session_start();?>
<html>
    <head>
        <title>Sitem informasi rumah kost</title>
        
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="pemesan/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" type="text/css" href="pemesan/media/css/demo_table_jui.css" />
        <link rel="stylesheet" type="text/css" href="pemesan/media/themes/smoothness/jquery-ui-1.8.4.custom.css" />
        
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
      <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=AIzaSyBzFvqXHfrY7UrqyDZ9khbol0x-LVjv1mY"></script>
            <style type="text/css">
                body {
                    font-family: Verdana, Arial, sans serif;
                    font-size: 11px;
                    margin: 2px;
                }
                table.directions th {
                    background-color:#EEEEEE;
                }

                img {
                    color: #000000;
                }
            </style>
            <script type="text/javascript">

                var map;
                var gdir;
                var geocoder = null;
                var addressMarker;

                var directionsPanel;
                var directions;

                function initialize() {
                    if (GBrowserIsCompatible()) {
                        map = new GMap2(document.getElementById("map_canvas"));

                        map.setCenter(new GLatLng(-7.036497864427332, 112.8573989868164), 13);
                        map.setUIToDefault();

                        gdir = new GDirections(map, document.getElementById("directions"));
                        GEvent.addListener(gdir, "load", onGDirectionsLoad);
                        GEvent.addListener(gdir, "error", handleErrors);

                    }
                }

                function setDirections(fromAddress, toAddress, locale) {
                    gdir.load("from: " + fromAddress + " to: " + toAddress,
                    { "locale": locale });
                }
                function handleErrors(){
                    if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
                        alert("No corresponding geographic location could be found for one of the specified addresses. This may be due to the fact that the address is relatively new, or it may be incorrect.nError code: " + gdir.getStatus().code);
                    else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
                        alert("A geocoding or directions request could not be successfully processed, yet the exact reason for the failure is not known.n Error code: " + gdir.getStatus().code);

                    else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
                        alert("The HTTP q parameter was either missing or had no value. For geocoder requests, this means that an empty address was specified as input. For directions requests, this means that no query was specified in the input.n Error code: " + gdir.getStatus().code);

                    else if (gdir.getStatus().code == G_GEO_BAD_KEY)
                        alert("The given key is either invalid or does not match the domain for which it was given. n Error code: " + gdir.getStatus().code);

                    else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
                        alert("A directions request could not be successfully parsed.n Error code: " + gdir.getStatus().code);

                    else alert("An unknown error occurred.");
                }

            </script>
            </head>
            <body onload="initialize()" onunload="GUnload()" style="font-family: Arial;border: 0 none;">

        <div class="wrapper row0">
            <div id="topbar" class="clear"> 
                <!-- ################################################################################################ -->
                <nav>

                </nav>
                <!-- ################################################################################################ --> 
            </div>
        </div>
        <div class="wrapper row1">
            <header id="header" class="clear"> 
                <!-- ################################################################################################ -->
                <div id="logo" class="fl_left">
                    <center><h1><a href="index.html">Sistem Informasi </a></h1></center>
                    <center> <p>Rumah Kost</p></center>
                </div>
                <!--    <div class="fl_right">
                      <form class="clear" method="post" action="#">
                        <fieldset>
                          <legend>Search:</legend>
                          <input type="text" value="" placeholder="Search Here">
                          <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
                        </fieldset>
                      </form>
                    </div>-->
                <!-- ################################################################################################ --> 
            </header>
        </div>
        <?php include"pemesan/menu.php"; ?>
       
        <?php include"pemesan/content.php" ?>
    </div>
    <?php include"pemesan/foter.php"; ?>
    <div class="wrapper row5">
        <div id="copyright" class="clear"> 
            <!-- ################################################################################################ -->

        </div>
    </div>
   
    <!-- JAVASCRIPTS --> 
    <script src="pemesan/layout/scripts/jquery.min.js"></script> 
    <script src="pemesan/layout/scripts/jquery.fitvids.min.js"></script> 
    <script src="pemesan/layout/scripts/jquery.mobilemenu.js"></script> 
      <script src="pemesan/media/js/jquery.js"></script>
        <script src="pemesan/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                oTable = $('#tabel').dataTable({
                    "bJQueryUI" : true,
                    "sPaginationType" : "full_numbers"
                });
            });
        </script>
    <script src="pemesan/layout/scripts/tabslet/jquery.tabslet.min.js"></script>
    
</body>
</html>