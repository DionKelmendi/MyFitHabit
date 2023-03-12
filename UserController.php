<?php

require_once './database.php';

class UserController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get($id)
    {
        $query = $this->db->pdo->query('SELECT * FROM users WHERE id = "'.$id.'"');

        return $query->fetch();
    }

    public function all()
    {
        $query = $this->db->pdo->query('SELECT * FROM users');

        return $query->fetchAll();
    }

    public function store($request)
    {

        if (empty($request['firstname']) || empty($request['lastname']) || empty($request['email']) || empty($request['password'])) {
            echo 'Values are empty';
            die();
        }

        isset($request['role']) ? $role = "Admin" : $role = "User";
        $password = password_hash($request['password'], PASSWORD_DEFAULT);
        
        $duplicateCheck = $this->db->pdo->query('SELECT COUNT(id) FROM users WHERE email = "'.$request['email'].'"')->fetch();
        
        if ($duplicateCheck[0] > 0) {
          
          echo 'Email already exists <br>';
          return header('Location: ./register.php?error=true');
        } else{
          
          echo 'Email is `aight <br>';
        }

        $query = $this->db->pdo->query('INSERT INTO users (firstname, lastname, email, password, role) VALUES ("'.$request['firstname'].'", "'.$request['lastname'].'", "'.$request['email'].'", "'.$password.'", "'.$role.'")');

        if ($_SERVER['HTTP_REFERER'] == "http://localhost/MyFitHabit/register.php") {
            
            $query = $this->db->pdo->query('SELECT id, firstname, lastname, email, password, role FROM users WHERE email = "'.$request['email'].'"');
            $user = $query->fetch();
            
            $_SESSION['user_id'] = $user["id"];
            $_SESSION['firstname'] = $user["firstname"];
            $_SESSION['lastname'] = $user["lastname"];
            $_SESSION['email'] = $user["email"];
            $_SESSION['role'] = $user["role"];

            return header('Location: ./index.php');
        }

       return header('Location: ./menu.php?t=users');

    }

    public function edit($id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    public function update($request)
    {
        isset($request['role']) ? $role = "Admin" : $role = "User";

        $query = $this->db->pdo->query('UPDATE users SET firstname = "'.$request['firstName'].'", lastname = "'.$request['lastName'].'", email = "'.$request['email'].'", role = "'.$role.'" WHERE id = "'.$request['id'].'"');
        
        $passwordCheck = trim($request['password']);
        
        if (!($passwordCheck == "")) {
            
            $password = password_hash($request['password'], PASSWORD_DEFAULT);

            $query = $this->db->pdo->query('UPDATE users SET password = "'.$password.'" WHERE id = "'.$request['id'].'"');
        }

        if ($_SESSION['user_id'] == $request['id']) {

            $_SESSION['firstname'] = $request['firstName'];
            $_SESSION['lastname'] = $request['lastName'];
            $_SESSION['email'] = $request['email'];
        }

        return header('Location: ./menu.php?t=users');
    }

    public function destroy($id)
    {
        
        $query = $this->db->pdo->prepare('DELETE FROM users WHERE id = :id');
        $query->execute(['id' => $id]);

        if ($id == $_SESSION['user_id']) {
            header("Location: logout.php");
            die();
        }

        return header('Location: ./menu.php?t=users');
    }

    public function login($request)
    {
        $query = $this->db->pdo->query('SELECT id, firstname, lastname, email, password, role FROM users WHERE email = "'.$request['email'].'"');

        $user = $query->fetch();
        
        if(count($user) > 0 && password_verify($request['password'], $user['password']) ){

            session_destroy();
            session_start();

            $_SESSION['user_id'] = $user["id"];
            $_SESSION['firstname'] = $user["firstname"];
            $_SESSION['lastname'] = $user["lastname"];
            $_SESSION['email'] = $user["email"];
            $_SESSION['role'] = $user["role"];

            header("Location: index.php");
        }

    }
}
