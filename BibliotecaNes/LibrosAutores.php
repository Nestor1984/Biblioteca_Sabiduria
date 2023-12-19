<?php
    require_once("autoload.php");

    class LibrosAutores extends Conexion{
        
        private int $idLibro;
        private int $idAutor;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertLibrosAutores(int $idLibro, int $idAutor){
            $this->idLibro = $idLibro;
            $this->idAutor = $idAutor;

            $sql = "INSERT INTO libros_autores(idLibro, idAutor) VALUES(?, ?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->idLibro, $this->idAutor);
            $resInsert = $insert->execute($arrData);
            return ($resInsert)? true: false;
        }

        public function getLibrosAutores(){
            $sql = "SELECT l_a.idLibro, l_a.idAutor, l.titulo, a.nombresYApellidos, a.sitioWeb FROM Libros_Autores l_a INNER JOIN libros l ON l_a.idLibro = l.idLibro INNER JOIN Autores a ON l_a.idAutor = a.idAutor ORDER BY l_a.idLibro DESC";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateLibrosAutores(int $idLibro, int $idAutor){
            $this->idLibro = $idLibro;
            $this->idAutor = $idAutor;
            $sql = "UPDATE Libros_Autores SET idLibro = ?, idAutor = ? WHERE idLibro = $idLibro";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->idLibro, $this->idAutor);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getLibroAutor(int $idLibro){
            $sql = "SELECT * FROM libros_autores WHERE idLibro = ?";
            $arrWhere = array($idLibro);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delLibroAutor(int $idLibro){
            $sql = "DELETE FROM libros_autores WHERE idLibro = ?";
            $arrWhere = array($idLibro);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>