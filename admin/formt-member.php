<?php
include "../config/config.php";
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $ktp = $_POST['ktp'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $alamat = $_POST['alamat'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $No_rek = $_POST['No_rek'];
    $Bank = $_POST['Bank'];

    $query = mysql_query("insert into member values('','$nama','$ktp','$username','$password','$alamat','$tempat_lahir','$tgl_lahir','$jk','$no_hp','$email','$No_rek','$Bank')");
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

            <h4 class="mb"><center>Form Tambah Member Baru</center></h4> <hr></hr>
            <form   method="post" class="form-horizontal style-form"  >
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" id="nama" name="nama" value="" class="form-control " required>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No KTP</label>
                    <div class="col-sm-4">
                        <input type="text" id="ktp" value="" name="ktp" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Username</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="username" name="username" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="password" name="password" type="password"  value="" >
                    </div>
                </div>

                <div class="form-group">

                    <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-4">

                        <input type="text"  value="" class="form-control" id="alamat" name="alamat">   
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tempat</label>
                    <div class="col-sm-4">
                        <input type="text" value="" id="tempat_lahir" name="tempat_lahir" class="form-control" required>
                    </div>
                </div>
              <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal lahir</label>
                    <div class="col-sm-4">
                        <input type="text" value="" id="tgl_lahir" name="tgl_lahir" class="form-control" required>
                    </div>
                </div>
               

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-4">

                        <select class="form-control" name="jk" value="" id="jk" required>
                            <option value="">Pilih jenis Kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No Hp</label>
                    <div class="col-sm-4">
                        <input type="text" id="no_hp" name="no_hp" value="" class="form-control" required>
                    </div>
                </div>
<!--                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" id="email" name="email" value="" class="form-control" required>
                    </div>
                </div>-->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No Rek</label>
                    <div class="col-sm-4">
                        <input type="text" id="No_rek" name="No_rek" value="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Bank</label>
                    <div class="col-sm-4">

                        <select class="form-control" name="Bank" value="" id="Bank" required>
                            <option value="">Pilih jenis Bank</option>
                            <option value="BRI">BRI</option>
                            <option value="BTN">BTN</option>
                        </select>
                    </div>
                </div>

                <div class="submit">
                    <input type="submit" name="submit" id="submit" class="btn btn-theme"  value="submit" /></div>


                <hr>
            </form>
        </div>
    </div><!-- col-lg-12-->      	
</div><!-- /row -->
