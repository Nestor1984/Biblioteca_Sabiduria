<?php
    require_once("autoload.php");

    class Libros extends Conexion{
        
        private $titulo;
        private $cantPag;
        private $fechaPubli;
        private $descripcion;
        private $genero;
        private $idioma;
        private $isbn;
        private $idFormato;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertLibros(string $titulo, int $canPaginas, string $fechaPubli, string $descripcion, string $genero, string $idioma, string $isbn, int $idFormato){
            $this->titulo = $titulo;
            $this->cantPag = $canPaginas;
            $this->fechaPubli = $fechaPubli;
            $this->descripcion = $descripcion;
            $this->genero = $genero;
            $this->idioma = $idioma;
            $this->isbn = $isbn;
            $this->idFormato = $idFormato;

            $sql = "INSERT INTO libros(titulo, cantidadPaginas, fechaPublicacion, descripcion, genero, idioma, isbn, idFormato) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->titulo, $this->cantPag, $this->fechaPubli, $this->descripcion, $this->genero, $this->idioma, $this->isbn, $this->idFormato);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

        public function getLibros(){
            
          //$sql = "SELECT l.idLibro, l.titulo, l.cantidadPaginas, l.fechaPublicacion, l.descripcion, l.genero, l.idioma, l.isbn, l.idFormato, f.nombre FROM libros l INNER JOIN formatos f ON l.idFormato = f.idFormatos ORDER BY l.idLibro DESC";
          /*DELIMITER $$
            CREATE PROCEDURE `obtenerLibros`()
            BEGIN
            SELECT l.idLibro, l.titulo, l.cantidadPaginas, l.fechaPublicacion, l.descripcion, l.genero, l.idioma, l.isbn, l.idFormato, f.nombre FROM libros l INNER JOIN formatos f ON l.idFormato = f.idFormatos ORDER BY l.idLibro DESC;
            END$$
            DELIMITER ;
            */
            $sql = "CALL `obtenerLibros`();";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateLibros(int $id, string $titulo, int $canPaginas, string $fechaPubli, string $descripcion, string $genero, string $idioma, string $isbn, int $idFormato){
            $this->titulo = $titulo;
            $this->cantPag = $canPaginas;
            $this->fechaPubli = $fechaPubli;
            $this->descripcion = $descripcion;
            $this->genero = $genero;
            $this->idioma = $idioma;
            $this->isbn = $isbn;
            $this->idFormato = $idFormato;
            $sql = "UPDATE libros SET titulo = ?, cantidadPaginas = ?, fechaPublicacion = ?, descripcion = ?, genero = ?, idioma = ?, isbn = ?, idFormato = ? WHERE idLibro = $id";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->titulo, $this->cantPag, $this->fechaPubli, $this->descripcion, $this->genero, $this->idioma, $this->isbn, $this->idFormato);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getLibro(int $id){
            $sql = "SELECT * FROM libros WHERE idLibro = ?";
            $arrWhere = array($id);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delLibro(int $id){
            $sql = "DELETE FROM libros WHERE idLibro = ?";
            $arrWhere = array($id);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>