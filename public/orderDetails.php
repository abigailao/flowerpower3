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
        <h1 class="display-4">Bestelling Afronden</h1>
        <p class="lead">Bezorgkosten zijn standaard vanaf 5 euro!</p>
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
                <div class="form-group">
                    <label for="fname">Voornaam:</label>
                    <input type="email" class="form-control" name="naam" id="naam" required="required" placeholder="Naam">
                </div>
                <div class="form-group">
                    <label for="lname">Achternaam:</label>
                    <input type="text" class="form-control" name="achternaam" id="naam" required="required" placeholder="Achternaam">
                </div>
                <div class="form-group">
                    <label for="lname">Email:</label>
                    <input type="text" class="form-control" name="email" id="email" required="required" placeholder="email@voorbeeld.nl">
                </div>
                <div class="form-group">
                    <label for="lname">Telefoonnummer:</label>
                    <input type="text" class="form-control" name="naam" id="naam" required="required" placeholder="06-12345678">
                </div>
                <div class="form-group">
                    <label for="onderwerp">Bezorg adres:</label>
                    <input type="text" class="form-control" name="onderwerp" id="onderwerp" required="required" maxlength="80" placeholder="Adres">
                </div>
                <div class="form-group">
                    <label for="password">Tekst (optioneel):</label>
                    <textarea class="form-control" name="text" id="text" required="required" maxlength="250" placeholder="Tekst..."></textarea>
                </div>
                <button style="background-color: #c45832;" type="submit" class="btn btn-primary mt-2 border-0">Bestelling Plaatsen</button>
                </div>
                <?php
            } else {
                ?>
                <div>Je winkelwagen is leeg!</div>
                <?php
            }
            ?>
<?php
include("../public/layout/footer.php");
?>