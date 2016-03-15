<?php
//if($_SESSION['sebagai']=='member'){
$time=date("G");
	?><font face="verdana" size="2" color="#5bc0de"><?
	if ($time<12)
	
	{	
		$status= "  Selamat Pagi ";
		}
		else if ($time<15)
		{
		$status= "  Selamat Siang ";
		}
		else if ($time<18)
		{
		$status= "  Selamat Sore ";
		}
		else
		{
		$status= "  Selamat Malam ";
	}
echo "</font>";

include "config/config.php";
$id_penghuni = $_SESSION['id_penghuni'];
$username = $_SESSION['username'];
$query=mysql_db_query($db,"select * from penghuni where id_penghuni='$id_penghuni' ",$koneksi);
?> 

<div class="one_quarter sidebar"> 
   
    <h3><?php echo $status; ?><?php echo $username; ?></h3>
    
    <div class="sdb_holder">
        <li><div class="faicon-twitter" href="#"><h3><center></center></h3></div></li>

        <div class="mediacontainer"><img src="images/demo/contact2.png" alt=""></img>
            <br>
            <p>HOLIL : 081913707336</p>
            <p>EMAIL : Dooaankh@gmail.com</p>
        </div>

        <!-- ################################################################################################ --> 
    </div>
    <!-- ################################################################################################ -->
<!--    <div class="sdb_holder">
        <li><div class="faicon-twitter" href="#"><h3><center></center></h3></div></li>
        <br>
        <div class="mediacontainer"><img src="images/demo/bri1.png" alt=""></img>
            <br></br>
            <div class="mediacontainer"><img src="images/demo/bca2.png" alt="">

            </div>
        </div><hr>

         ################################################################################################  
    </div></div>-->