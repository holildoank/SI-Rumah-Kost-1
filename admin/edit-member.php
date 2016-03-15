<?php
session_start();

if ($_SESSION['username']) {

    //koneksi terpusat

    $username = $_SESSION['username'];
    ?>        <?php
    include "../config/config.php";
    if (isset($_GET['id_member'])) {
        $tampil = "select * from member where id_member='$_GET[id_member]'";
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
    <?php include"style.php"; ?>

    <section id="container" >
        <?php include"header.php"; ?>
        <aside>
            <?php include "menu.php"; ?>
        </aside>
        <section id="main-content">
            <section class="wrapper">
                <div class="row mt">
                    <div class="col-lg-12"><hr></hr>
                        <div class="form-panel">

                            <h4 class="mb"><center>Form Update Member</center></h4> <hr></hr>
                            <form action="update-member.php"  method="post" class="form-horizontal style-form"  >
                                <input type="hidden" name="id_member" value="<?php echo $dataTampil['id_member']; ?>" />
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="nama" value="<?php echo $dataTampil['nama']; ?>"  name="nama" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">No KTP</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="ktp" name="ktp" value="<?php echo $dataTampil['ktp']; ?>" class="form-control " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Username</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="username" name="username" value="<?php echo $dataTampil['username']; ?>" class="form-control " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="alamat" name="alamat" value="<?php echo $dataTampil['alamat']; ?>" class="form-control " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo $dataTampil['tempat_lahir']; ?>" class="form-control " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="tgl_lahir" name="tgl_lahir" value="<?php echo $dataTampil['tgl_lahir']; ?>" class="form-control " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">No Hp</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="no_hp" name="no_hp" value="<?php echo $dataTampil['no_hp']; ?>" class="form-control " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">No Rek</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="No_rek" name="No_rek" value="<?php echo $dataTampil['No_rek']; ?>" class="form-control" required>
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

                                <br><br>
                                <div class="submit">
                                    <input type="submit" name="submit" id="submit" class="btn btn-theme"  value="Submit" /></div>


                                <hr>
                            </form>
                        </div>
                    </div><!-- col-lg-12-->      	
                </div><!-- /row -->



                </div>
                </div><!-- /col-md-4 -->


                </div><!-- /row -->




                </div><!-- /col-md-4 -->

                </div><!-- /row -->

                <div class="row mt">

                </div><!-- /row --> 

                </div>

                </div><! --/row -->
            </section>
        </section></section>

    <br><br>
    <?php include"foter.php"; ?>
    <?php
} else {
    session_destroy();
    header('Location:../login.php?status=Silahkan Login');
}
?>