<?php

require_once('../config/db.php');
class CategoryController
{
    public $connection;

    public function __construct()
    {
        $db = new db();
        $this->connection = $db->getConnection();
    }

    public function getCategories()
    {
        $stm = $this->connection->query("SELECT * from categorie");
        $categories = $stm->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }


}
