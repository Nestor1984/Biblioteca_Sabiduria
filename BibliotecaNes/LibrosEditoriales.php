<?php
    require_once("autoload.php");

    class LibrosEditoriales extends Conexion{
        
        private int $idLibro;
        private int $idEditorial;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertLibrosEditoriales(int $idLibro, int $idEditorial){
            $this->idLibro = $idLibro;
            $this->idEditorial = $idEditorial;

            $sql = "INSERT INTO libros_editoriales(idLibro, idEditorial) VALUES(?, ?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->idLibro, $this->idEditorial);
            $resInsert = $insert->execute($arrData);
            return $resInsert;
        }

        public function getLibrosEditoriales(){
            $sql = "SELECT l_e.idLibro, l_e.idEditorial, l.titulo, e.nombre FROM Libros_Editoriales l_e INNER JOIN libros l ON l_e.idLibro = l.idLibro INNER JOIN Editoriales e ON l_e.idEditorial = e.idEditorial ORDER BY l_e.idLibro DESC";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateLibrosEditoriales(int $idLibro, int $idEditorial){
            $this->idLibro = $idLibro;
            $this->idEditorial = $idEditorial;
            $sql = "UPDATE Libros_Editoriales SET idLibro = ?, idEditorial = ? WHERE idLibro = $idLibro";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->idLibro, $this->idEditorial);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getLibroEditorial(int $idLibro){
            $sql = "SELECT * FROM libros_editoriales WHERE idLibro = ?";
            $arrWhere = array($idLibro);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delLibroEditorial(int $idLibro){
            $sql = "DELETE FROM libros_editoriales WHERE idLibro = ?";
            $arrWhere = array($idLibro);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>