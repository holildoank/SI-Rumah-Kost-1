<?php
session_start();
if ($_SESSION['username']) {
    $username = $_SESSION['username'];
    ?>
    <?php
    include "../config/config.php";
    if (isset($_POST['submit'])) {
       
        $Nama_kost = $_POST['Nama_kost'];
        $id_kecamatan = $_POST['id_kecamatan'];
        $id_kelurahan = $_POST['id_kelurahan'];
        $jumlah_kmandi = $_POST['jumlah_kmandi'];
        $fasilitas = $_POST['fasilitas'];
        $id_member = $_POST['id_member'];
        $latitude = $_POST['latitude'];
        $logintude = $_POST['logintude'];
        $lain_lain = $_POST['lain_lain'];
        $jumlah_kamar = $_POST['jumlah_kamar'];

        $query = mysql_query("insert into rumah_kost values('','$Nama_kost','$id_kecamatan','$id_kelurahan','$jumlah_kmandi','$fasilitas','$id_member','$latitude','$logintude','$lain_lain','$jumlah_kamar')");
        if ($query) {
            ?><script language="javascript">document.location.href="index.php?page=3";</script><?php
        } else {
            ?><script language="javascript">document.location.href="index.php?page=2";</script><?php
        }
    } else {
        unset($_POST['submit']);
    }
    ?>
    <div class="row mt">
        <div class="col-lg-12">

            <div class="form-panel">


                <h4 class="mb"><center>Form Tambah Data KOst</center></h4> <hr></hr>
                <form   method="post" class="form-horizontal style-form"  >
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Kost</label>
                        <div class="col-sm-4">
                            <input type="text" id="Nama_kost" name="Nama_kost" value="" class="form-control " required>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Pemilik</label>
                        <div class="col-sm-4">


                            <select class="form-control"  name="id_member" id="id_member" required>
                                <?php
                                $query = mysql_query("select *from member where id_member=$id_member");
                                $data = mysql_fetch_array($query);
                                echo "<option value='$data[id_member]'>$data[nama]</option>";
                                ?>
                            </select>
                        </div></div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Pilih Kecamatan</label>
                        <div class="col-sm-4">

                            <select class="form-control"  name="id_kecamatan" id="id_kecamatan" required>
                                <?php
                                include"config/config.php";
                                $query = mysql_query("select *from kecamatan");
                                while ($tampil = mysql_fetch_array($query)) {
                                    echo "<option value='$tampil[id_kecamatan]'>$tampil[nama_kec]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Kelurahan</label>
                        <div class="col-sm-4">
                            <select class="form-control"  name="id_kelurahan" id="id_kelurahan" required>
                                <?php
                                $query = mysql_query("select *from kelurahan");
                                while ($data = mysql_fetch_array($query)) {
                                    echo "<option value='$data[id_kelurahan]'>$data[nama_kel]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Jumlah kamr mandi</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="jumlah_kmandi" name="jumlah_kmandi" type="text"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Fasilitas</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="fasilitas" name="fasilitas" type="text" value="">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Kordinat : X</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="latitude" name="latitude" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Kordinat Y</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="logintude" name="logintude" type="text"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Keterangan Lain-lain</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="lain_lain" name="lain_lain" type="text"  >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Kamar</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="jumlah_kamar" name="jumlah_kamar" type="text"  >
                        </div>
                    </div>

                    <div class="submit">
                        <input type="submit" name="submit" id="submit" class="btn btn-theme"  value="Submit" /></div>


                    <hr>
                </form>
            </div>
        </div><!-- col-lg-12-->      	
    </div><!-- /row -->
    <?php
} else {
    session_destroy();
    header('Location:../login.php?status=Silahkan Login');
}
?>