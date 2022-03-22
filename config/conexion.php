<?php

session_start();

class Conectar{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $pdo;

    public function __construct(){
        $this->host     = 'localhost';
        $this->db       = 'TZapata';
        $this->user     = 'root';
        $this->password = "";
        $this->charset  = 'utf8mb4';
    }

    protected function conexion(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

                $this->pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $this->pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
            die();
        }
    }


    public function ruta(){
      return "192.168.1.70S";
    }

}
