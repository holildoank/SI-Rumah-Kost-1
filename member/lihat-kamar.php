<?php
session_start();

if ($_SESSION['username']) {

//koneksi terpusat

    $username = $_SESSION['username'];
    ?>        
    <?php include"style.php"; ?>

    <section id="container" >
        <?php include"header.php"; ?>
        <aside>
            <?php include "menu.php"; ?>
        </aside>
        <?php
        include "../config/config.php";
        $id_member = $_SESSION['id_member'];
        $id_rumah = $_REQUEST['id_rumah'];
        $Nama_kost = mysql_result(mysql_query("select Nama_kost from rumah_kost where id_rumah='" . $id_rumah . "'"), 0);
        ?>

        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Daftar KOst   <?php echo $Nama_kost; ?>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="tabel" class="display">
                                        <thead>

                                            <tr>
                                                <th>No</th>
                                                <th>NAma Kamar</th>
                                                <th>Fasilitas Kamar</th>
                                                <th>Kouta Kamar</th>
                                                <th>Harga</th>
                                                <th>Jangka</th>
                                                <th>Keterangan</th>
                                                <th>aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>	


                                            <?php
// tampilkan seluruh ujian pada mata pelajaran ini
                                            $sql = "select * from kamar where id_rumah ='" . $id_rumah . "'";
                                            $sql_exe = mysql_query($sql);
                                            $no = 1;
                                            while ($row = mysql_fetch_assoc($sql_exe)) {
                                                $id_kamar = $row['id_kamar'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row['kamar']; ?></td>
                                                    <td><?php echo $row['fasilitas_kamar']; ?></td>
                                                    <td><?php echo $row['kouta']; ?></td>
                                                    <td><?php echo $row['harga']; ?></td>
                                                    <td><?php echo $row['waktu_sewa']; ?></td>
                                                    <td><?php echo $row['keterangan_kamar']; ?></td>
                                                    <td>
<!--                                                        <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>-->
                                                      <button class="btn btn-primary btn-xs"><a href="index.php?page=13&id_kamar=<? echo $id_kamar; ?>&kamar=<? echo $kamar; ?>&id_rumah=<?php echo $id_rumah; ?>&id_member=<?php echo $id_member; ?>"><i class="fa fa-pencil"></i></a></button>	
            	
            
                                                        <button class="btn btn-danger btn-xs"> <a href="delete-kamar.php?&id_kamar=<? echo $id_kamar; ?>&kamar=<? echo $kamar; ?>&id_rumah=<?php echo $id_rumah; ?>&id_member=<?php echo $id_member; ?>" onclick="return confirm('Anda yakin akan menghapus data Ini ?')"><i class="fa fa-trash-o "></i></a></button></td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?> </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- /col-md-4 -->
                </div><!-- /row -->
                </div><!-- /col-md-4 -->

                </div><!-- /row -->

                <div class="row mt">

                </div><!-- /row --> 

                </div>

                </div><! --/row -->
            </section>
        </section></section>

    <br><br>
    <?php include"foter.php"; ?>
    <?php
} else {
    session_destroy();
    header('Location:../login.php?status=Silahkan Login');
}
?>