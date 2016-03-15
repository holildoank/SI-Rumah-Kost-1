<?

$page = $_GET['page'];

switch ($page) {
    case "1";
        include "tengah.php";
        break;


    case "2";
        include "tambah-kos.php";
        break;


    case "3";
        include "view-kos.php";
        break;


    case "4";
        include "tambah-kamar.php";
        break;

    case "5";
        include "v-kamar.php";
        break;

    case "6";
        include "tambah-kel.php";
        break;

    case "7";
        include "table.php";
        break;

    case "8";
        include "edit-member.php";
        break;
    case "9";
        include "komfirmasi_pemesan.php";
        break;
    case "10";
        include "e-statuspesan.php";
        break;
    case "11";
        include "detail-pemesan.php";
        break;
    case "12";
        include "edit-kost.php";
        break;
    case "13";
        include "edit-kamar.php";
        break;
    case "14";
        include "detail-kost.php";
        break;
    case "15";
        include "tambah-metode.php";
        break;

    default;
        include "tengah.php";
        break;
}
?>