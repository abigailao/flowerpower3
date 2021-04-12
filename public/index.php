<?php
include "../public/layout/header.php";


//Bouquet controllers

require_once("../controllers/CartController.php");

$cart = new cartController();

if (isset($_REQUEST['addToCart'])) {
    session_start();

    $cart->addToCart($_REQUEST['id'], $_POST['product'], $_POST['amount']);
}

?>

<!--Header/banner-->
<body>

<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="2000">
            <img src="../img/flowerpower-banner1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1>Fl❁werP❁wer!</h1>
                <p>Faux bloemenwinkel</p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="../img/flowerpower-banner2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1>Fl❁werP❁wer!</h1>
                <p>Faux bloemenwinkel</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../img/flowerpower-banner3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1>Fl❁werP❁wer!</h1>
                <p>Faux bloemenwinkel</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!--Banner-->
<?php

  if (!isset($_SESSION['user_id'])) {
            ?>
      <a href="bouquets.php" ><div class="jumbotron p-3 rounded text-light mb-2 bg-warning">
              <h1 class="display-4">Welkom!</h1>
              <p class="lead">Bekijk onze collectie</p>

          </div></a>
            <?php
  } else {
      
      if ($_SESSION['role'] == "medewerker") {
          //all links for mederwerker
          ?>
          <a href="" ><div class="jumbotron p-3 rounded text-light mb-2 bg-success">
                  <h1 class="display-4">Personeel Portaal</h1>
              </div></a>
          <?php
      } elseif ($_SESSION['role'] == "admin"){
          //all links for admin
          ?>
          <a href="" ><div class="jumbotron p-3 rounded text-light mb-2 bg-danger">
                  <h1 class="display-4">Admin Portaal</h1>
              </div></a>
          <?php
      } else{
          //All links for gebruiker
          ?>
          <a href="bouquets.php" ><div class="jumbotron p-3 rounded text-light mb-2 bg-warning">
                  <h1 class="display-4">Welkom!</h1>
                  <p class="lead">Bekijk onze collectie</p>
              </div></a>
      <?php } } ?>


<?php
include "../public/layout/footer.php";
?>