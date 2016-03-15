<?php
include "config/config.php";
if (isset($_POST['submit'])) {
$no_identitas = $_POST['no_identitas'];
$jenis_id = $_POST['jenis_id'];
$nama_p = $_POST['nama_p'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$alamat = $_POST['alamat'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$phone= $_POST['phone'];
$status_p = $_POST['status_p'];

if (!empty($no_identitas) &&!empty($jenis_id) &&!empty($nama_p) &&!empty($username) &&!empty($password)&&!empty($alamat) &&!empty($tempat_lahir)
&&!empty($tgl_lahir) &&!empty($jk) &&!empty($phone) &&!empty($status_p)) {

$cek = mysql_db_query($db, "select * from penghuni where username='$username'", $koneksi);
$valid = mysql_num_rows($cek);

if ($valid) {
echo "<script> document.location.href='index.php?page=4&status=<font color=red>Maaf, USERNAME Anda sudah ada yang punya!!</font>'; </script>";
} else {

$insert=mysql_db_query($db, "insert into penghuni values('','$no_identitas','$jenis_id','$nama_p','$username','$password','$alamat','$tempat_lahir','$tgl_lahir','$jk','$phone','$status_p')", $koneksi);
if ($insert)
{
echo "<script> document.location.href='index.php?page=4&status=Selamat bergabung dengan situs kami.'; </script>";
}
}

} else {
echo "<script> document.location.href='index.php?page=4&status=<font color=red>Maaf, Data yang anda kirim belum lengkap!!</font>'; </script>";
}

}
?>

<!--
$query = mysql_query("insert into daftar values('','$nama_lengkap','$username','$email','$password','$no_id','$jenis_id','$tempat_l','$tanggal_l','$alamat','$kota','$propinsi','$telphone')");
if ($query) {
?><script language="javascript">document.location.href="index.php?page=3";</script>
<script language="javascript">
    
    function konfirm(id_)
    {
        tanya=confirm("Apakah anda yakin akan memlih kost ini ?")
        if (tanya !="0")
        {
            //alert(idbrg);
            top.location="e-pesan.php?id_rumah="+id_rumah;
        }
    }
    //
</script>-->

<!--?php
//} else {
//    ?><script language="javascript">document.location.href="index.php?page=2";</script><!-?php
//}
//} else {
//    unset($_POST['submit']);
//}
//?-->
<script language="javascript">
<!--
function tutup()
{
	top.window.close()
}
//-->
</script>
<script type="text/javascript">

  function checkForm(form)
  {
      
         if(form.no_identitas.value == "") {
      alert("Error: No Identitas tidak boleh kosong");
      form.no_identitas.focus();
      return false;
    }
       re = /[0-9]/;
      if(!re.test(form.no_identitas.value)) {
        alert("Error: Nomor Identitas Hanya Boleh Angka (0-9)!");
        form.no_identitas.focus();
        return false;
      }
    
     if(form.nama_p.value == "") {
      alert("Error: Nama Lengkap tidak boleh kosong");
      form.nama_p.focus();
      return false;
    }
    re = /[a-z]/;
      if(!re.test(form.nama_p.value)) {
        alert("Error: Nama Lengkap tidak boleh ada angka (a-z)!");
        form.nama_p.focus();
        return false;
      }
    if(form.username.value == "") {
      alert("Error: Username tidak boleh kosong");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Username harus berisi huruf,angka dan garis bawah");
      form.username.focus();
      return false;
    }

    if(form.pwd1.value != "" && form.pwd1.value) {
      if(form.pwd1.value.length < 6) {
        alert("Error: Password harus lebih 6 karakter!");
        form.pwd1.focus();
        return false;
      }
      if(form.pwd1.value == form.username.value) {
        alert("Error: Password tidak boleh sama Username!");
        form.pwd1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password harus mengandung setidaknya satu angka (0-9)!");
        form.pwd1.focus();
        return false;
      }
      re = /[a-z]/;
            if(!re.test(form.pwd1.value)) {
                alert("Error: password harus mengandung setidaknya satu huruf kecil (a-z)!");
                form.pwd1.focus();
                return false;
            }
      re = /[A-Z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password harus mengandung setidaknya satu  (A-Z)!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error: masukan password!");
      form.pwd1.focus();
      return false;
    }

    alert("You entered a valid password: " + form.pwd1.value);
    return true;
  }

</script>
<div class="wrapper row3">
    <div class="rounded">
        <div main class="container clear"> 
            <!-- main body --> 
            <!-- ################################################################################################ -->
            <div class="group btmspace-30"> 
                <?php include "kiri.php"; ?>
                <div class="one_half" backgroud-color="yellow"> 
                    <!-- ################################################################################################ -->
                    <h2><marquee>Selamat Datang Di Web Rumah Kost Bangkalan</marquee></h2>
                    <ul class="nospace listing">
                        <div id="comments" >

                            <h2>Isi sesuai dengan data Pribadi anda Kesalahan yang di sebabkan pendaftar di luar tanggung jawab kami</h2>
                           <p align="center"><font color="#0033FF" face='verdana' size='2'><blink><? echo $_GET['status'] ?></blink></font><br></p>
                            <form method="post" onsubmit="return checkForm(this);">
                                 <div class="block clear">
                                    <label for="url">Nomor Identitas<span>*</span></label>
                                    <input type="text" name="no_identitas" id="no_identitas" value="" size="22" placeholder="Masukan Nomor Identitas Anda  Contoh 5554387866628636777">
                                </div>
                                <div class="block clear">
                                    <label for="url">Jenis Identitas<span>*</span></label>
                                    <input type="text" name="jenis_id" id="jenis_id" value="" size="22">
                                </div>
                                <div class="block clear">
                                    <label for="name">Nama Lengkap <span>*</span></label>
                                    <input type="text" name="nama_p" id="nama_p" value="" size="22" placeholder="Masukan Nama Lengkap Anda">
                                </div>
                                <div class="block clear">
                                    <label for="email">Username <span>*</span></label>
                                    <input type="text" name="username" id="username" value="" size="22" placeholder="Masukan Username Anda">
                                </div>
                                 <div class="block clear">
                                    <label for="url">Password <span>*</span></label>
                                    <input type="password" name="password" id="password" value="" size="15" placeholder="Masukan Password Anda">
                                </div>
<!--                                <div class="block clear">
                                    <label for="url">Email<span>*</span></label>
                                    <input type="text" name="email" id="email" value="" size="22">
                                </div>-->
                                 <div class="block clear">
                                    <label for="url">Alamat<span>*</span></label>
                                    <input type="text" name="alamat" id="alamat" value="" size="22">
                                </div>
                                <div class="one_third">
                                    <label for="url">Tempat Lahir<span>*</span></label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="" size="40">
                                </div> <div class="one_third">
                                    <label for="url">Tanggal Lahir<span>*</span></label>
                                    <input type="date" name="tgl_lahir" id="tgl_lahir" value="" size="40">
                                </div>
                               
                                <div class="block clear">
                                    <label for="url">Jenis Klamin<span>*</span></label>
                                    <input type="text" name="jk" id="jk" value="" size="22">
                                </div>
                                <div class="block clear">
                                    <label for="url">No Hp<span>*</span></label>
                                    <input type="text" name="phone" id="phone" value="" size="22" placeholder="Masukan Nomor Telpon Anda">
                                </div>
                                 <div class="block clear">
                                    <label for="url">Status<span>*</span></label>
                                    <input type="text" name="status_p" id="status_p" value="" size="22">
                                </div>
                                <div>
                                    <input name="submit" type="submit" value="submit ">
                                    &nbsp;
                                    <input name="reset" type="reset" value="Reset Form">
                                </div>
                            </form>



                        </div>

                </div>
                <?php include"./login.php"; ?>
            </div>

        </div>
    </div>
    <div class="clear"></div>
</main>
</div>