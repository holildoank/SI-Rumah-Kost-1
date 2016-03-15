<?

$page = $_GET['page'];

switch ($page) {
    case "1";
        include "tengah.php";
        break;


    case "2";
        include "formt-member.php";
        break;


    case "3";
        include "view-member.php";
        break;


    case "4";
        include "tambah-kec.php";
        break;

    case "5";
        include "view-kec.php";
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
        include "tambah-layanan.php";
        break;
    case "10";
        include "view-layanan.php";
        break;

    default;
        include "tengah.php";
        break;
}
?>