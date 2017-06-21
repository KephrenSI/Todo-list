<?php
namespace Models;

class Model{
    public function connectDB(){
        $dbConfig = @parse_ini_file('db.ini');
        $dsn = sprintf(
            '%s:dbname=%s;dbhost=%s',
            $dbConfig['driver'],
            $dbConfig['dbname'],
            $dbConfig['host']
        );
        try{
            return new \PDO(
                $dsn,
                $dbConfig['username'],
                $dbConfig['password'],
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
                ]
            );
        }
        catch(\PDOException $e){
            return false;
        }
    }
}