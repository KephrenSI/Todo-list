<?php
namespace Models;

class AuthModel extends Model{
    private $model = null;

    public function __construct()
    {
        $this -> model = new Model();
    }

    public function checkUser($email, $password)
    {
        $pdo = $this->model->connectDB();
        if ($pdo) {
            $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
            try {
                $pdoSt = $pdo->prepare($sql);
                $pdoSt -> execute([
                    ':email' => $email,
                    ':password' => $password
                ]);
                return $pdoSt->fetch();
            }catch (PDOException $e) {
                return '';
            }
        } else {
            die('Quelque chose a posé problème lors de l’enregistrement');
        }
    }
}

