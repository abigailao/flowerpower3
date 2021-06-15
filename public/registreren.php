<?php
include "../public/layout/header.php";
include "../controllers/RegisterController.php";

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
                    <input type="text" class="form-control" name="fname" id="fname" required="required" maxlength="80" placeholder="Voornaam">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lname" id="lname" required="required" maxlength="80" placeholder="Achternaam">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" required="required" maxlength="80" placeholder="Email address">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" required="required" maxlength="80" placeholder="Wachtwoord">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required="required" maxlength="80" placeholder="Wachtwoord herhalen">
                </div>
                <button style="background-color: #c45832;" type="submit" class="btn btn-primary mt-2 border-0">Submit</button>
            </form>
        </div>


    </div>
</div>
</body>
</html>

<?php
include("../public/layout/footer.php");
?>






































<!--Original-->
<?php
//include("../public/layout/header.php");
//require_once "../config/db.php";
//
//   if (isset($_GET['error'])) { ?>
<!--   <p class="error">--><?php //echo $_GET['error']; ?><!--</p>-->
<!--    --><?php //} ?>
<!--    <label class="labForm">Username</label>-->
<!--    <input class="inputForm" type="email" name="uname" placeholder="Username"><br>-->
<!---->
<!--    <label class="labForm">Password</label>-->
<!--    <input class="inputForm" type="password" name="password" placeholder="Password"><br>-->
<!---->
<!--    <button class="btnForm" type="submit">Login</button><br>-->
<!--</form>-->
<!---->
<!---->
<!--<br>-->
<!--<section class="signup-form">-->
<!--    <h2>Sign Up</h2>-->
<!--    <div class="div-form">-->
<!--        <form action="signup.inc.php" method="post">-->
<!--            <input type="text" name="name" placeholder="Full name...">-->
<!--            <input type="text" name="email" placeholder="Email...">-->
<!--            <input type="text" name="uid" placeholder="Username...">-->
<!--            <input type="password" name="pwd" placeholder="Password...">-->
<!--            <input type="password" name="pwdrepeat" placeholder="Repeat password...">-->
<!--            <button type="submit" name="submit">Sign Up</button>-->
<!--        </form>-->
<!--    </div>-->
<!--</section>-->
<?php //include("layout/footer.php"); ?>
