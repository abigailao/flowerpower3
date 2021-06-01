<?php
include "../public/layout/header.php";
include "../controllers/RegisterController.php";
include "../controllers/AccountController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $register = new registerController();

    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['confirmpassword']);


    $isValid = $register->isUserValid($fname,$lname,$email,$password,$confirmpassword);

    if($isValid){
        $userExists = $register->ifUserExists($email);

        if (!$userExists){
            $isSucces = $register->registerUser($fname,$lname,$email,$password);
            if ($isSucces){
                $success_message = "Gebruiker is aangemaakt! Veel winkel plezier!";
            }else{
                $error_message = "Helaas! Deze gebruiker bestaat al!";
            }
        }else{
            $error_message = "Helaas! Deze gebruiker bestaat al!";
        }
    }


}

//dddd

?>
<!DOCTYPE html>
<html>
<head>
    <title>Klant Registreren</title>
</head>
<body>
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <h2></h2>
        </div>

        <div class='col-md-6' >
            <!--Form-->
            <form method='post' action=''>

                <h1>Registreren</h1>
                <?php
                // Display Error message
                if(!empty($error_message)){
                    ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> <?= $error_message ?>
                    </div>

                    <?php
                }
                ?>

                <?php
                // Display Success message
                if(!empty($success_message)){
                    ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?= $success_message ?>
                    </div>

                    <?php
                }
                ?>

                <div class="form-group">
                    <label for="fname">Voornaam</label>
                    <input type="text" class="form-control" name="fname" id="fname" required="required" maxlength="80" placeholder='<?= $fname ?>'>
                </div>
                <div class="form-group">
                    <label for="lname">Achternaam</label>
                    <input type="text" class="form-control" name="lname" id="lname" required="required" maxlength="80" placeholder="Achternaam">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" required="required" maxlength="80" placeholder="Email address">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input type="password" class="form-control" name="password" id="password" required="required" maxlength="80" placeholder="Wachtwoord">
                </div>
                <div class="form-group">
                    <label for="pwd">Wachtwoord herhalen</label>
                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required="required" maxlength="80" placeholder="Wachtwoord herhalen">
                </div>

                <!--                <button type="submit" name="btnsignup" class="btnForm">Submit</button>-->
                <button style="background-color: #c45832;" type="submit" class="btn btn-primary mt-2 border-0">Update</button>
            </form>
        </div>


    </div>
</div>
</body>
</html>

<?php
include("../public/layout/footer.php");
?>
