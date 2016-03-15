<?php
session_start();

if ($_SESSION['username']) {

    //koneksi terpusat
  
    $username = $_SESSION['username'];
  
        ?>        <?php
                include "../config/config.php";
                if (isset($_GET['id_kecamatan'])) {
                    $tampil = "select * from kecamatan where id_kecamatan='$_GET[id_kecamatan]'";
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

 <?php include"style.php";?>

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

                            <h4 class="mb"><center>Form Update kecamatan</center></h4> <hr></hr>
                            <form action="update-kec.php"  method="post" class="form-horizontal style-form"  >
                               
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Kode POS</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="id_kecamatan" value="<?php echo $dataTampil['id_kecamatan']; ?>"  name="id_kecamatan" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Kecamatan</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="nama_kec" name="nama_kec" value="<?php echo $dataTampil['nama_kec']; ?>" class="form-control " required>
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
                <div class="row mt">

                </div><!-- /row --> 

               
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