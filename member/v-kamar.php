<?php
session_start();

if ($_SESSION['id_member']) {

    //koneksi terpusat
    include "../config/config.php";
    $username = $_SESSION['username'];
    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">



                <div class="panel-heading">
                    Daftar KOst
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="tabel" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NAma Kost</th>
                                    <th>Alamat kost</th>
                                    <th>Jumlah Kamar</th>
                                    <th>aksi</th>

                                </tr>
                            </thead>
                            <tbody>	
                                <?php
                                $id_member = $_SESSION['id_member'];
// ambil data mata pelajaran dari database
                                $rum = mysql_query("select * from rumah_kost where id_member='$id_member'");
                                $jml_rumah = mysql_num_rows($rum);
                                if ($jml_rumah > 0) {
                                    ?>
                                    <?php
                                    include "../config/config.php";
                                    $i = 1;
                                    while ($row = mysql_fetch_assoc($rum)) {
                                        $jml_kmr = mysql_result(mysql_query("select count(*) from kamar where id_rumah='" . $row['id_rumah'] . "'"), 0);
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['Nama_kost']; ?></td>
                                            <td><?php echo $row['alamat_kost']; ?></td>
                                            <td><?php echo $jml_kmr; ?></td>
                                            <td><button type="button" class="btn btn-primary"><a href="lihat-kamar.php?id_rumah=<?php echo $row['id_rumah']; ?>">Lihat Kamar</a></button></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?> <?php
                        } else {
                            echo "Data Rumag Kost Belum dimasukan";
                        }
                                ?></tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div><!-- /col-md-4 -->

    <?php
} else {
    session_destroy();
    header('Location:../login.php?status=Silahkan Login');
}
?>
          

