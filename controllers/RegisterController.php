<?php

require_once("../config/db.php");

class registerController
{
    public $connection;

    public function __construct()
    {
        $db = new db();
        $this->connection = $db->getConnection();
    }



    public function isUserValid($fname, $lname, $email, $password, $confirmpassword)
    {
        $isValid = true;

        // Check fields are empty or not
        if ($fname == '' || $lname == '' || $email == '' || $password == '' || $confirmpassword == '') {
            $isValid = false;
            $error_message = "Please fill all fields.";
        }

        // Check if confirm password matching or not
        if ($isValid && ($password != $confirmpassword)) {
            $isValid = false;
            $error_message = "Confirm password not matching.";
        }

        // Check if Email-ID is valid or not
        if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $error_message = "Invalid Email-ID.";
        }

        return $isValid;
    }

    public function registerUser($fname, $lname, $email, $password)
    {

//        $password = sha1("$password");

        try {

//            $insertSQL = "INSERT INTO klant(voornaam,achternaam,email,wachtwoord, role_id ) values(:fname,:lname,:email,:password, 2)";
            $insertSQL = "INSERT INTO klant(voornaam,achternaam,email,wachtwoord ) values(:fname,:lname,:email,:password)";
            $stmt = $this->connection->prepare($insertSQL);
            $stmt->bindParam("fname", $fname);
            $stmt->bindParam("lname", $lname);
            $stmt->bindParam("email", $email);
            $stmt->bindParam("password", $password);
            $stmt->execute();

            $success = true;

        } catch (Exception $e) {
            $success = false;
        }

        return $success;

    }

    public function ifUserExists($email)
    {
        $stmt = $this->connection->prepare("SELECT * FROM klant WHERE email = :email");

        $stmt->bindParam("email", $email);
        $stmt->execute();

        $count = $stmt->rowCount();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($count > 0) {
            $userExists = true;
        } else {
            $userExists = false;
        }

        return $userExists;
    }

    //MEDEWERKER
    public function registerEmployee($fname, $lname, $email, $password)
    {
        try {

//            $insertSQL = "INSERT INTO medewerker(voornaam,achternaam,email,wachtwoord, role_id) values(:fname,:lname,:email,:password, 3)";
            $insertSQL = "INSERT INTO medewerker(voornaam,achternaam,email,wachtwoord ) values(:fname,:lname,:email,:password)";

            $stmt = $this->connection->prepare($insertSQL);
            $stmt->bindParam("fname", $fname);
            $stmt->bindParam("lname", $lname);
            $stmt->bindParam("email", $email);
            $stmt->bindParam("password", $password);
            $stmt->execute();

            $success = true;

        } catch (Exception $e) {
            $success = false;
        }

        return $success;

    }

    public function ifEmployeeExists($email)
    {
        $stmt = $this->connection->prepare("SELECT * FROM medewerker WHERE email = :email");

        $stmt->bindParam("email", $email);
        $stmt->execute();

        $count = $stmt->rowCount();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($count > 0) {
            $userExists = true;
        } else {
            $userExists = false;
        }

        return $userExists;
    }
}