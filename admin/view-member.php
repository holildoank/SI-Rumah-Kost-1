
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading " >
                <a href="index.php?page=2"> <button type="button" class="btn btn-primary">Tambah Member</button></a>  <a href="riportowner.php"><button type="button" class="btn btn-success">Riport Data Member</button></a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tabel" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Ktp</th>
                                <th>Alamat</th>
                                <th>Tempat, Tanggal lahir</th>
                                <th>Kelamin</th>
                                <th>No Hp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>				
                            <?php
                            include "../config/config.php";
                            $tampil = "select * from member";
                            $qryTampil = mysql_query($tampil);
                            while ($dataTampil = mysql_fetch_array($qryTampil)) {
                                $no++
                                ?>
                                <tr> <td><?php echo $no; ?></td>
                                    <td><?php echo $dataTampil['nama']; ?></td>
                                    <td><?php echo $dataTampil['ktp']; ?></td>
                                    <td><?php echo $dataTampil['alamat']; ?></td>
                                    <td><?php echo $dataTampil['tempat_lahir']; ?>-<?php echo $dataTampil['tgl_lahir'] ?></td>
                                    <td><?php echo $dataTampil['jk']; ?></td>
                                    <td><?php echo $dataTampil['no_hp']; ?></td>
                                    <td><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                        <button class="btn btn-primary btn-xs"><a href="edit-member.php?id_member=<?php echo $dataTampil['id_member']; ?>"><i class="fa fa-pencil"></i></a></button>
                                        <button class="btn btn-danger btn-xs"> <a href="delete-member.php?id_member=<?php echo $dataTampil['id_member'] ?>" onclick="return confirm('Anda yakin akan menghapus data Ini ?')"><i class="fa fa-trash-o "></i></a></button></td>
                                </tr>

                            <?php } ?> </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
