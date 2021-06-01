<?php

require_once('../config/db.php');

class bouquetController
{
    public $connection;

    public function __construct()
    {
        $db = new db();
        $this->connection = $db->getConnection();
    }

    public function getBouquets()
    {
        $stm = $this->connection->query("SELECT * from product");
        $bouquets = $stm->fetchAll(PDO::FETCH_OBJ);

        return $bouquets;
    }

    public function editBouquet($name, $description, $price, $category_id, $img_url, $product_id)
    {

        $insertSQL = "UPDATE product SET 
        naam = :naam, 
        omschrijving = :omschrijving, 
        prijs = :prijs, 
        categorie_idCategorie = :categorie, 
        img_url = :img 
        WHERE idProduct = :idProduct";
        $stmt = $this->connection->prepare($insertSQL);

        $stmt->bindParam("naam", $name, PDO::PARAM_STR);
        $stmt->bindParam("omschrijving", $description, PDO::PARAM_STR);
        $stmt->bindParam("prijs", $price, PDO::PARAM_STR);
        $stmt->bindParam("categorie", $category_id, PDO::PARAM_STR);
        $stmt->bindParam("img", $img_url, PDO::PARAM_STR);
        $stmt->bindParam("idProduct", $product_id, PDO::PARAM_STR);

        $stmt->execute();

        header("Location: https://www.savatarian.com/abigail/public/productWijzigen.php");

    }

    public function addBouquet($name,$description,$price,$category, $img)
    {
        try {

            $insertSQL = "INSERT INTO product(naam,omschrijving,prijs,categorie_idCategorie, img_url) values(:naam,:omschrijving,:prijs,:categorie, :img)";
            $stmt = $this->connection->prepare($insertSQL);

            $stmt->bindParam("naam", $name);
            $stmt->bindParam("omschrijving", $description);
            $stmt->bindParam("prijs", $price);
            $stmt->bindParam("categorie", $category);
            $stmt->bindParam("img", $img);

            $stmt->execute();

            $success = "Het product is toegevoegd!";

        }catch (Exception $e){
            $success = "Het product is niet toegevoegd";
        }

        return $success;
    }

    public function isValidBouquet($pname,$description,$price,$category)
    {
        $isValid = true;

        // Check fields are empty or not
        if($pname == '' || $description == '' || $price == '' || $category == ''){
            $isValid = false;
            $error_message = "Please fill all fields.";
        }



        // Check if category-ID is valid or not
        if ($isValid && !filter_var($category, FILTER_VALIDATE_INT)) {
            $isValid = false;
            $error_message = "Invalid Category-ID.";
        }

        return $isValid;
    }

    public function isBouquetImageValid($target_dir, $target_file, $imageFileType, $check)
    {
        $isValid = true;

        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $isValid = true;
        } else {
            echo "File is not an image.";
            $isValid = false;
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $isValid = false;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $isValid = false;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $isValid = false;
        }

        return $isValid;
    }

    public function addImage()
    {
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../img/uploaded/" . $newfilename)) {
            return $newfilename;
        } else {
            return false;
        }


    }

    public function getCategory1()
    {
        $stm = $this->connection->query("SELECT * from product where categorie_idCategorie = 1");
        $category1 = $stm->fetchAll(PDO::FETCH_OBJ);

        return $category1;
    }

    public function getCategory2()
    {
        $stm = $this->connection->query("SELECT * from product where categorie_idCategorie = 2");
        $category2 = $stm->fetchAll(PDO::FETCH_OBJ);

        return $category2;
    }

    public function getCategory3()
    {
        $stm = $this->connection->query("SELECT * from product where categorie_idCategorie = 3");
        $category3 = $stm->fetchAll(PDO::FETCH_OBJ);

        return $category3;
    }

    public function deleteBouquet($id)
    {

        try {

            $insertSQL = "DELETE FROM product WHERE idProduct=:id";
            $stmt = $this->connection->prepare($insertSQL);

            $stmt->bindParam("id", $id);


            $stmt->execute();


            $success = true;

            header("Location: https://www.savatarian.com/abigail/public/productWijzigen.php");

        }catch (Exception $e){

            $success = false;
        }


        return $success;

    }

}