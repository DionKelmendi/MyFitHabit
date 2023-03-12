<?php

require_once './database.php';

class ProductController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get($id){

        $query = $this->db->pdo->query('SELECT * FROM products WHERE id = '.$id);
        return $query->fetch();
    }   

    public function find($string){

        $query = $this->db->pdo->query('SELECT * FROM products WHERE name LIKE "%'.$string.'%"');
        return $query->fetchAll();
    } 

    public function sortPrice($order)
    {
        $query = $this->db->pdo->query('SELECT * FROM products ORDER BY price '.$order);
        return $query->fetchAll();
    }

    public function sortName($order)
    {
        $query = $this->db->pdo->query('SELECT * FROM products ORDER BY name '.$order);
        return $query->fetchAll();
    }

    public function all()
    {
        $query = $this->db->pdo->query('SELECT * FROM products');
        return $query->fetchAll();
    }

    public function store($request)
    {

        if ( empty($request['name']) || empty($request['description']) || empty($request['price']) || $request['price'] < 0) {
            echo 'Values are empty';
            die();
        }

        $imgLink = $_FILES["img"]["name"];
        
        $query = $this->db->pdo->query('INSERT INTO products (name, description, img, price) VALUES ("'.$request['name'].'", "'.$request['description'].'", "'.$imgLink.'", "'.$request['price'].'")');
        $this->storeImg();

        return header('Location: ./menu.php?t=products');
    }

    public function storeImg(){

        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["img"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }

        return;
    }

    public function edit($id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    public function update($request)
    {

        if ($request['img']) {
            
            $query = $this->db->pdo->query('UPDATE products SET name = "'.$request['name'].'", description = "'.$request['description'].'", img = "'.$request['img'].'", price = "'.$request['price'].'" WHERE id = "'.$request['id'].'" ');
        } else{

            $query = $this->db->pdo->query('UPDATE products SET name = "'.$request['name'].'", description = "'.$request['description'].'", price = "'.$request['price'].'" WHERE id = "'.$request['id'].'" ');
        }


        return header('Location: ./menu.php?t=products');
    }

    public function destroy($id)
    {
        $imgQuery = $this->db->pdo->query('SELECT img FROM products WHERE id = '.$id);
        $img = $imgQuery->fetch();
        $query = $this->db->pdo->prepare('DELETE FROM products WHERE id = :id');
        $query->execute(['id' => $id]);
        
        unlink('images/'.$img[0]);
        return header('Location: ./index.php');
    }
}
