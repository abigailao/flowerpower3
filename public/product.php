<?php
include "../public/layout/header.php";


require_once("../controllers/BouquetController.php");
require_once("../controllers/CartController.php");

$bouquets = new bouquetController();
$all_bouquets = $bouquets->getCategory1();

$cart = new cartController();

if (isset($_REQUEST['addToCart'])) {
//    session_start();

    $cart->addToCart($_REQUEST['id'], $_POST['product'], $_POST['amount']);
}

?>

<?php
include "../public/layout/footer.php";
?>
