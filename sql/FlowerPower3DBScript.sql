-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 14 jun 2021 om 15:34
-- Serverversie: 10.4.18-MariaDB-log-cll-lve
-- PHP-versie: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deb7255_abigail`
--
CREATE DATABASE IF NOT EXISTS `deb7255_abigail` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `deb7255_abigail`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `idBestelling` int(11) NOT NULL,
  `Datum` datetime NOT NULL,
  `idWinkel` int(11) NOT NULL,
  `Klant_idKlant` int(11) NOT NULL,
  `Medewerker_idMedewerker` int(11) NOT NULL,
  `BestellingStatus_idBestellingStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingstatus`
--

CREATE TABLE `bestellingstatus` (
  `idBestellingStatus` int(11) NOT NULL,
  `BestellingStatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling_has_product`
--

CREATE TABLE `bestelling_has_product` (
  `Bestelling_idBestelling` int(11) NOT NULL,
  `Product_idProduct` int(11) NOT NULL,
  `Aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `Categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `Categorie`) VALUES
(1, 'Bruiloft'),
(2, 'Kantoor'),
(3, 'Rouwbloemen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `idKlant` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(45) DEFAULT NULL,
  `achternaam` varchar(255) DEFAULT NULL,
  `adres` varchar(254) DEFAULT NULL,
  `huisnummer` varchar(10) DEFAULT NULL,
  `postcode` varchar(6) DEFAULT NULL,
  `plaats` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefoon` varchar(10) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`idKlant`, `voornaam`, `tussenvoegsel`, `achternaam`, `adres`, `huisnummer`, `postcode`, `plaats`, `email`, `telefoon`, `wachtwoord`, `role_id`) VALUES
(14, 'Jann', '', 'Alleman', 'Kipperstraat', '27', '4222BF', 'Groningen', 'jann@example.nl', '0645667787', 'jann', 2),
(18, 'Bart', NULL, 'Barter', 'Bartsmitstraat', '89', '4343WW', 'Soest', 'bart@example.nl', NULL, 'bart', 2),
(19, 'Bram', NULL, 'Vlies', NULL, NULL, NULL, NULL, 'bram@live.nl', NULL, 'bram', 2),
(20, 'Piet', NULL, 'de Vries', NULL, NULL, NULL, NULL, 'pdevries@roc-dev.com', NULL, '95sCv9ey64zD', NULL),
(21, 'Bloem', NULL, 'Plant', NULL, NULL, NULL, NULL, 'bloem@example.nl', NULL, 'bloem', NULL),
(22, 'Plant', NULL, 'Bloemer', NULL, NULL, NULL, NULL, 'plant@example.nl', NULL, 'plant', NULL),
(23, 'Test', NULL, 'Testbloem', NULL, NULL, NULL, NULL, 'test@example.nl', NULL, 'test', NULL),
(24, 'Aardbei', NULL, 'Vlies', NULL, NULL, NULL, NULL, 'aardbei@example.nl', NULL, 'aardbei', NULL),
(25, 'Bam', NULL, 'Bambam', NULL, NULL, NULL, NULL, 'bam@example.nl', NULL, 'bam', NULL),
(26, 'Gast', NULL, 'Gast', NULL, NULL, NULL, NULL, 'gast@example.nl', NULL, 'gast', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerker`
--

CREATE TABLE `medewerker` (
  `idMedewerker` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(30) DEFAULT NULL,
  `achternaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `medewerker`
--

INSERT INTO `medewerker` (`idMedewerker`, `voornaam`, `tussenvoegsel`, `achternaam`, `wachtwoord`, `email`, `role_id`) VALUES
(5, 'Jan', NULL, 'Alleman', 'jan', 'jan@flowerpower.nl', 3),
(6, 'Blauw', NULL, 'Wolk', 'blauw', 'blauw@flowerpower.nl', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `naam` varchar(45) DEFAULT NULL,
  `omschrijving` varchar(254) DEFAULT NULL,
  `prijs` decimal(5,2) DEFAULT NULL,
  `categorie_idCategorie` int(11) NOT NULL,
  `img_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`idProduct`, `naam`, `omschrijving`, `prijs`, `categorie_idCategorie`, `img_url`) VALUES
(26, 'Bamboe Plantje', 'Een kleine bamboe plant!', '18.00', 2, 'img/uploaded/1617822170.png'),
(28, 'Zomer Bruid', 'Voor een bijzondere Zomerse dag!', '81.00', 1, 'img/uploaded/1622503185.png'),
(29, 'Lily van de Vallei', 'Een sprookjesachtig boeket!', '50.00', 1, 'img/uploaded/1622503244.png'),
(30, 'Mini Cactus', 'Een kleine cactus voor op het bureau', '18.00', 2, 'img/uploaded/1622503284.png'),
(31, 'Perennial', 'Een kleine plant voor op kantoor!', '22.00', 2, 'img/uploaded/1622503341.png'),
(32, 'Sansevieria', 'Prachtig voor op kantoor!', '35.00', 2, 'img/uploaded/1622503402.png'),
(33, 'Altijd en Rode Rozen', 'Een laatste eerbetoon aan een onsterferlijke geliefde', '90.00', 3, 'img/uploaded/1622504011.png'),
(34, 'Licht Hart Krans', 'Een ingetogen afscheid', '90.00', 3, 'img/uploaded/1622512019.png'),
(35, 'Rozen', 'Een uniek afscheid van een dierbare met een mooie eerbetoon', '88.00', 3, 'img/uploaded/1622512060.png'),
(36, 'Wit Paarse Krans', 'Een rustgevende afscheid van een dierbare met een mooie eerbetoon', '88.00', 3, 'img/uploaded/1622512099.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `role`
--

INSERT INTO `role` (`idRole`, `role`) VALUES
(1, 'admin'),
(2, 'klant'),
(3, 'medewerker');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkel`
--

CREATE TABLE `winkel` (
  `idWinkel` int(11) NOT NULL,
  `WinkelNaam` varchar(255) NOT NULL,
  `WinkelAdres` varchar(254) NOT NULL,
  `WinkelPostcode` varchar(6) NOT NULL,
  `WinkelPlaats` varchar(45) NOT NULL,
  `WinkelTelefoonnummer` varchar(10) NOT NULL,
  `WinkelEmail` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`idBestelling`,`Klant_idKlant`,`Medewerker_idMedewerker`),
  ADD UNIQUE KEY `idBestelling_UNIQUE` (`idBestelling`),
  ADD KEY `fk_factuur_winkel1_idx` (`idWinkel`),
  ADD KEY `fk_Bestelling_Klant1_idx` (`Klant_idKlant`),
  ADD KEY `fk_Bestelling_Medewerker1_idx` (`Medewerker_idMedewerker`),
  ADD KEY `fk_Bestelling_BestellingStatus1_idx` (`BestellingStatus_idBestellingStatus`);

--
-- Indexen voor tabel `bestellingstatus`
--
ALTER TABLE `bestellingstatus`
  ADD PRIMARY KEY (`idBestellingStatus`),
  ADD UNIQUE KEY `BestellingStatus_UNIQUE` (`BestellingStatus`),
  ADD UNIQUE KEY `idBestellingStatus_UNIQUE` (`idBestellingStatus`);

--
-- Indexen voor tabel `bestelling_has_product`
--
ALTER TABLE `bestelling_has_product`
  ADD PRIMARY KEY (`Bestelling_idBestelling`,`Product_idProduct`),
  ADD KEY `fk_Bestelling_has_Product_Product1_idx` (`Product_idProduct`),
  ADD KEY `fk_Bestelling_has_Product_Bestelling1_idx` (`Bestelling_idBestelling`);

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`),
  ADD UNIQUE KEY `idCategorie_UNIQUE` (`idCategorie`),
  ADD UNIQUE KEY `Categorie_UNIQUE` (`Categorie`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`idKlant`),
  ADD UNIQUE KEY `idklant_UNIQUE` (`idKlant`),
  ADD KEY `idRole` (`role_id`);

--
-- Indexen voor tabel `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`idMedewerker`),
  ADD UNIQUE KEY `idMedewerker_UNIQUE` (`idMedewerker`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD UNIQUE KEY `idProduct_UNIQUE` (`idProduct`),
  ADD KEY `fk_Product_Categorie1_idx` (`categorie_idCategorie`);

--
-- Indexen voor tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexen voor tabel `winkel`
--
ALTER TABLE `winkel`
  ADD PRIMARY KEY (`idWinkel`),
  ADD UNIQUE KEY `idWinkel_UNIQUE` (`idWinkel`),
  ADD UNIQUE KEY `WinkelNaam_UNIQUE` (`WinkelNaam`),
  ADD UNIQUE KEY `WinkelTelefoonnummer_UNIQUE` (`WinkelTelefoonnummer`),
  ADD UNIQUE KEY `WinkelEmail_UNIQUE` (`WinkelEmail`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `idBestelling` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `bestellingstatus`
--
ALTER TABLE `bestellingstatus`
  MODIFY `idBestellingStatus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `idKlant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT voor een tabel `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `idMedewerker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT voor een tabel `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `winkel`
--
ALTER TABLE `winkel`
  MODIFY `idWinkel` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `fk_Bestelling_BestellingStatus1` FOREIGN KEY (`BestellingStatus_idBestellingStatus`) REFERENCES `bestellingstatus` (`idBestellingStatus`),
  ADD CONSTRAINT `fk_Bestelling_Klant1` FOREIGN KEY (`Klant_idKlant`) REFERENCES `klant` (`idKlant`),
  ADD CONSTRAINT `fk_Bestelling_Medewerker1` FOREIGN KEY (`Medewerker_idMedewerker`) REFERENCES `medewerker` (`idMedewerker`),
  ADD CONSTRAINT `fk_factuur_winkel1` FOREIGN KEY (`idWinkel`) REFERENCES `winkel` (`idWinkel`);

--
-- Beperkingen voor tabel `bestelling_has_product`
--
ALTER TABLE `bestelling_has_product`
  ADD CONSTRAINT `fk_Bestelling_has_Product_Bestelling1` FOREIGN KEY (`Bestelling_idBestelling`) REFERENCES `bestelling` (`idBestelling`),
  ADD CONSTRAINT `fk_Bestelling_has_Product_Product1` FOREIGN KEY (`Product_idProduct`) REFERENCES `product` (`idProduct`);

--
-- Beperkingen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD CONSTRAINT `idRole` FOREIGN KEY (`role_id`) REFERENCES `role` (`idRole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `medewerker`
--
ALTER TABLE `medewerker`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`idRole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Categorie1` FOREIGN KEY (`categorie_idCategorie`) REFERENCES `categorie` (`idCategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
