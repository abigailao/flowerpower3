<?php
include("../public/layout/header.php");
?>
<title>Medewerker Beheer</title>
<?php
require_once("../controllers/AccountController.php");


$mBeheer = new AccountController();

$all_bouquets = $mBeheer->getMBeheer();
$all_categories = $category->getCategories();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $category = trim($_POST['category']);
    $img = trim($_POST['img']);
    $productId = trim($_POST['product_id']);

    $mBeheer->editBouquet($name, $description, $price, $category, $img, $productId);
}

if (isset($_GET['delete'])) {
    $mBeheer->deleteBouquet($_REQUEST['id']);
}


?>
<div class="container home">

    <!--Banner-->
    <div class="jumbotron p-3 rounded text-light mb-2">
        <h1 class="display-4">Medewerker Beheer</h1>
        <p class="lead">Beheer accounts van medewerkers</p>
    </div>
    <table id="data_table" class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Naam</th>
            <th>Omschrijving</th>
            <th>Prijs</th>
            <th>Url</th>
            <th>Categorie</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($all_bouquets as $mBeheer) {
            ?>
            <tr>
                <td>
                    <?= $mBeheer->idProduct?>
                </td>
                <form method="post" action="productWijzigen.php">

                    <td><label>
                            <input name="name" value="<?= $mBeheer->naam ?>">
                            <input name="product_id" type="hidden" value="<?= $mBeheer->idProduct ?>">
                        </label></td>
                    <td><label>
                            <input name="description"
                                   value="<?= $mBeheer->omschrijving ?>">
                        </label></td>
                    <td><label>
                            <input name="price" value="<?= $mBeheer->prijs ?>">
                        </label></td>
                    <td><label>
                            <input name="img" value="<?= $mBeheer->img_url ?>">
                        </label></td>
                    <td><label>
                            <select class="form-select mb-3" name="category">
                                <?php
                                foreach ($all_categories as $category) {
                                    if ($category->idCategorie == $mBeheer-> categorie_idCategorie){
                                        ?>
                                        <option selected value="<?= $category->idCategorie ?>"><?= $category->Categorie ?></option>
                                        <?php
                                    }else{
                                        ?>
                                        <option value="<?= $category->idCategorie ?>"><?= $category->Categorie ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>

                        </label></td>
                    <td><input type="submit" value="Wijzig"></td>
                </form>
                <td><a href="productWijzigen.php?delete&id=<?= $mBeheer->idProduct ?>">Verwijderen</a></td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>
<script type="text/javascript" src="stomProductEdit.js"></script>

<?php include('../public/layout/footer.php'); ?>
