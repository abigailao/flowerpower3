<?php
include "../public/layout/header.php";
include "../controllers/LoginController.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = new loginController();


    $uname = trim($_POST['uname']);
    $password = trim($_POST['password']);

    if ($uname != "" && $password != "") {
        $error = $login->loginEmployee($uname, $password);
    }
}



?>
    <html>
    <head>
        <title>Login</title>
        <!--        <link href="style.css" rel="stylesheet" type="text/css">-->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <div class="container">
        <form method="post">
            <h1>Log In Medewerker</h1>
            <?php
            // Display Error message
            if(!empty($error)){
                ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?= $error ?>
                </div>

                <?php
            }
            ?>
            <div class="form-group col-6">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">Deel je email nooit.</small>
            </div>
            <div class="form-group col-6">
                <label for="exampleInputPassword1">Wachtwoord</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button style="background-color: #c45832;" type="submit" class="btn btn-primary mt-2 border-0">Submit</button>
        </form>
    </div>
    </body>
    </html>

<?php
include("../public/layout/footer.php");
?>