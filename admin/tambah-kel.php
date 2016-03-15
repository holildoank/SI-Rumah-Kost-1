
<!--isi-->
<?php
include "../config/config.php";

if (isset($_POST['submit'])) {
    $id_kecamatan = $_POST['id_kecamatan'];
    $nama_kel = $_POST['nama_kel'];
if (!empty($id_kecamatan) &&!empty($nama_kel)) {

    $cek = mysql_db_query($db, "select * from kelurahan where nama_kel='$nama_kel'", $koneksi);
    $valid = mysql_num_rows($cek);

    if ($valid) {
        echo "<script> document.location.href='index.php?page=6&status=<font color=red>Maaf, Data ini sudah ada!!</font>'; </script>";
    } else {
        
    }
    $query = mysql_query("insert into kelurahan values('','$id_kecamatan','$nama_kel')");
    if ($query) {
        ?><script language="javascript">document.location.href="index.php?page=7&status=SUksess menambahkan data";</script><?php
    } else {
        ?><script language="javascript">document.location.href="index.php?page=6&status=gagal";</script><?php
    }}
} else {
    unset($_POST['submit']);
}
?>

<div class="row mt">
    <div class="col-lg-12"><hr></hr>
        <div class="form-panel">
            <button type="button" class="btn btn-success"><a href="index.php?page=7" >Lihat Data Kelurahan</a></button>
            <h4 class="mb"><center>Form Tambah Kelurahan</center></h4> <hr></hr>
            <form   method="post" class="form-horizontal style-form"  >
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Pilih Kecamatan</label>
                    <div class="col-sm-4">
                        <select class="form-control"  name="id_kecamatan" id="id_kecamatan" required>
                            <?php
                            $query = mysql_query("select *from kecamatan");
                            while ($data = mysql_fetch_array($query)) {
                                echo "<option value='$data[id_kecamatan]'>$data[nama_kec]</option>";
                            }
                            ?>
                        </select>
                    </div></div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Kelurahan</label>
                    <div class="col-sm-4">
                        <input type="text" id="nama_kel" name="nama_kel" value="" class="form-control " required>

                    </div></div>
                <br><br>
                <div class="submit">
                    <input type="submit" name="submit" id="submit" class="btn btn-theme"  value="Submit" /></div>


                <hr>
            </form>
        </div>
    </div><!-- col-lg-12-->      	
</div><!-- /row -->

