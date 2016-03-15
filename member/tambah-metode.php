<?php
include "../config/config.php";
$id_metode = $_SESSION['id_metode'];
$id_member = $_SESSION['id_member'];
?>
<?php
if (isset($_POST['submit'])) {
    $id_member = $_POST['id_member'];
    $metode = $_POST['metode'];
    $Bank = $_POST['Bank'];
    $No_rek = $_POST['No_rek'];
    $query = mysql_query("insert into metode_pembayaran values('','$id_member','$metode','$Bank','$No_rek')");
    if ($query) {
        ?><script language="javascript">document.location.href="index.php?page=15&status='sukses'";</script><?php
    } else {
        ?><script language="javascript">document.location.href="index.php?page=15";</script><?php
    }
} else {
    unset($_POST['submit']);
}
?>

<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">

            <h4 class="mb"><center>Form Tambah Metode Pembayaran</center></h4> <hr></hr>
            <form action="tambah-metode.php"  method="post" class="form-horizontal style-form"  >
                  <input type="hidden" id="id_member" value="<?php echo $id_member ?>"  name="id_member" class="form-control" required>
              <div class="form-group">
<!--                    <label class="col-sm-2 col-sm-2 control-label">Pilih Metode Pembayaran</label>
                    <div class="col-sm-4">

                        <select class="form-control" name="metode" value="" id="metode" >
                            <option value="">Pilih jenis Pemabayaran</option>
                            <option value="Langsung">Langsung</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    </div>-->
<input type="hidden" id="metode" value="Transfer"  name="metode" class="form-control" required>
                </div>
<!--                   <h4 class="mb">Isi form di bawah ini Jika Jenis Pembayaran Transfer</h4> <hr></hr>-->
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Masukan  Bank</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="Bank" name="Bank" type="text" value="" >
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Masukan No Rek</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="No_rek" name="No_rek" type="text" value=""  >
                    </div>
                </div>
<!--                      <h4 class="mb">Isi form di bawah ini Jika Jenis Pembayaran Langsung Dan Kosongi form di atas</h4> <hr></hr>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Masukan  Keterangan Pembayaran</label>
                    <div class="col-sm-10" >
                        <input height="40px" class="form-control" id="Bank" name="Bank" type="text" value="" >
                    </div>
                </div>-->
                 
                        <br><br>
                        <div class="submit">
                            <input type="submit" name="submit" id="submit" class="btn btn-theme"  value="Submit" /></div>


                        <hr>
                        </form>
                    </div>
                </div><!-- col-lg-12-->      	
        </div><!-- /row -->
