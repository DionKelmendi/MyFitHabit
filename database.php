<?php

class Database
{
    public $pdo;

    public function __construct()
    {
        try{
            $link = new PDO('mysql:host=localhost;dbname=myfithabit', 'root', '');
            $this->pdo = $link;
        }catch(PDOException $e) {
            die('DIE'. $e->getMessage());
        }
    }
}
