<div class="wrapper row3">
    <div class="rounded">
        <main class="container clear"> 
            <!-- main body --> 
            <!-- ################################################################################################ -->
            <!--?php include"pagekiri.php";?>-->
<!--            <div id="content" class="three_quarter"> -->
                <!-- ################################################################################################ -->
                <h1>&lt;h1&gt; to &lt;h6&gt; - Headline Colour and Size Are All The Same</h1>
                <table id="tabel" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pemilik</th>
                            <th>Nama Kost</th>
                            <th>Alamat </th>
                            <th>Keterangan</th>
                            <th>Jumlah Kamar</th>
                            <th>Kamar Kosong</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
<!--                    <tbody>				
                        <?php
                        include "../config/config.php";
                        $tampil = "select member.id_member, member.nama,kecamatan.id_kecamatan, kecamatan.nama_kec, kelurahan.id_kelurahan,kelurahan.nama_kel,rumah_kost.id_rumah, rumah_kost.Nama_kost, rumah_kost.lain_lain,rumah_kost.jumlah_kamar FROM member,kecamatan,kelurahan,rumah_kost
                                WHERE member.id_member=kecamatan.id_kecamatan,kelurahan.id_kelurahan=rumah_kost.id_rumah";

                        $qryTampil = mysql_query($tampil);
                        while ($dataTampil = mysql_fetch_array($qryTampil)) {
                            $no++
                            ?>
                            <tr> <td><?php echo $no; ?></td>
                                <td><?php echo $dataTampil['nama']; ?></td>
                                <td><?php echo $dataTampil['Nama_kost']; ?></td>
                                <td><?php echo $dataTampil['nama_kec']; ?></td>
                                <td><?php echo $dataTampil['nama_kel']; ?></td>
                                <td><?php echo $dataTampil['lain_lain']; ?></td>
                                <td><?php echo $dataTampil['jumlah_kamar']; ?></td>
                                <td><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                    <button class="btn btn-primary btn-xs"><a href="edit-member.php?id_member=<?php echo $dataTampil['id_member']; ?>"><i class="fa fa-pencil"></i></a></button>
                                    <button class="btn btn-danger btn-xs"> <a href="delete-member.php?id_member=<?php echo $dataTampil['id_member'] ?>" onclick="return confirm('Anda yakin akan menghapus data Ini ?')"><i class="fa fa-trash-o "></i></a></button></td>
                            </tr>

                        <?php } ?> </tbody>-->
                </table>

                <!-- ################################################################################################ --> 
                <!--            </div>-->
        </main>
    </div></div>