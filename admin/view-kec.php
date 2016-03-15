<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Nama Kecamatan <button type="button" class="btn btn-danger"> <a href="index.php?page=4">Tambah data</a></button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tabel" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Post</th>
                                <th>Nama Kecamatan</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../config/config.php";
                            $tampil = "select * from kecamatan";
                            $qryTampil = mysql_query($tampil);
                            while ($dataTampil = mysql_fetch_array($qryTampil)) {
                                $no++
                                ?>
                                <tr> <td><?php echo $no; ?></td>
                                    <td><?php echo $dataTampil['id_kecamatan']; ?></td>
                                    <td><?php echo $dataTampil['nama_kec']; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-xs"><a href="edit-kec.php?id_kecamatan=<?php echo $dataTampil['id_kecamatan']; ?>"><i class="fa fa-pencil"></i></a></button>
                                        <button class="btn btn-danger btn-xs"> <a href="delete-kec.php?id_kecamatan=<?php echo $dataTampil['id_kecamatan'] ?>" onclick="return confirm('Anda yakin akan menghapus data Ini ?')"><i class="fa fa-trash-o "></i></a></button></td>
                                </tr>

                            <?php } ?> </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div><!-- /col-md-4 -->
