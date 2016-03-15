<div class="wrapper row3">
    <div class="rounded">
        <main class="container clear"> 


            <h2>Petunjuk Jalan</h2>
            <form action="#" onsubmit="setDirections(this.from.value, this.to.value, this.locale.value); return false">
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th align="right">Dari:&nbsp;</th>
                            <td> <font face="verdana" size="2" color="#666666">
                                <select id="fromAddress" name="from">
                                    <?php
                                    include"config/config.php";
                                     $query = mysql_query("select * from rumah_kost order by Nama_kost DESC");

                                    while ($r = mysql_fetch_array($query)) {
                                        echo "<option value='$r[latitude],$r[longitude]'>$r[Nama_kost]</option>";
                                    }
                                    ?>
                                </select>
                            </font><td>
                            <th align="right">&nbsp;&nbsp;Ke:&nbsp;</th>
                            <td align="right"> <font face="verdana" size="2" color="#666666">

                                <select id="toAddress" name="to">
                                    <?php
                                    $query = mysql_query("select * from rumah_kost order by Nama_kost DESC");

                                    while ($r = mysql_fetch_array($query)) {
                                        echo "<option value='$r[latitude],$r[longitude]'>$r[Nama_kost]</option>";
                                    }
                                    ?>
                                </select>
                                </font>
                            </td>
                        </tr>
                        <tr>
<!--                            <th>Bahasa:&nbsp;</th>-->
                            <td colspan="3"> <font face="verdana" size="2" color="#666666">
                                <select type="hidden" id="locale" name="locale">
<!--                                    <option value="id" selected>Indonesia</option>
                                    <option value="en">Inggris</option>
                                    <option value="fr">Prancis</option>
                                    <option value="de">Jerman</option>
                                    <option value="ja">Jepang</option>
                                    <option value="es">Spanyol</option>-->
                                </select>
                                <input name="submit" class=" btn-info" type="submit" value="Cari Rute!" />
<!--                                <input name="submit" type="submit" value="Cari Rute!" />-->
                            </font><td>
                        </tr>
                    </table>
            </form>
            <br/>

            <table></div>

                <tr>
                    <td valign="top">
                        <div id="directions" style="width: 200px"></div>
                    </td>
                    <td valign="top">
                        <div id="map_canvas" style="width: 670px; height: 700px"></div>
                    </td>
                </tr>
            </table>
        </main>
    </div></div>