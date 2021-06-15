<?php
include "../public/layout/header.php";
include "../controllers/CategoryController.php";
include "../controllers/BouquetController.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Toevoegen</title>

    <?php
    $category = new CategoryController();
    $bouquet = new bouquetController();
    $all_categories = $category->getCategories();

    $error_message = "";
    $success_message = "";

    // Register user
    if (isset($_POST['btnsignup'])) {
        $target_dir = "../img/uploaded/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        $imagIsValid = $bouquet->isBouquetImageValid($target_dir, $target_file, $imageFileType, $check);
        if ($imagIsValid) {
            $imageName = $bouquet->addImage();

            if ($imageName != false) {
                $pname = trim($_POST['pname']);
                $description = trim($_POST['description']);
                $price = trim($_POST['price']);
                $category = trim($_POST['category']);
                $img = "img/uploaded/" . $imageName;

                $isValid = $bouquet->isValidBouquet($pname, $description, $price, $category);

                if ($isValid) {
                    $isSuccess = $bouquet->addBouquet($pname, $description, $price, $category, $img);
                }
            }
        }


    }
    ?>
</head>
<body>
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <h2></h2>
        </div>

        <div class='col-md-6'>
            <!--Form-->
            <form method='post' action='' enctype="multipart/form-data">

                <h1>Product Toevoegen</h1>
                <?php
                // Display Error message
                if (!empty($isSuccess)) {
                    ?>
                    <div class="alert alert-info">
                        <?= $isSuccess ?>
                    </div>

                    <?php
                }
                ?>

                <div class="form-group mb-2">

                    <input type="text" class="form-control" name="pname" id="pname" required="required" maxlength="80"
                           placeholder="naam">
                </div>
                <div class="form-group mb-2">

                    <input type="text" class="form-control" name="description" id="description" required="required"
                           maxlength="80" placeholder="omschrijving">
                </div>
                <div class="form-group mb-2">

                    <input type="number" class="form-control" name="price" id="price" required="required" maxlength="80"
                           placeholder="prijs">
                </div>

                <select class="form-select mb-3" name="category">
                    <?php
                    foreach ($all_categories as $category) {
                        ?>
                        <option value="<?= $category->idCategorie ?>"><?= $category->Categorie ?></option>
                        <?php
                    }
                    ?>
                </select>

                <div class="form-group mb-2">

                    <input type="file" name="fileToUpload" id="fileToUpload" formaction="upload.php">
                </div>
                <button style="background-color: #c45832;" type="submit" value="Upload Image" name="btnsignup"
                        class="btn btn-primary mt-2 border-0">Submit
                </button>
            </form>
        </div>


    </div>
</div>
</body>
</html>

<?php
include("../public/layout/footer.php");
?>
