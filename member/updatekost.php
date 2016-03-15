 <?php
    include "../config/config.php";
       if (isset($_POST)) {
    $query = "UPDATE rumah_kost SET  id_member = '$_POST[id_member]',
                                            Nama_kost = '$_POST[Nama_kost]',
                                            alamat_kost = '$_POST[alamat_kost]',
                                            id_kecamatan = '$_POST[id_kecamatan]',
                                            id_kelurahan = '$_POST[id_kelurahan]',
                                            fasilitas = '$_POST[fasilitas]',
                                            latitude = '$_POST[latitude]',
                                            longitude = '$_POST[longitude]',
                                            lain_lain = '$_POST[lain_lain]',
                                            harga_terendah = '$_POST[harga_terendah]',
                                            jenis_kost = '$_POST[jenis_kost]'
                                           
                                             WHERE id_rumah='$_POST[id_rumah]' ";
            $dataTampil = mysql_query($query);
      if ($query) {
            echo "<script> document.location.href='index.php?page=3&status=sukses'; </script>";
        } else {
            echo "<script> document.location.href='index.php?page=2'; </script>";
        }
    } else {
        unset($_POST['simpan']);
    }
    ?>
