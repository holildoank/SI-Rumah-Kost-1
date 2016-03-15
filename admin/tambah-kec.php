
<?php
include "../config/config.php";

if (isset($_POST['submit'])) {
    $id_kecamatan = $_POST['id_kecamatan'];
    $nama_kec = $_POST['nama_kec'];
    if (!empty($id_kecamatan) &&!empty($nama_kec)) {

$cek = mysql_db_query($db, "select * from kecamatan where nama_kec='$nama_kec' and id_kecamatan='$id_kecamatan'", $koneksi);
$valid = mysql_num_rows($cek);

if ($valid) {
echo "<script> document.location.href='index.php?page=4&status=<font color=red>Maaf, Data ini sudah ada!!</font>'; </script>";
} else {
    
}
    $query = mysql_query("insert into kecamatan values('$id_kecamatan','$nama_kec')");
    if ($query) {
        ?><script language="javascript">document.location.href="index.php?page=5&status=SuksesMenambahkam data Kecamatan";</script><?php
    } else {
        ?><script language="javascript">document.location.href="index.php?page=4";</script><?php
    }
    

} 
       
    
} else {
    unset($_POST['submit']);
}
?>

<div class="row mt">
    <div class="col-lg-12"><hr></hr>
          <button type="button" class="btn btn-success"><a href="index.php?page=5" >Lihat Data kecamatan</a></button>
        <div class="form-panel">

            <h4 class="mb"><center>Form Tambah Kecamatan</center></h4> <hr></hr>
            <form  method="post" class="form-horizontal style-form"  >
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kode Pos</label>
                    <div class="col-sm-4">
                        <input type="text" id="id_kecamatana" value="" name="id_kecamatan" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Kecamatan</label>
                    <div class="col-sm-4">
                        <input type="text" id="nama_kec" name="nama_kec" value="" class="form-control " required>


                        <br><br>
                        <div class="submit">
                            <input type="submit" name="submit" id="submit" class="btn btn-theme"  value="Submit" /></div>


                        <hr>

                    </div>
                </div><!-- col-lg-12-->     
            </form>                                
        </div><!-- /row -->



    </div>
</div><!-- /col-md-4 -->

