<?php

require_once("../config/db.php");


class loginController
{
    public $connection;

    public function __construct()
    {
        $db = new db();
        $this->connection = $db->getConnection();
    }

    public function loginUser($email, $password)
    {
        $password = sha1("$password");

        // Check if Email-ID already exists
        $stmt = $this->connection->prepare("SELECT * FROM klant WHERE email = :email and wachtwoord = :password");

        $stmt->bindParam("email", $email);
        $stmt->bindParam("password", $password);
        $stmt->execute();

        $count = $stmt->rowCount();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if($count == 1 && !empty($user)) {

            $_SESSION['user_id'] = $user['idKlant'];
//            $_SESSION['role'] = $user['role_id'];
            $_SESSION['role'] = "gebruiker";
            $_SESSION['user_name'] = $user['voornaam'];
            $_SESSION['user_lastname'] = $user['tussenvoegsel'] . " " . $user['achternaam'];
            $_SESSION['user_email'] = $user['email'];


            header("Location: index.php");
        } else {
            return $msg = "Invalid username and password!";
        }

    }

//KLANTACCOUNT
    public function getKlantAccount()
    {
        $stm = $this->connection->query("SELECT * from klant where idKlant");
        $category1 = $stm->fetchAll(PDO::FETCH_OBJ);

        return $category1;
    }

//MEDEWERKER
    public function loginEmployee($email, $password)
    {
//        $password = sha1("$password");

        // Check if Email-ID already exists
        $stmt = $this->connection->prepare("SELECT * FROM medewerker WHERE email = :email and wachtwoord = :password");

        $stmt->bindParam("email", $email);
        $stmt->bindParam("password", $password);
        $stmt->execute();

        $count = $stmt->rowCount();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if($count == 1 && !empty($user)) {

            $_SESSION['user_id'] = $user['idMedewerker'];
//            $_SESSION['role'] = $user['role_id'];
            $_SESSION['role'] = "medewerker";
            $_SESSION['user_name'] = $user['voornaam'];
            $_SESSION['user_lastname'] = $user['tussenvoegsel'] . " " . $user['achternaam'];
            $_SESSION['user_email'] = $user['email'];


            header("Location: ../public/index.php");
        } else {
            return $msg = "Invalid username and password!";
        }

    }
//ADMIN
    public function loginAdmin($email, $password)
    {
        // Check if Email-ID already exists
        $stmt = $this->connection->prepare("SELECT * FROM admin WHERE email = :email and wachtwoord = :password");

        $stmt->bindParam("email", $email);
        $stmt->bindParam("password", $password);
        $stmt->execute();

        $count = $stmt->rowCount();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if($count == 1 && !empty($user)) {

            $_SESSION['user_id'] = $user['idAdmin'];
            $_SESSION['role'] = "admin";
            $_SESSION['user_email'] = $user['email'];


            header("Location: ../public/index.php");
        } else {
            return $msg = "Invalid username and password!";
        }

    }

}