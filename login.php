<?php
session_start();
include "config/config.php";
if (isset($_POST['login'])) {
    //koneksi terpusat

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sebagai = $_POST['sebagai'];

    if ($sebagai == "admin") {
        $query = mysql_query("select * from admin where username='$username' and password='$password'");
        $cek = mysql_num_rows($query);
        $row = mysql_fetch_array($query);
        $id_admin = $row['id_admin'];

        if ($cek) {
            $_SESSION['username'] = $username;
            $_SESSION['id_admin'] = $id_admin;
            $_SESSION['sebagai'] = $sebagai;
            $_SESSION['waktu'] = date("Y-m-d H:i:s");
            ?><script language="javascript">document.location.href="admin/index.php";</script>
            <?php
        } else {
            ?><script language="javascript">document.location.href="index.php?page=1status=Login Anda Gagal silahkan ulangi lagi";</script><?php
            echo "login gagal";
        }
    }
    if ($sebagai == "member") {
        $query = mysql_query("select * from member where username='$username' and password='$password'");
        $cek = mysql_num_rows($query);
        $row = mysql_fetch_array($query);
        $id_member = $row['id_member'];

        if ($cek) {
            $_SESSION['username'] = $username;
            $_SESSION['id_member'] = $id_member;
            $_SESSION['waktu'] = date("Y-m-d H:i:s");
            $_SESSION['sebagai'] = $sebagai;
            ?><script language="javascript">document.location.href="member/index.php";</script>
            <?php
        } else {
            ?><script language="javascript">document.location.href="index.php?page=1status=Login Anda Gagal silahkan ulangi lagi";</script><?php
        }
    }
    if ($sebagai == "penghuni") {
        $query = mysql_query("select * from penghuni where username='$username' and password='$password'");
        $cek = mysql_num_rows($query);
        $row = mysql_fetch_array($query);
        $id_penghuni = $row['id_penghuni'];

        if ($cek) {
            $_SESSION['username'] = $username;
            $_SESSION['id_penghuni'] = $id_penghuni;
            $_SESSION['waktu'] = date("Y-m-d H:i:s");
            $_SESSION['sebagai'] = $sebagai;
            ?><script language="javascript">location.href="index.php?page=3&status=sukses Login";</script>
            <?php
        } else {
            ?>
            <script language="javascript">document.location.href="index.php?page=1status=Login Anda Gagal silahkan ulangi lagi";</script><?php
        }
    }
} else {
    unset($_POST['login']);
}
?>

<div class="one_quarter sidebar"> 

    <div class="sdb_holder">
        <li><div class="faicon-twitter" href="#"><h3><center></center></h3></div></li>
        <p><b><center><H3>login</h3></center></b></p>
        <div id="comments">
            <form name="masuk"  method="post">

                <div class="block clear">
                    <label for="username"><b>Username</b><span>*</span></label>
                    <input type="text" name="username" id="username" value="" size="25">
                </div>
                <div class="block clear">
                    <label for="password"><b>Password</b><span>*</span></label>
                    <input type="password" name="password" id="password" value="" size="25">
                </div> <br><div class="block clear">
                    <select class="" name="sebagai">
                        <option value="" id="">Pilih Hak Akses</option>
                        <option value="admin" id="admin">ADMIN</option>
                        <option value="member" id="member">MEMBER</option>
                        <option value="penghuni" id="penghuni">Calon Kost</option>
                    </select>
                </div>

                <div class="block clear">
                    <input name="login" class=" btn-info" type="submit" value="Login"onClick="return cek()" >
                     <button type="button" class="btn-info"> <a href="index.php?page=4">Daftar</img></a></button></div>
            </form>
            <!-- ################################################################################################ --> 
        </div>
        
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
        <div class="sdb_holder">
            <li><div class="faicon-twitter" href="#"><h3><center></center></h3></div></li>
            <br>
            <div class="mediacontainer"><img src="images/demo/bri1.png" alt=""></img>
                <br></br>
                <div class="mediacontainer"><img src="images/demo/bca2.png" alt="">

                </div>
            </div><hr>

            <!-- ################################################################################################ --> 
        </div></div>