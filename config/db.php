<?php

class db
{

    private $connection;

    function getConnection()
    {
//db currently not the right one
        $dsn = "mysql:host=localhost;dbname=deb7255_abigail";
        $user = "deb7255_abigail";
        $passwd = "0ranjeGro3nP@ars";

        try {
            $this->connection = new PDO($dsn, $user, $passwd);

        } catch(PDOException $e) {
            echo "<pre>";
            print_r($e->getMessage());
            exit;
            echo "Error: " . $e->getMessage();
        }

        $conn = null;

        return $this->connection;

        // test github

    }
}