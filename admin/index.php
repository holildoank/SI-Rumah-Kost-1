<?php
session_start();

if ($_SESSION['username']) {
    $id_admin = $_SESSION['id_admin'];
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
                <?php include "content.php"; ?>



            </section>
        </section>

        <br><br>
        <?php include"foter.php"; ?>
        <?php
    } else {
        echo "<script> document.location.href='../index.php?page=5&status=<font color=red>Maaf, Sebelum transaksi Anda harus daftar dan login member </font>'; </script>";
    }
    ?>
    ?>