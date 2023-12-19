<?php
    require_once("autoload.php");

    class Bibliotecarios extends Conexion{
        
        private $nombres;
        private $apellidos;
        private $direccion;
        private $email;
        private $telefono;
        private $genero;
        private $ci;
        private $turno;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertBibliotecarios(string $nombres, string $apellidos, string $direccion, string $email, string $telefono, string $genero, string $ci, string $turno){
            $this->nombres = $nombres;
            $this->apellidos = $apellidos;
            $this->direccion = $direccion;
            $this->email = $email;
            $this->telefono = $telefono;
            $this->genero = $genero;
            $this->ci = $ci;
            $this->turno = $turno;

            $sql = "INSERT INTO Bibliotecario(nombres, apellidos, direccion, email, telefono, genero, ci, turno) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->nombres, $this->apellidos, $this->direccion, $this->email, $this->telefono, $this->genero, $this->ci, $this->turno);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

        public function getBibliotecarios(){
            $sql = "SELECT * FROM Bibliotecario ORDER BY idBibliotecario DESC";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateBibliotecario(int $id, string $nombres, string $apellidos, string $direccion, string $email, string $telefono, string $genero, string $ci, string $turno){
            $this->nombres = $nombres;
            $this->apellidos = $apellidos;
            $this->direccion = $direccion;
            $this->email = $email;
            $this->telefono = $telefono;
            $this->genero = $genero;
            $this->ci = $ci;
            $this->turno = $turno;
            $sql = "UPDATE Bibliotecario SET nombres = ?, apellidos = ?, direccion = ?, email = ?, telefono = ?, genero = ?,  ci = ?, turno = ? WHERE idBibliotecario = $id";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->nombres, $this->apellidos, $this->direccion, $this->email, $this->telefono, $this->genero, $this->ci, $this->turno);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getBibliotecario(int $id){
            $sql = "SELECT * FROM Bibliotecario WHERE idBibliotecario = ?";
            $arrWhere = array($id);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delBibliotecario(int $id){
            $sql = "DELETE FROM Bibliotecario WHERE idBibliotecario = ?";
            $arrWhere = array($id);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>