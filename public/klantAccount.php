<?php
include "../public/layout/header.php";
include "../controllers/AccountController.php";


$account = new AccountController();

$klant = $account->getCustomer($_SESSION['user_id']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = trim($_POST['fname']);
    $prefix = trim($_POST['tussenvoegsel']);
    $lname = trim($_POST['lname']);
    $address = trim($_POST['address']);
    $housenumber = trim($_POST['housenumber']);
    $zipcode = trim($_POST['zipcode']);
    $city = trim($_POST['city']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $id = trim($_POST['id']);

    $account->updateCustomer($id, $fname, $prefix, $lname, $address, $housenumber, $zipcode, $city, $phone, $email);

}

//dddd

?>
<body>
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <h2></h2>
        </div>

        <div class='col-md-6'>
            <!--Form-->
            <form method='post' action=''>

                <h1>Account</h1>
                <?php
                // Display Error message
                if (!empty($error_message)) {
                    ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> <?= $error_message ?>
                    </div>

                    <?php
                }
                ?>

                <?php
                // Display Success message
                if (!empty($success_message)) {
                    ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?= $success_message ?>
                    </div>

                    <?php
                }

                if (!empty($klant)) {
                    ?>
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" required="required" value="<?= $klant->idKlant ?>">
                    </div>
                    <div class="form-group">
                        <label for="fname">Voornaam</label>
                        <input type="text" class="form-control" name="fname" id="fname" required="required"
                               maxlength="80" value="<?= $klant->voornaam ?>">
                    </div>
                    <div class="form-group">
                        <label for="tussenvoegsel">Tussenvoegsel</label>
                        <input type="text" class="form-control" name="tussenvoegsel" id="tussenvoegsel"
                                maxlength="80" value="<?= $klant->tussenvoegsel ?>">
                    </div>
                    <div class="form-group">
                        <label for="lname">Achternaam</label>
                        <input type="text" class="form-control" name="lname" id="lname" required="required"
                               maxlength="80" value="<?= $klant->achternaam ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" required="required"
                               maxlength="80" value="<?= $klant->email ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">adres</label>
                        <input type="text" class="form-control" name="address" id="address"
                               maxlength="80" value="<?= $klant->adres ?>">
                    </div>
                    <div class="form-group">
                        <label for="housenumber">huisnummer</label>
                        <input type="number" class="form-control" name="housenumber" id="housenumber"
                                maxlength="80" value="<?= $klant->huisnummer ?>">
                    </div>
                    <div class="form-group">
                        <label for="zipcode">postcode</label>
                        <input type="text" class="form-control" name="zipcode" id="zipcode"
                               maxlength="80" value="<?= $klant->postcode ?>">
                    </div>
                    <div class="form-group">
                        <label for="city">plaats</label>
                        <input type="text" class="form-control" name="city" id="city"  maxlength="80"
                               value="<?= $klant->plaats ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">telefoon</label>
                        <input type="number" class="form-control" name="phone" id="phone"
                               maxlength="80" value="<?= $klant->telefoon ?>">
                    </div>

                    <?php
                }
                ?>
                <button style="background-color: #c45832;" type="submit" class="btn btn-primary mt-2 border-0">Update
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
