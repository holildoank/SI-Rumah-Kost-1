<?php
include "../config/config.php";
$id_rumah = $_SESSION['id_rumah'];
$id_member = $_SESSION['id_member'];



?>
<?php
if (isset($_POST['submit'])) {
    $id_rumah = $_POST['id_rumah'];
    $id_member = $_POST['id_member'];
    $kamar = $_POST['kamar'];
    $fasilitas_kamar = $_POST['fasilitas_kamar'];
    $kouta = $_POST['kouta'];
    $harga = $_POST['harga'];
    $waktu_sewa = $_POST['waktu_sewa'];
    $keterangan_kamar = $_POST['keterangan_kamar'];
    $query = mysql_query("insert into kamar values('','$id_rumah','$id_member','$kamar','$fasilitas_kamar','$kouta','$harga','$waktu_sewa','$keterangan_kamar')");
    if ($query) {
        ?><script language="javascript">document.location.href="index.php?page=5";</script><?php
    } else {
        ?><script language="javascript">document.location.href="index.php?page=4";</script><?php
    }
} else {
    unset($_POST['submit']);
}
?>
   
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">

            <h4 class="mb"><center>Tambah Data Kamar</center></h4> <hr></hr>
            <form   method="post" class="form-horizontal style-form"  >
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> </label>
               <div class="col-sm-5">Pilih Kost yang ingn di tambahkan data kamar 
                        <select class="form-control"  name="id_rumah" id="id_rumah" required>
                            <?php
                            $query = mysql_query("select *from rumah_kost WHERE id_member='$id_member'");
                            while ($data = mysql_fetch_array($query)) {
                                echo "<option value='$data[id_rumah]'>$data[Nama_kost]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <input type="hidden" id="id_member" value="<?php echo $id_member ?>"  name="id_member" class="form-control" required>
             
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kamar</label>
                    <div class="col-sm-4">
                        <input type="text" id="kamar" value="" name="kamar" class="form-control" required>
                        Isikan Nomor kamar / Nama Kamar 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Fasilitas Kamar</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="fasilitas_kamar" name="fasilitas_kamar" type="text" value="">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kouta Kamar</label>
                    <div class="col-sm-4">

                        <select class="form-control" name="kouta" value="" id="kouta" required>
                            <option value="">Pilih kouta kamar</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Harga /Bulan</label>
                    <div class="col-sm-4">
                        <input type="text"  value="" class="form-control" id="harga" name="harga">*contoh Rp.250000   
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Minimal Penyewaan</label>
                    <div class="col-sm-4">
                        <input type="text" value="" id="waktu_sewa" name="waktu_sewa" class="form-control" required>*
                        isikan menimal penyewaan Contoh minimal 3 bulan
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Keterangan </label>
                    <div class="col-sm-4">
                        <input type="text" value="" id="keterangan_kamar" name="keterangan_kamar" class="form-control" required>
                    </div>
                </div>

                <div class="submit">
                    <input type="submit" name="submit" id="submit" class="btn btn-theme"  value="submit" /></div>


                <hr>
            </form>
        </div>
    </div><!-- col-lg-12-->      	
</div><!-- /row -->
