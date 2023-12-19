<?php
    require_once("autoload.php");

    class Autores extends Conexion{
        
        private $idAutor;
        private $nomApe;
        private $sitio;
        private $nacionalidad;
        private $anioNacimiento;
        private $anioFallecimiento;
        private $genero;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertAutores(string $nomApe, string $sitio, string $nacionalidad, string $anioNacimiento, string $anioFallecimiento, string $genero){
            $this->nomApe = $nomApe;
            $this->sitio = $sitio;
            $this->nacionalidad = $nacionalidad;
            $this->anioNacimiento = $anioNacimiento;
            $this->anioFallecimiento = $anioFallecimiento;
            $this->genero = $genero;

            $sql = "INSERT INTO Autores(nombresYApellidos, sitioWeb, nacionalidad, anioNacimiento, anioFallecimiento, genero) VALUES(?, ?, ?, ?, ?, ?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->nomApe, $this->sitio, $this->nacionalidad, $this->anioNacimiento, $this->anioFallecimiento, $this->genero);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

        public function getAutores(){
            $sql = "SELECT * FROM Autores ORDER BY idAutor DESC";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateAutores(int $idAutor, string $nomApe, string $sitio, string $nacionalidad, string $anioNacimiento, string $anioFallecimiento, string $genero){
            $this->idAutor = $idAutor;
            $this->nomApe = $nomApe;
            $this->sitio = $sitio;
            $this->nacionalidad = $nacionalidad;
            $this->anioNacimiento = $anioNacimiento;
            $this->anioFallecimiento = $anioFallecimiento;
            $this->genero = $genero;
            $sql = "UPDATE Autores SET idAutor = ?, nombresYApellidos = ?, sitioWeb = ?, nacionalidad = ?, anioNacimiento = ?, anioFallecimiento = ?, genero = ? WHERE idAutor = $idAutor";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->idAutor, $this->nomApe, $this->sitio, $this->nacionalidad, $this->anioNacimiento, $this->anioFallecimiento, $this->genero);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getAutor(int $idAutor){
            $sql = "SELECT * FROM Autores WHERE idAutor = ?";
            $arrWhere = array($idAutor);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delAutor(int $idAutor){
            $sql = "DELETE FROM Autores WHERE idAutor = ?";
            $arrWhere = array($idAutor);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>