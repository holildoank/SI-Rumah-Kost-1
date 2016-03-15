<?php
//koneksi terpusat
include "../config/config.php";
   $id_kelurahan = $_REQUEST['id_kelurahan'];
?>
<?php $view = mysql_query("select * from kelurahan order by id_kecamatan asc"); 
?>

<!-- /.row -->
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Nama Member &nbsp;<button type="button" class="btn btn-success"><a href="index.php?page=6" >Tambah Data Kelurahan</a></button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tabel" class="display">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th>Kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Kode POst</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>	
                            <?php
                            include"../config/config.php";

                            while ($row = mysql_fetch_array($view)) {
                                $nama_kec = mysql_fetch_array(mysql_query("SELECT nama_kec FROM kecamatan WHERE id_kecamatan='$row[id_kecamatan]'"));

                                ?>

                                <tr>
                                    <td><?php echo $c = $c + 1; ?></td>

                                    <td><?php echo $row['nama_kel']; ?></td>
                                    <td><?php echo $nama_kec['nama_kec']; ?></td>
                                    <td><?php echo $row['id_kecamatan']; ?></td>
                                 
                                    <td>
                                        <button class="btn btn-primary btn-xs"><a href="edit-kel.php?id_kelurahan=<?php echo $dataTampil['id_kelurahan']; ?>"><i class="fa fa-pencil"></i></a></button>
                                        <button class="btn btn-danger btn-xs"> <a href="delete-kel.php?id_kelurahan=<?php echo $dataTampil['id_kelurahan'] ?>" onclick="return confirm('Anda yakin akan menghapus data Ini ?')"><i class="fa fa-trash-o "></i></a></button></td>
                                </tr>

                            <?php } ?> </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div><!-- /col-md-4 -->


