<?php
include "../public/layout/header.php";


require_once("../controllers/BouquetController.php");
require_once("../controllers/CartController.php");

$bouquets = new bouquetController();
$all_bouquets = $bouquets->getCategory1();

$cart = new cartController();

if (isset($_REQUEST['addToCart'])) {

    $cart->addToCart($_REQUEST['id'], $_POST['product'], $_POST['amount']);
}

?>
    <div class="jumbotron p-3 rounded text-light mb-2 bg-warning">
        <h1 class="display-4">Boeketten voor een Bruiloft</h1>
        <p class="lead">Dit is de boeketten pagina. Hier kan je alle boeketten vinden die je nodig hebt!</p>

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

                                <div class="form-row">
                                    <input type="hidden" value="<?= $bouquet->naam ?>" name="product">
                                    <div class="col-4 mb-2">
                                        <input type="number" class="form-control" name="amount">
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary">Voeg toe</button>
                                    </div>
                                </div>
                            </form>

                            <!--new-->
                            <div class='product_overlay'>
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