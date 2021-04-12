<?php
include "../public/layout/header.php";


require_once("../controllers/BouquetController.php");
require_once("../controllers/CartController.php");

$bouquets = new bouquetController();
$all_bouquets = $bouquets->getBouquets();

$cart = new cartController();

if (isset($_REQUEST['addToCart'])) {
//    session_start();

    $cart->addToCart($_REQUEST['id'], $_POST['product'], $_POST['amount']);
}

?>
<div class="jumbotron p-3 rounded text-light mb-2 bg-warning">
    <h1 class="display-4">Assortiment</h1>
    <p class="lead">Boeketten lijst</p>
    <!--        <hr class="my-4">-->
    <!--        <p>We hebben alles in alle soorten en maten, veel plezier met kijken!</p>-->
</div>

<!--Boeketten-->
<div class="container">
    <div class="row">
        <?php
        if ($all_bouquets != null) {
            foreach ($all_bouquets as $bouquet) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 d-flex align-items-stretch mb-2">
                    <div class="" style="width: 18rem;">

                        <!--new-->
                        <div class='product-row'>
                            <div class='product--blue'>
                                <div class='product_inner'>
                                    <!--old-->
                                    <img src="../<?= $bouquet->img_url ?>" class="card-img-top" alt="...">

                                    <form action="bruiloft.php?addToCart&id=<?= $bouquet->idProduct ?>" method="post">
                                        <h5 class="card-title"><?= $bouquet->naam ?></h5>
                                        <p class="card-text">€ <?= $bouquet->prijs ?></p>
                                    </form>

                                    <!--new-->
                                    <div class='product_overlay'>
                                        <!--                                <h2>Added to basket</h2>-->
                                        <i class='fa fa-check'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div>Er zijn geen boeketten meer! Jammer.</div>
            <?php
        }
        ?>

        <?php
        include "../public/layout/footer.php";
        ?>
    </div>
</div>