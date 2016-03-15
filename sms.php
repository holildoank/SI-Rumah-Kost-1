<?php
 
//koneksi ke mysql dan db nya
include"config/config.php"; 
// query untuk membaca SMS yang belum diproses
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
  // membaca ID SMS
  $id = $data['ID'];
 
  // membaca no pengirim
  $noPengirim = $data['SenderNumber'];
 
  // membaca pesan SMS dan mengubahnya menjadi kapital
  $msg = strtoupper($data['TextDecoded']);
 
  // proses parsing 
 
  // memecah pesan berdasarkan karakter
  $pecah = explode(" ", $msg);
 
  // jika kata terdepan dari SMS adalah 'STATUS' maka cari STATUS Kalkulus
  if ($pecah[0] == "STATUS")
  {
     // baca ID PESAN dari pesan SMS
     $id_pesan = $pecah[1];
 
     // cari status pemsanan berdasar ID PESAN
     $query2 = "SELECT status FROM sewa WHERE id_pesan = '$id_pesan'";
     $hasil2 = mysql_query($query2);
 
     // cek bila data status tidak ditemukan
     if (mysql_num_rows($hasil2) == 0) $reply = "ID PESAN INi tidak ditemukan";
     else
     {
        // bila status ditemukan
        $data2 = mysql_fetch_array($hasil2);
        $status = $data2['status'];
        $reply = "Status Pemesanan  dengan ID PESAN: ".$id_pesan.$status;
     }
  }
  else $reply = "Maaf perintah salah";
 
  // membuat SMS balasan
 
  $query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$noPengirim', '$reply', 'Gammu')";
  $hasil3 = mysql_query($query3);
 
  // ubah status 'processed' menjadi 'true' untuk setiap SMS yang telah diproses
 
  $query3 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
  $hasil3 = mysql_query($query3);
}
?>