<?php
include "layout/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>003</title>
    <style>
        .center {
            text-align:center;
        }
        .rood {
            border: red solid 5px;
        }
        .groen{
            border: green solid 5px;
        }
    </style>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<div class="container-sm">
<article class="all-002">
    <h1>Controlestructuren en loops</h1>
    <article class="bk-002">
        <h2>Voor deze opdracht heb je afbeeldingen nodig.
            Je kunt eigen afbeeldingen gebruiken of de afbeeldingen uit deze map.
            Laat met een for-loop zien hoe je met zo min mogelijk code toch 10 afbeeldingen kan tonen op het scherm.
        </h2>
        <p>
            <?php
            for($i = 1; $i<=9 ;$i++){
                echo "<img src='../img/binturongs/binturong".$i.".jpg'>";
            }
            ?></p>
    </article>
    <article class="bk-002">
        <h2>Doe hetzelfde, maar nu met een array met afbeeldingen.</h2>
        <p>
            <?php
            $wisterias = array("1","2","3","4","5");

            foreach ($wisterias as $wisteria){
                echo "<img src='../img/wisterias/wisteria".$wisteria.".jpg'>";
            }
            ?></p>
    </article>
    <article class="bk-002">
        <h2>While loop versie</h2>
        <p>
            <?php

            $i = 1;
            while($i<=5){
                echo "<img src='../img/wisterias/wisteria".$i.".jpg'>";
                $i++;
            }
            ?></p>
    </article>
    <article class="bk-002">
        <h2>Opdracht: Teken een kerstboom
            Je kunt ook een loop binnen een loop gebruiken. Dat heb je nodig bij deze opdracht.
            Teken onderstaande kerstboom m.b.v. loops.
        </h2>
        <p class="center">
            <?php
            for($i = 0; $i <=9; $i++){
                for($j = 0; $j <$i; $j++){
                    echo "*";
                }
                echo "*<br>";
            }
            ?></p>
    </article>
    <article class="bk-002">
        <h2>Opdracht: van while naar for-loop
            Maak van de code een for-loop:

            $x = 35;
            while ($x >= 25) {
            echo "hoppelepee";
            $x--;
            }
        </h2>
        <p>
            <?php
            for($x = 35; $x >= 25; $x--){
                echo "hoppelepee";
            }
            ?></p>
    </article>
    <article class="bk-002">
        <h2>Gebruik een loop (for of while) en een controlestructuur (if) om onderstaande pagina te maken…...</h2>
        <p class="center">
            <?php
            for($i = 1; $i<=9 ;$i++){
                if($i % 2 == 0){
                    $class = "class='rood'";
                } else {
                    $class = "class='groen'";
                }
                echo "<img ".$class."src='../img/binturongs/binturong".$i.".jpg'>";
            }
            ?></p>
    </article>
    <article class="bk-002">
        <h2>Gebruik een loop (for of while) en een controlestructuur (if) om onderstaande pagina te maken…...</h2>
        <p>
            <?php
            $leeftijd = 3;
            $bedrag = 10;
            if($leeftijd > 65){
                $bedrag = $bedrag * 0.5;
            }
            if($leeftijd < 3){
                $bedrag = $bedrag = 0;
            }
            if($leeftijd <= 12) {
                $bedrag = $bedrag * 0.5;
            }
            echo $bedrag;
            ?></p>
    </article>
    <article class="bk-002">
        <h2>Opdracht: Zwemclubs
            Het kampioenschap zwemmen voor jan en alleman gaat van start
            De organisator wil een website met daarop de zwemclubs met hun ledenaantal onder elkaar en
            voor iedere 5 zwemmers wordt er een plaatje van een zwemmer afgebeeld.
            Zet alle zwemclubs en hun ledenaantal in een array.
            Doorloop de array met een foreach en geef het correcte aantal plaatjes weer.
        </h2>
        <p>
            <?php
            $Zwemclubs['De spartelkuikens '] = 25;
            $Zwemclubs['De waterbuffels '] = 32;
            $Zwemclubs['Plonsmderin '] = 11;
            $Zwemclubs['Bommetje '] = 23;

            foreach ($Zwemclubs as $zwemclub => $aantal){
                echo "<br>".$zwemclub.$aantal;

                for ($i = 0; $i < floor($aantal/5); $i++){
                    echo "<img src='../img/zwemclubs.jpg'>";

                }
            }
            ?></p>
    </article>
</article>
</div>
</body>
</html>
