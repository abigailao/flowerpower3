<?php
include "../public/layout/header.php";


require_once("../controllers/CartController.php");

$cart = new CartController();
//$all_cart = $cart->getCart();

if (isset($_REQUEST['remove'])) {
    $cart->removeFromCart($_REQUEST['id']);
}

?>
    <div class="jumbotron p-3 rounded text-light bg-warning mb-2">
        <h1 class="display-4">Winkelwagen</h1>
        <p class="lead">Dit zijn alle boeketten die in je winkel wagen zitten!</p>
    </div>

    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#Product nummer</th>
                <th scope="col">Product</th>
                <th scope="col">Aantal</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            <?php
            //        if ($_SESSION["cart_item"] != null) {
            if (isset($_SESSION["cart_item"])){
            foreach ($_SESSION["cart_item"] as $cart_item) {
                ?>
                <tr>
                    <th scope="row"><?= $cart_item['id'] ?></th>
                    <td><?= $cart_item['product'] ?></td>
                    <!--                    <td>--><?//= $cart_item['amount'] ?><!--</td>-->
                    <td class="col-4 mb-2">
                        <input type="number" class="form-control" name="amount" placeholder="<?= $cart_item['amount'] ?>">
                    </td>
                    <td><a class="text-danger" href="cart.php?remove&id=<?= $cart_item['id'] ?>">Verwijder</a></td>
                </tr>
                <?php
            }?>
            </tbody>
        </table>
<!--testing card message bij customer-->

                <!--^testing card message bij customer^-->

            </div>
        </div>
        <?php
        } else {
            ?>
            <div>Je winkelwagen is leeg!</div>
            <?php

        }
        ?>

    </div>
<?php
include("../public/layout/footer.php");
?>