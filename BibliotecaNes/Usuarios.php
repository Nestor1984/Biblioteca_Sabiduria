<?php
    require_once("autoload.php");

    class Usuarios extends Conexion{
        
        private $nombres;
        private $apellidos;
        private $ci;
        private $direccion;
        private $telefono;
        private $email;
        private $genero;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertUsuarios(string $nombres, string $apellidos, string $ci, string $direccion, string $telefono, string $email, string $genero){
            $this->nombres = $nombres;
            $this->apellidos = $apellidos;
            $this->ci = $ci;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->email = $email;
            $this->genero = $genero;

            $sql = "INSERT INTO usuarios(nombres, apellidos, ci, direccion, telefono, email, genero) VALUES(?,?,?,?,?,?,?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->nombres, $this->apellidos, $this->ci, $this->direccion, $this->telefono, $this->email, $this->genero);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

        public function getUsuarios(){
            $sql = "SELECT * FROM usuarios ORDER BY idUsuarios DESC";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateUsuario(int $id, string $nombres, string $apellidos, string $ci, string $direccion, string $telefono, string $email, string $genero){
            $this->nombres = $nombres;
            $this->apellidos = $apellidos;
            $this->ci = $ci;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->email = $email;
            $this->genero = $genero;

            $sql = "UPDATE Usuarios SET nombres = ?, apellidos = ?, ci = ?, direccion = ?, telefono = ?, email = ?, genero = ? WHERE idUsuarios = $id";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->nombres, $this->apellidos, $this->ci, $this->direccion, $this->telefono, $this->email, $this->genero);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getUsuario(int $id){
            $sql = "SELECT * FROM Usuarios WHERE idUsuarios = ?";
            $arrWhere = array($id);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delUsuario(int $id){
            $sql = "DELETE FROM Usuarios WHERE idUsuarios = ?";
            $arrWhere = array($id);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>