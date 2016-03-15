<?php
session_start();
if ($_SESSION['username']) {
    $username = $_SESSION['username'];
    ?>

    <?php
    include "../config/config.php";
    if (isset($_GET['id_rumah'])) {
        $tampil = "select * from kamar where id_kamar='$_GET[id_kamar]' and id_rumah='$_GET[id_rumah]' ";
        $qryTampil = mysql_query($tampil);
        $dataTampil = mysql_fetch_array($qryTampil);
    } else {
        include"index.php";
        exit;
    }
    if ($dataTampil == false) {
        echo "Data tidak ditemukan!<br/>";
        exit();
    }
    ?>


    

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">

                <h4 class="mb"><center>Update Data Kamar</center></h4> <hr></hr>
                <form action="update-kamar.php"  method="post" class="form-horizontal style-form"  >
                    <input type="hidden" id="id_kamar" value="<?php echo $dataTampil['id_kamar']; ?>"  name="id_kamar" class="form-control" required>

                    <input type="hidden" id="id_rumah" value="<?php echo $dataTampil['id_rumah']; ?>"  name="id_rumah" class="form-control" required>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Kamar</label>
                        <div class="col-sm-4">
                            <input type="text" id="kamar" value="<?php echo $dataTampil['kamar']; ?>" name="kamar" class="form-control" required>
                            Isikan Nomor kamar / Nama Kamar 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Fasilitas Kamar</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="fasilitas_kamar" name="fasilitas_kamar" type="text" value="<?php echo $dataTampil['fasilitas_kamar']; ?>">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Status Kamar</label>
                        <div class="col-sm-4">

                            <select class="form-control" name="kouta" value="" id="kouta" >
                                <option value="">Pilih Status Kouta</option>
                                <option value="0">0</option>
                                <option value="2">2</option>
                                <option value="1">1</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Harga /Bulan</label>
                        <div class="col-sm-4">
                            <input type="text"  value="<?php echo $dataTampil['harga']; ?>" class="form-control" id="harga" name="harga">*contoh Rp.250000   
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Minimal Penyewaan</label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $dataTampil['waktu_sewa']; ?>" id="waktu_sewa" name="waktu_sewa" class="form-control" >*
                            isikan menimal penyewaan Contoh minimal 3 bulan
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Keterangan </label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $dataTampil['keterangan_kamar']; ?>" id="keterangan_kamar" name="keterangan_kamar" class="form-control" >
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