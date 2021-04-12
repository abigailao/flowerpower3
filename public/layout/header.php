<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">

</head>
<body>
<!--Navigation bar-->
<nav class="navbar navbar-expand-lg navbar-dark p-2 mb-4">
    <a class="navbar-brand" href="../public/index.php">FlowerPower</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <?php
        //All links that are when you are NOT logged in
        if (!isset($_SESSION['user_id'])) {
            //TODO verander naar de pagina bijv:login_gebruiker.php
            ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Log in
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../public/login.php">Log in</a></li>
                        <li><a class="dropdown-item" href="../public/registreren.php">Registreren</a></li>

                    </ul>
                </li>
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="../public/bouquets.php">Boeketten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/bruiloft.php">Bruiloft</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/kantoor.php">Kantoor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/rouwbloemen.php">Rouwbloemen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Winkelwagen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/contact.php">contact</a>
                </li>
            </ul>
            <?php
        } else {

//            if (isset($_SESSION['role'])) {
//                if ($_SESSION['role'] == 3 || $_SESSION['role'] == 1) {
              if (isset($_SESSION['role'])) {
                  if ($_SESSION['role'] == "medewerker") {

            //all links for mederwerker
            ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../public/bouquetsLijst.php">Boeketten</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../public/productToevoegen.php">Producten Toevoegen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/productWijzigen.php">Producten Wijzigen</a>
                    </li>

                </ul>
                <?php
                }
//                if($_SESSION['role'] == 1 ){
                  elseif($_SESSION['role'] == "admin" ){
                    ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../public/bouquetsLijst.php">Boeketten</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../public/productToevoegen.php">Producten Toevoegen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../public/productWijzigen.php">Producten Wijzigen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../public/medewerkerBeheer.php">Medewerker Beheer</a>
                        </li>
                    </ul>
                    <?php
                } else{
                    //All links for gebruiker
                    ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../public/bruiloft.php">Bruiloft</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../public/kantoor.php">Kantoor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../public/rouwbloemen.php">Rouwbloemen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../klantAccount.php">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Winkelwagen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <?php
                }
            }
            //All links that are when you ARE logged in
            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../public/logout.php">Uitloggen</a>
                </li>
            </ul>
            <?php
        } ?>

    </div>
</nav>
<div class="container">










