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
                                    <th>Pemilik</th>
                                    <th>No Hp</th>
                                    <th>Nama Kost</th>
                                    <th>Nama Kost</th>
                                    <th>kecamatan</th>
                                    <th>Kelurahan</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>				
                                <?php
                                include "../config/config.php";
                                $tampil = "select nama,no_hp,Nama_kost, alamat_kost,nama_kec,nama_kel from member,rumah_kost,kecamatan,kelurahan
                                where member.id_member=rumah_kost.id_member and rumah_kost.id_kecamatan=kecamatan.id_kecamatan and rumah_kost.id_kelurahan=kelurahan.id_kelurahan";

                                $qryTampil = mysql_query($tampil);
                                while ($dataTampil = mysql_fetch_array($qryTampil)) {
                                    $no++
                                    ?>
                                    <tr> <td><?php echo $no; ?></td>
                                        <td><?php echo $dataTampil['nama']; ?></td>
                                        <td><?php echo $dataTampil['no_hp']; ?></td>
                                        <td><?php echo $dataTampil['Nama_kost']; ?></td>
                                         <td><?php echo $dataTampil['alamat_kost']; ?></td>

                                        <td><?php echo $dataTampil['nama_kec']; ?></td>
                                        <td><?php echo $dataTampil['nama_kel']; ?></td>

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
    </div><!-- /col-md-4 -->

<?php
} else {
    session_destroy();
    header('Location:../login.php?status=Silahkan Login');
}
?>
          

