<?php
    require_once("autoload.php");

    class Formatos extends Conexion{
        
        private $strNombre;
        private $strDescripcion;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertFormatos(string $nombre, string $descripcion){
            $this->strNombre = $nombre;
            $this->strDescripcion = $descripcion;

            $sql = "INSERT INTO formatos(nombre, descripcion) VALUES(?, ?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->strNombre, $this->strDescripcion);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

        public function getFormatos(){
            $sql = "SELECT * FROM formatos ORDER BY idFormatos DESC";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateFormato(int $id, string $nombre, string $descripcion){
            $this->strNombre = $nombre;
            $this->strDescripcion = $descripcion;
            $sql = "UPDATE formatos SET nombre = ?, descripcion = ? WHERE idFormatos = $id";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->strNombre, $this->strDescripcion);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getFormato(int $id){
            $sql = "SELECT * FROM formatos WHERE idFormatos = ?";
            $arrWhere = array($id);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delFormato(int $id){
            $sql = "DELETE FROM formatos WHERE idFormatos = ?";
            $arrWhere = array($id);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>