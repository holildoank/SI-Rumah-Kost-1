<?

$page = $_GET['page'];

switch ($page) {
    case "1";
        include "welcoma.php";
        break;
    case "2";
        include "pemesan/e-kost.php";
        break;
    case "3";
        include "pemesan/Route-jalan.php";
        break;
    case "4";
        include "sigup.php";
        break;

    case "5";
        include "pemesan/ve-kamar.php";
        break;

    case "6";
        include "pemesan/e-pesan.php";
        break;

    case "7";
        include "pemesan/e-komfirmasi.php";
        break;

    case "8";
        include "pemesan/e-rincian.php";
        break;
    case "9";
        include "pemesan/detail.pesanan.php";
        break;
    case "10";
        include "pemesan/all-kamar.php";
        break;
    case "11";
        include "pemesan/petaall-kost.php";
        break;
    case "12";
        include "pemesan/batal-pesan.php";
        break;
    case "13";
        include "pemesan/petunjuk.php";
        break;
    case "14";
        include "pemesan/kost-laki.php";
        break;
    case "15";
        include "pemesan/kost-p.php";
        break;
    case "16";
        include "pemesan/cariharga-kost.php";
        break;
     case "17";
        include "pemesan/G-allkost.php";
        break;
     case "18";
        include "pemesan/detail-k.php";
        break;
        case "19";
        include "pemesan/otomatis-batal.php";
        break;
    default;
        include "welcoma.php";
        break;
}
?>