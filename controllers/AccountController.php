<?php

require_once("../config/db.php");

class accountController
{
    public $connection;

    public function __construct()
    {
        $db = new db();
        $this->connection = $db->getConnection();
    }

    public function getBouquets()
    {
        $stm = $this->connection->query("SELECT * from klant");
        $accounts = $stm->fetchAll(PDO::FETCH_OBJ);

        return $accounts;
    }

    public function editAccount()
    {

    }

    public function addAccount($voornaam,$tussenvoegsel,$achternaam,$adres,$huisnummer,$postcode,$plaats,$email,$telefoon
        ,$wachtwoord)
    {
        try {
            $insertSQL = "INSERT INTO klant(voornaam,tussenvoegsel,achternaam,adres,huisnummer,postcode,plaats,email
,telefoon,wachtwoord ) values(:voornaam,:tussenvoegsel,:achternaam,:adres,:huisnummer,:postcode,:plaats,:email,:telefoon
,:wachtwoord)";
            $stmt = $this->connection->prepare($insertSQL);

            $stmt->bindParam("voornaam", $voornaam);
            $stmt->bindParam("tussenvoegsel", $tussenvoegsel);
            $stmt->bindParam("achternaam", $achternaam);
            $stmt->bindParam("adres", $adres);
            $stmt->bindParam("huisnummer", $huisnummer);
            $stmt->bindParam("postcode", $postcode);
            $stmt->bindParam("plaats", $plaats);
            $stmt->bindParam("email", $email);
            $stmt->bindParam("telefoon", $telefoon);
            $stmt->bindParam("wachtwoord", $wachtwoord);


            $stmt->execute();

            $success = "Is gelukt! joh!";

        }catch (Exception $e){
            $success = "Is niet gelukt, joh";
        }

        return $success;
    }

    public function isValidAccount($voornaam,$achternaam,$adres,$huisnummer,$postcode,$plaats,$email,$telefoon
        ,$wachtwoord)
    {
        $isValid = true;

        // Check fields are empty or not
        if($voornaam == '' || $achternaam == '' || $adres == '' || $huisnummer == '' || $postcode == '' || $plaats == ''
            || $email == '' || $telefoon == '' || $wachtwoord == ''){
            $isValid = true;
//            $error_message = "Please fill all fields.";
        }



        // Check if Email-ID is valid or not
        if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $error_message = "Invalid Email-ID.";
        }

        return $isValid;
    }


    public function getAccounts()
    {
        $stm = $this->connection->query("SELECT * from klant");
        $accounts = $stm->fetchAll(PDO::FETCH_OBJ);

        return $accounts;
    }

    public function getCustomer($id)
    {
        $sql = "SELECT * from klant WHERE idKlant=:id";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam("id", $id);



        $stmt->execute();

        $accounts = $stmt->fetch(PDO::FETCH_OBJ);


        return $accounts;
    }

    public function updateCustomer($id, $fname, $prefix, $lname,$address,$housenumber, $zipcode, $city, $phone, $email)
    {
        $sql = "UPDATE klant SET 
        voornaam = :fname, 
        tussenvoegsel = :prefix, 
        achternaam = :lname, 
        adres = :address, 
        huisnummer = :housenumber ,
        postcode = :zipcode ,
        plaats = :city ,
        telefoon = :phone ,
        email = :email 
        WHERE idKlant = :id";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam("id", $id, PDO::PARAM_STR);
        $stmt->bindParam("fname", $fname, PDO::PARAM_STR);
        $stmt->bindParam("prefix", $prefix, PDO::PARAM_STR);
        $stmt->bindParam("lname", $lname, PDO::PARAM_STR);
        $stmt->bindParam("address", $address, PDO::PARAM_STR);
        $stmt->bindParam("housenumber", $housenumber, PDO::PARAM_STR);
        $stmt->bindParam("zipcode", $zipcode, PDO::PARAM_STR);
        $stmt->bindParam("city", $city, PDO::PARAM_STR);
        $stmt->bindParam("phone", $phone, PDO::PARAM_STR);
        $stmt->bindParam("email", $email, PDO::PARAM_STR);

        $stmt->execute();

        header("Location: https://www.savatarian.com/abigail/public/klantAccount.php");
    }

}