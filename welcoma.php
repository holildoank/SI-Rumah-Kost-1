<?php include"header.php"; ?>
<div class="wrapper row3">
    <div class="rounded">
        <div main class="container clear"> 
            <!-- main body --> 
            <!-- ################################################################################################ -->
            <div class="group btmspace-30"> 
                <!-- Left Column -->
                
                <?php include "kiri.php"; ?>
                <!-- / Left Column --> 
                <!-- Middle Column -->
                <?php include"tengah.php"; ?>
                <?php
                session_start();

                if ($_SESSION['id_penghuni']) {

                    include "pemesan/statuss.php";
                } else {
                    include "login.php";
                }
                ?>
                <!-- / Right Column --> 
            </div>

        </div>
    </div>
    <div class="clear"></div>
</main>
</div>