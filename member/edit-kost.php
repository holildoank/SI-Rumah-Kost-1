<?php
session_start();
if ($_SESSION['username']) {
    $username = $_SESSION['username'];
    ?>

  <?php
                include "../config/config.php";
                if (isset($_GET['id_rumah'])) {
                    $tampil = "select * from rumah_kost where id_rumah='$_GET[id_rumah]' and id_member='$_GET[id_member]'";
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
        <div class="col-lg-8 col-md-7 col-sm-12">
            <! -- BASIC PROGRESS BARS -->
            <div class="showback">
                <table width="800" height="202" border='0'>
                    <tr>
                        <td width="6">:</td>
                    <div id="kanvaspeta" style=" margin:0px auto; width:100%; height:630px; padding:10px;"></div>
                    </tr>
                </table>
            </div></div>
        <div class="col-lg-4 ds">
            <h3><center>Form Tambah Data KOst</center></h3> <hr></hr>
            <form  action="updatekost.php"  method="post" class="form-horizontal style-form"  >
            

                <input type="hidden" id="id_member" name="id_member" value="<?php echo $dataTampil['id_member']; ?>" class="form-control " required>  
                <input type="hidden" id="id_rumah" name="id_rumah" value="<?php echo $dataTampil['id_rumah']; ?>" class="form-control " required> 
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Kost</label>
                    <div class="col-sm-10">
                        <input type="text" id="Nama_kost" name="Nama_kost" value="<?php echo $dataTampil['Nama_kost']; ?>" class="form-control " required>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Alamat Kost</label>
                    <div class="col-sm-10">
                        <input type="text" id="alamat_kost" name="alamat_kost" value="<?php echo $dataTampil['alamat_kost']; ?>" class="form-control " required>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Pilih Kecamatan</label>
                    <div class="col-sm-10">

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
                    <div class="col-sm-10">
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
                    <label class="col-sm-2 col-sm-2 control-label">Fasilitas</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="fasilitas" name="fasilitas" type="text" value="<?php echo $dataTampil['fasilitas']; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Latitude</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="latitude" name="latitude" type="text" value="<?php echo $dataTampil['latitude']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Longitude</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="longitude" name="longitude" type="text" value="<?php echo $dataTampil['longitude']; ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Keterangan Lain-lain</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="lain_lain" name="lain_lain" type="text" value="<?php echo $dataTampil['lain_lain']; ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Harga Min</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="harga_terendah" name="harga_terendah" type="text" value="<?php echo $dataTampil['harga_terendah']; ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Kost</label>
                    <div class="col-sm-8">

                        <select class="form-control" name="jenis_kost" value="" id="jenis_kost" required>
                            <option value="">Pilih jenis Kost</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
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