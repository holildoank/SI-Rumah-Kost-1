<?php
session_start();

if ($_SESSION['id_member']) {

    //koneksi terpusat
    include "../config/config.php";
    $username = $_SESSION['username'];
    ?>
	<script language="javascript">
			<!--
			function konfirm(id_pesan,id_penghuni,id_pesan)
			{
				tanya=confirm("Apakah anda yakin akan menghapus barang ini ?")
				if (tanya !="0")
				{
					//alert(idshop);
					//alert(iduser);
					//alert(idpesan);
					
            top.location="delet-pemesan.php?id_pesan="+id_pesan+"&id_penghuni="+id_penghuni+"&id_pesan="+id_pesan+"&id_kamar="+id_kamar+"&id_rumah="+id_rumah;
				}
			}
			//-->
			</script>
                        <div class="showback">
<!--                    <button type="button" class="btn btn-success"><a href="" ><img src="assets/img/home.png" ><br>Kelola Data KOst</img></a></button>
                    <button type="button" class="btn btn-info"> <a href="" ><img src="assets/img/kontak.png" ><br>Kelola  data Pemesan</img></a></button>
                    <button type="button" class="btn btn-warning"> <a href="" ><img src="assets/img/logo.png" ><br>Tambah Kamar</img></a></button>-->
                    <button type="button" class="btn btn-danger"> <a href="riport-pemesan.php" target='_blank'><img src="assets/img/printer.png" ><br>Print Laporan</img></a></button>
                </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <?
                //untuk paging
                $query = mysql_db_query($db, "select * from sewa order by tanggal asc", $koneksi); //input
                $get_pages = mysql_num_rows($query);
                ?>
                <?php
                $page = (int) $_GET['id'];
                $offset = $page * $entries;

                $result = mysql_db_query($db, "select * from sewa  where id_member='$id_member' order by tanggal desc limit $offset,$entries", $koneksi); //output
                ?>
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
                                    <th>NAma Pemesan</th>
                                    <th>Kost</th>
                                    <th>Kamar</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>				
                                <?php
                                include "../config/config.php";
                                while ($row = mysql_fetch_array($result)) {

                                    $id_pesan = $row['id_pesan'];
                                    $id_penghuni = $row['id_penghuni'];
                                    $id_rumah = $row['id_rumah'];
                                    $id_kamar = $row['id_kamar'];
                                    $tanggal = $row['tanggal'];
                                    $status = $row['status'];


                                    //translate id
                                    $tampil = mysql_db_query($db, "select * from penghuni where id_penghuni='$id_penghuni' ", $koneksi);
                                    while ($row = mysql_fetch_array($tampil)) {
                                        $nama_p = $row['nama_p'];
                                    }
                                    $tampil = mysql_db_query($db, "select * from rumah_kost where id_rumah='$id_rumah'", $koneksi);
                                    while ($row = mysql_fetch_array($tampil)) {
                                        $Nama_kost = $row['Nama_kost'];
                                    }
                                    $tampil = mysql_db_query($db, "select * from kamar where id_kamar='$id_kamar' ", $koneksi);
                                    while ($row = mysql_fetch_array($tampil)) {
                                        $kamar = $row['kamar'];
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo $nama_p; ?></td>
                                        <td><?php echo $Nama_kost; ?></td>
                                        <td><?php echo $kamar; ?></td>
                                        <td><?php echo $tanggal; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td><button class="btn btn-success btn-xs"><a href="index.php?page=11&id_penghuni=<? echo $id_penghuni; ?>&nama_p=<? echo $nama_p; ?>&id_member=<?php echo $id_member; ?>&id_pesan=<?php echo $id_pesan; ?>"><i class=" fa fa-check"></i></a></button>	

                                            <button class="btn btn-primary btn-xs"><a href="index.php?page=10&id_penghuni=<? echo $id_penghuni; ?>&nama_p=<? echo $nama_p; ?>&id_member=<?php echo $id_member; ?>&id_pesan=<?php echo $id_pesan; ?>&id_kamar=<?php echo $id_kamar; ?>&id_rumah=<?php echo $id_rumah; ?>"><i class="fa fa-pencil"></i></a></button>
                                            <button class="btn btn-danger btn-xs"> <a href="delet-pemesan.php?&id_penghuni=<? echo $id_penghuni; ?>&nama_p=<? echo $nama_p; ?>&id_member=<?php echo $id_member; ?>&id_pesan=<?php echo $id_pesan; ?>" onclick="return confirm('Anda yakin akan menghapus data Ini ?')"><i class="fa fa-trash-o "></i></a></button></td>
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
    session_destroy();
    header('Location:../login.php?status=Silahkan Login');
}
?>
          

