<?php
session_start();
if ($_SESSION['username']) {
    $username = $_SESSION['username'];
    ?>
    <?php
    include "../config/config.php";
    if (isset($_POST['submit'])) {
        $id_member = $_POST['id_member'];
        $Nama_kost = $_POST['Nama_kost'];
        $alamat_kost = $_POST['alamat_kost'];
        $id_kecamatan = $_POST['id_kecamatan'];
        $id_kelurahan = $_POST['id_kelurahan'];
        $fasilitas = $_POST['fasilitas'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $lain_lain = $_POST['lain_lain'];
        $harga_terendah = $_POST['harga_terendah'];
        $jenis_kost = $_POST['jenis_kost'];
        $kategori = $_POST['kategori'];
       
        $lokasi_file = $_FILES['fupload']['tmp_name'];
        $tipe_file = $_FILES['fupload']['type'];
        $nama_file = $_FILES['fupload']['name'];
        $acak = rand(1, 99);
        $nama_file_unik = $acak . $nama_file;

        // Apabila ada gambar yang diupload
        if (!empty($lokasi_file)) {
            if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg") {
                echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('inde.php?page=3)</script>";
            } else {
                UploadImage($nama_file_unik);

                mysql_query("INSERT INTO rumah_kost(id_member,Nama_kost,alamat_kost,id_kecamatan,id_kelurahan,fasilitas,latitude,longitude,lain_lain,
                        harga_terendah,jenis_kost,kategori,foto) 
                            VALUES('$_POST[id_member]',
                                    '$_POST[Nama_kost]',
                                   '$_POST[alamat_kost]', 
                                   '$_POST[id_kecamatan]',
                                   '$_POST[id_kelurahan]',
                                   '$_POST[fasilitas]',
                                   '$_POST[latitude]',
                        
                        '$_POST[longitude]',
                                   '$_POST[lain_lain]',
                                   '$_POST[harga_terendah]',
                                   '$_POST[jenis_kost]',
                                   '$_POST[kategori]',
                                    
                                   '$nama_file_unik')");
            }
            echo "<script> document.location.href='index.php?page=3&status=<font color=Black>Sukses Penyimpanan Data Kost</font>'; </script>";
        } else {
            mysql_query("INSERT INTO rumah_kost(id_member,Nama_kost,alamat_kost,id_kecamatan,id_kelurahan,fasilitas,latitude,longitude,lain_lain,
                        harga_terendah,jenis_kost,kategori,foto) 
                            VALUES('$_POST[id_member]',
                                    '$_POST[Nama_kost]',
                                   '$_POST[alamat_kost]', 
                                   '$_POST[id_kecamatan]',
                                   '$_POST[id_kelurahan]',
                                   '$_POST[fasilitas]',
                                   '$_POST[latitude]',
                        
                        '$_POST[longitude]',
                                   '$_POST[lain_lain]',
                                   '$_POST[harga_terendah]',
                                   '$_POST[jenis_kost]',
                    '$_POST[kategori]',
                                    
                                   '$nama_file_unik')");
        }
        echo "<script> document.location.href='index.php?page=3&status=<font color=Black>Sukses Penyimpanan Data Kost</font>'; </script>";
        //mengambil photo
//        $foto=$_FILES['foto']['name'];
//        		//jika tidak maka aka diupload dan disimpan yrlnya kedalam database,		
//			if($foto!=""){
//			//melakukan upload foto
//			move_uploaded_file($_FILES['foto']['tmp_name'],"images/".$foto);
//
//             }
//       $sql = "INSERT INTO rumah_kost SET id_member='$id_member', Nama_kost='$Nama_kost', alamat_kost='$alamat_kost',id_kecamatan='$id_kecamatan', id_kelurahan='$id_kelurahan', fasilitas='$fasilitas',latitude='$latitude', longitude='$longitude',lain_lain='$lain_lain',harga_terendah='$harga_terendah',jenis_kost='$jenis_kost',foto='images/$foto'";
//            $query = mysql_query($sql) or die(mysql_errno());
//                 } else {
//            $sql = "INSERT INTO rumah_kost SET id_member='$id_member', Nama_kost='$Nama_kost', alamat_kost='$alamat_kost',id_kecamatan='$id_kecamatan', id_kelurahan='$id_kelurahan',fasilitas='$fasilitas',latitude='$latitude', longitude='$longitude',lain_lain='$lain_lain',harga_terendah='$harga_terendah',jenis_kost='$jenis_kost'";
//            $query = mysql_query($sql) or die(mysql_errno());
//        }
    }
    ?>
    <?php
    include "../config/config.php";
    $id_member = $_SESSION['id_member'];

    $member = mysql_fetch_array(mysql_query("select* from member "));
    $nama = $member['nama'];
    ?>
    <div class="row mt">
        <div class="col-lg-9 col-md-7 col-sm-12">
            <! -- BASIC PROGRESS BARS -->
            <div class="showback">
                <form   method="post" class="form-horizontal style-form"  >
                    <input type="hidden" id="id_member" name="id_member" value="<?php echo $id_member ?>" class="form-control " required>   
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Kost</label>
                        <div class="col-sm-4">
                            <input type="text" id="Nama_kost" name="Nama_kost" value="" class="form-control " required>

                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">Alamat Kost</label>
                        <div class="col-sm-4">
                            <input type="text" id="alamat_kost" name="alamat_kost" value="" class="form-control " required>

                        </div>
                    </div>
                   

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
                        <label class="col-sm-2 col-sm-2 control-label">Fasilitas</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="fasilitas" name="fasilitas" type="text" value=""></textarea>
                        </div>
                        
                    </div>
                    <table width="40" height="30" border='0'>
                        <tr>
                            <td width="6">:</td>
                        <div id="kanvaspeta" style=" margin:0px auto; width:70%; height:330px; padding:10px;"></div>
                        </tr>
                    </table>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Latitude</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="latitude" name="latitude" type="text" value="">
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">Longitude</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="longitude" name="longitude" type="text"  >
                        </div>
                    </div>
                   <div class="form-group">
                       <label class="col-sm-2 col-sm-2 control-label">Peraturan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="lain_lain" name="lain_lain" type="text"  ></textarea>
                        </div>
                   </div>
                    <div class="form-group">
                        
                         <label class="col-sm-2 col-sm-2 control-label">Jenis Kost</label>
                        <div class="col-sm-4">

                            <select class="form-control" name="jenis_kost" value="" id="jenis_kost" required>
                                <option value="">Pilih jenis Kost</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">Harga Terendah</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="harga_terendah" name="harga_terendah" type="text"  >
                        </div>
                    </div>
                    <input type="hidden" name="kategori" id="kategori" value="Rumah-Kost"> 

                    <div class="submit">
                        <input type="submit" name="submit" id="submit" class="btn btn-theme"  value="Submit" /></div>
                    <hr>
                </form>
            </div></div>
<!--        <div class="col-lg-4 ds">
            <h3><center>Form Tambah Data KOst</center></h3> <hr></hr>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama Pemilik</label>
                                <div class="col-sm-8">
            
            
                                    <select class="form-control"  name="id_member" id="id_member" required>
            <!--?php
            $query = mysql_query("select *from member where id_member=$id_member");
            $data = mysql_fetch_array($query);
            echo "<option value='$data[id_member]'>$data[nama]</option>";
            ?>
        </select>
    </div></div>


                                  <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Pilih Kelurahan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control"  name="kelurahan" id="id_kelurahan" required>
                                        </select>
                                    </div>
                                </div>



        </div>-->
    </div><!-- col-lg-12-->      	
    </div><!-- /row -->
    <?php
} else {
    session_destroy();
    header('Location:../login.php?status=Silahkan Login');
}
?>