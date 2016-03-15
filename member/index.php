<?php
session_start();

if ($_SESSION['username']) {


    $username = $_SESSION['username'];
    ?>

    <?php include"style.php"; ?>

    <section id="container" >
        <?php include"header.php"; ?>
        <aside>
            <?php include "menu.php"; ?>
        </aside>
        <section id="main-content">
            <section class="wrapper">
                <footer class="site-footer">
                    <div class="text-center">


                        <i class="fa fa-angle-up"></i>
                        </a>
                    </div>
                </footer>
<!--                <div class="pull-left"><button type="button" ><img src="assets/img/user.png" ><b> <h3>SELAMAT DATANG <?php echo"$pengguna";?></h3></b></img></button></h5></div>-->
                <!-- /showback -->
                <?php include "content.php"; ?>
            </section>
        </section>
    </section>
    <br><br>
    <?php include"foter.php"; ?>
    <?php
} else {
    session_destroy();
    header('Location:../login.php?status=Silahkan Login');
}
?>