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
            ?><script language="javascript">document.location.href="login.php?status=Gagal Login";</script><?php
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
            ?><?php include"./member/index.php"; ?><script language="javascript">document.location.href="./member/index.php";</script>
            <?php
        } else {
            ?><script language="javascript">document.location.href="login.php?status=Gagal Login";</script><?php
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
            ?><?php include"index.php"; ?><script language="javascript">document.location.href="index.php";</script>
            <?php
        } else {
            ?><script language="javascript">document.location.href="login.php?status=Gagal Login";</script><?php
        }
    }
} else {
    unset($_POST['login']);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>LOGIN ADMIN DAN MEMBER</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
    </head>
    <body>
        <div id="login-page">
            <div class="container">

                <form class="form-login" method="post">
                    <h2 class="form-login-heading">sign in now</h2>
                    <div class="login-wrap">
                        <input type="text" class="form-control" name="username" id="username" placeholder="User ID" autofocus>
                        <br>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <hr>
                        <select class="form-control" name="sebagai">
                            <option value="" id="">Pilih Hak Akses</option>
                            <option value="admin" id="admin">ADMIN</option>
                            <option value="member" id="member">MEMBER</option>
                             <option value="penghuni" id="penghuni">Calon Kost</option>
                        </select>
                        <br>
                        </hr>
                        <label class="checkbox">

                        </label>
                        <button class="btn btn-theme btn-block"  name="login" id="submit" value="login" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                        <button class="btn btn-theme btn-block"><i class="fa fa-lock"></i><a href="index.php"> BACK</a></button>
                        <hr>

                        <div class="login-social-link centered">
                            <p>Bagi yang belum mempunyai Akun Silahkan Daftar Ke Admin dulu</p>
                                <!--<button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>-->
                        </div>
                        <div class="registration">

                        </div>

                    </div>

                    <!-- Modal -->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Forgot Password ?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Enter your e-mail address below to reset your password.</p>
                                    <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                    <button class="btn btn-theme" type="button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->

                </form>	  	

            </div>
        </div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!--BACKSTRETCH-->
        <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
        <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
        <script>
            $.backstretch("assets/img/login-bg.jpg", {speed: 500});
        </script>


    </body>
</html>
