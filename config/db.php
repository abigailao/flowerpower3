<?php

class db
{

    private $connection;

    function getConnection()
    {
//db currently not the right one
        $dsn = "mysql:host=localhost;dbname=flowerpower";
        $user = "root";
        $passwd = "1111";

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