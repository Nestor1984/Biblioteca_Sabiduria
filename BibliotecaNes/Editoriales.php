<?php
    require_once("autoload.php");

    class Editoriales extends Conexion{
        
        private $nombre;
        private $pais;
        private $ciudad;
        private $telefono;
        private $anioFundacion;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertEditoriales(string $nombre, string $pais, string $ciudad, string $telefono, string $anioFundacion){
            $this->nombre = $nombre;
            $this->pais = $pais;
            $this->ciudad = $ciudad;
            $this->telefono = $telefono;
            $this->anioFundacion = $anioFundacion;

            $sql = "INSERT INTO Editoriales(nombre, pais, ciudad, telefono, anioFundacion) VALUES(?,?,?,?,?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->nombre, $this->pais, $this->ciudad, $this->telefono, $this->anioFundacion);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

        public function getEditoriales(){
            $sql = "SELECT * FROM Editoriales ORDER BY idEditorial DESC";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateEditorial(int $id, string $nombre, string $pais, string $ciudad, string $telefono, string $anioFundacion){
            $this->nombre = $nombre;
            $this->pais = $pais;
            $this->ciudad = $ciudad;
            $this->telefono = $telefono;
            $this->anioFundacion = $anioFundacion;

            $sql = "UPDATE Editoriales SET nombre = ?, pais = ?, ciudad = ?, telefono = ?, anioFundacion = ? WHERE idEditorial = $id";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->nombre, $this->pais, $this->ciudad, $this->telefono, $this->anioFundacion);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getEditorial(int $id){
            $sql = "SELECT * FROM Editoriales WHERE idEditorial = ?";
            $arrWhere = array($id);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delEditorial(int $id){
            $sql = "DELETE FROM Editoriales WHERE idEditorial = ?";
            $arrWhere = array($id);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>