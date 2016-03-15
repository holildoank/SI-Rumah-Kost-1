<?php
session_start();

if ($_SESSION['id_member']) {

    //koneksi terpusat
    include "../config/config.php";
    $username = $_SESSION['username'];
    ?>

    <script language="javascript">
        <!--
        function konfirm(id_member,id_rumah)
        {
            tanya=confirm("Apakah anda yakin akan menghapus data ini ?")
            if (tanya !="0")
            {
                //alert(idshop);
                //alert(iduser);
                //alert(idpesan);
                					
                top.location="delete-kost.php?id_member="+id_member+"&id_rumah="+id_rumah;
            }
        }
        //-->
    </script>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive">



                    <div class="panel-heading">
                        Daftar KOst
                    </div>
                    <!-- /.panel-heading -->
                    <?php
                    $page = (int) $_GET['id'];
                    $offset = $page * $entries;

                    $result = mysql_db_query($db, "select * from rumah_kost  where id_member='$id_member' order by Nama_kost desc limit $offset,$entries", $koneksi); //output
                    ?>

                    <div class="panel-body">
                        <div class="table-responsive">

                            <table id="tabel" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NAma Kost</th>
                                        <th>Alamat</th>
                                        <th>Desa</th>
                                        <th>Kecamatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>				
                                    <?php
                                    include "../config/config.php";
                                    while ($row = mysql_fetch_array($result)) {

                                        $id_rumah = $row['id_rumah'];
                                        $id_kecamatan = $row['id_kecamatan'];
                                        $id_kelurahan = $row['id_kelurahan'];
                                        $Nama_kost = $row['Nama_kost'];
                                        $alamat_kost = $row['alamat_kost'];

                                        $tampil = mysql_db_query($db, "select * from kecamatan where id_kecamatan='$id_kecamatan' ", $koneksi);
                                        while ($row = mysql_fetch_array($tampil)) {
                                            $nama_kec = $row['nama_kec'];
                                        }
                                        $tampil = mysql_db_query($db, "select * from kelurahan where id_kelurahan='$id_kelurahan'", $koneksi);
                                        while ($row = mysql_fetch_array($tampil)) {
                                            $nama_kel = $row['nama_kel'];
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>

                                            <td><?php echo $Nama_kost; ?></td>
                                            <td><?php echo $alamat_kost; ?></td>
                                            <td><?php echo $nama_kel; ?></td>
                                            <td><?php echo $nama_kec; ?></td>
                                            <td>
                                                <button class="btn btn-success btn-xs"><a href="index.php?page=14&id_rumah=<? echo $id_rumah; ?>&Nama_kost=<? echo $Nama_kost; ?>&id_member=<?php echo $id_member; ?>"><i class=" fa fa-check"></i></a></button>	

                                                <button class="btn btn-primary btn-xs"><a href="index.php?page=12&id_rumah=<? echo $id_rumah; ?>&Nama_kost=<? echo $Nama_kost; ?>&id_member=<?php echo $id_member; ?>"><i class="fa fa-pencil"></i></a></button>	
                                                <button class="btn btn-danger btn-xs"> <a href="delete-kost.php?&id_rumah=<? echo $id_rumah; ?>&Nama_kost=<? echo $Nama_kost; ?>&id_member=<?php echo $id_member; ?>" onclick="return confirm('Anda yakin akan menghapus data Ini ?')"><i class="fa fa-trash-o "></i></a></button></td>
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

        <?php
    } else {
        echo "<script> document.location.href='index.php?page=5&status=<font color=red>Maaf, Sebelum transaksi Anda harus daftar dan login member </font>'; </script>";
    }
    ?>
          

