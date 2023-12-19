<?php

    class Conexion{
        private $host = "localhost";
        private $puerto = 3307;
        private $user = "root";
        private $password = "";
        private $db = "bdbibliotecanes";
        private PDO $conect;

        public function __construct(){
            $connectionString = "mysql:host=" . $this->host . ";port=" . $this->puerto . ";dbname=" . $this->db . ";charset=utf8";
            try {
                $this->conect = new PDO($connectionString, $this->user, $this->password);
                $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "Conexion establecida...<br>";
            } catch (Exception $e) {
                $this->conect = 'Error de conexion';
                echo "ERROR: " . $e->getMessage();
            }
        }

        public function connect(): ?PDO
        {
            return $this->conect;
        }

    }

?>

