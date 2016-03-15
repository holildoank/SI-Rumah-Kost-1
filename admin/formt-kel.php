<?php
session_start();

if ($_SESSION['username']) {


    if (isset($_POST['submit'])) {
        $id_kecamatan = $_POST['id_kecamatan'];
        $nama_kel = $_POST['nama_kel'];
        $query = mysql_query("insert into kelurahan values('$id_kecamatan','$nama_kel')");
        if ($query) {
            ?><script language="javascript">document.location.href="?page=formt-kec&status=1";</script><?php
        } else {
            ?><script language="javascript">document.location.href="?page=data_guru&status=2";</script><?php
        }
    } else {
        unset($_POST['submit']);
    }
    ?>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">

                <h4 class="mb"><center>Form Tambah Kelurahan</center></h4> <hr></hr>
                <form action="?page=formt-kel"  method="post" class="form-horizontal style-form"  >
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
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Kelurahan</label>
                        <div class="col-sm-4">
                            <input type="text" id="nama_kel" name="nama_kel" value="" class="form-control " required>


                            <br><br>
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