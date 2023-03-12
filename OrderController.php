<?php

require_once './database.php';

class OrderController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get($id){

        $query = $this->db->pdo->query('SELECT * FROM orders WHERE user_id = '.$id);
        return $query->fetchAll();
    }   

    public function all()
    {
        $query = $this->db->pdo->query('SELECT * FROM orders');
        return $query->fetchAll();
    }

    public function store($request)
    {
        var_dump($request);

        $products = $request['number'].'x'.$request['product_id'];
        $total = $request['number'] * $request['price'];

        $query = $this->db->pdo->query('INSERT INTO orders (user_id, products, total) VALUES ("'.$request['user_id'].'", "'.$products.'", "'.$total.'")');

        return header('Location: ./index.php');
    }

    public function destroy($id)
    {

        $query = $this->db->pdo->prepare('DELETE FROM orders WHERE id = :id');
        $query->execute(['id' => $id]);

        return header('Location: ./index.php');
    }
}