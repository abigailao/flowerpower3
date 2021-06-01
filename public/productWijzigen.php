<?php
include("../public/layout/header.php");
?>
<title>Edit product details</title>
<?php
require_once("../controllers/BouquetController.php");
require_once("../controllers/CategoryController.php");

$bouquet = new bouquetController();
$category = new CategoryController();

$all_bouquets = $bouquet->getBouquets();
$all_categories = $category->getCategories();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $category = trim($_POST['category']);
    $img = trim($_POST['img']);
    $productId = trim($_POST['product_id']);

    $bouquet->editBouquet($name, $description, $price, $category, $img, $productId);
}

if (isset($_GET['delete'])) {
    $bouquet->deleteBouquet($_REQUEST['id']);
}


?>
<div class="container home">
<!--    <h2>Edit product details</h2>-->
    <!--Banner-->
    <div class="jumbotron p-3 rounded text-light mb-2">
        <h1 class="display-4">Edit product details</h1>
        <p class="lead"></p>
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
        foreach ($all_bouquets as $bouquet) {
            ?>
            <tr>
                <td>
                        <?= $bouquet->idProduct?>
                    </td>
                <form method="post" action="productWijzigen.php">

                    <td><label>
                            <input name="name" value="<?= $bouquet->naam ?>">
                            <input name="product_id" type="hidden" value="<?= $bouquet->idProduct ?>">
                        </label></td>
                    <td><label>
                            <input name="description"
                                   value="<?= $bouquet->omschrijving ?>">
                        </label></td>
                    <td><label>
                            <input name="price" value="<?= $bouquet->prijs ?>">
                        </label></td>
                    <td><label>
                            <input name="img" value="<?= $bouquet->img_url ?>">
                        </label></td>
                    <td><label>
                            <select class="form-select mb-3" name="category">
                                <?php
                                foreach ($all_categories as $category) {
                                    if ($category->idCategorie == $bouquet-> categorie_idCategorie){
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
                <td><a href="productWijzigen.php?delete&id=<?= $bouquet->idProduct ?>">Verwijderen</a></td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>

<?php include('../public/layout/footer.php'); ?>
