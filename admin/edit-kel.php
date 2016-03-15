<?php
session_start();

if ($_SESSION['username']) {
    $username = $_SESSION['username'];
    ?>        <?php
    include "../config/config.php";
    if (isset($_GET['id_kelurahan'])) {
        
        $tampil = "select * from kelurahan where id_kelurahan='$_GET[id_kelurahan]'";
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
                                <input type="hidden" name="id_kelurahan" value="<?php echo $dataTampil['id_kelurahan']; ?>" />
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama kelurahan</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="nama_kel" value="<?php echo $dataTampil['nama_kel']; ?>"  name="nama_kel" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Kecamatan</label>
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