<?php
session_start();

if ($_SESSION['username']) {

    //koneksi terpusat
    include "../config/config.php";
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

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Daftar Nama Kost
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php
                                    $id_member = $_SESSION['id_member'];
                                    $query = mysql_query("SELECT * FROM rumah_kost, where id_rumah = '" . $_SESSION['id_member'] . "'");
                                    while ($row = mysql_fetch_array($query)) {
                                        ?>




                                        <tr>

                                            <td><center><?php echo $row['id_rumah'] ?></center></td>

                                        <td><?php echo $row['Nama_kost']; ?></td>

                                        <td><?php echo $row['fasilitas']; ?></td>

                                        <td><?php echo $row['jumlah_kamar']; ?></td>



                                        </tr>



                                        <?php
                                    }
                                    ?>



                                    <table id="tabel" class="display">
                                        <thead>
                                            <tr>
                                                <th>Nama Kost</th>
                                                <th>Kecamatan</th>
                                                <th>kelurahan</th>
                                                <th>Fasilitas</th>
                                                <th>Jumlah Kamar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>				
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- /col-md-4 -->
                </div><!-- /col-md-4 -->

                </div><!-- /row -->

                <div class="row mt">

                </div><!-- /row --> 

                </div>


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