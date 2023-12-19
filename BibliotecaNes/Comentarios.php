<?php
    require_once("autoload.php");

    class Comentarios extends Conexion{
        
        private $idLibro;
        private $valoracion;
        private $comentario;
        private $idUsuario;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertComentarios(int $idLibro, string $valoracion, string $comentario, int $idUsuario){
            $this->idLibro = $idLibro;
            $this->valoracion = $valoracion;
            $this->comentario = $comentario;
            $this->idUsuario = $idUsuario;

            $sql = "INSERT INTO ComentariosValoraciones(idLibro, valoracion, comentario, idUsuario) VALUES(?, ?, ?, ?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->idLibro, $this->valoracion, $this->comentario, $this->idUsuario);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

        public function getComentarios(){
            $sql = "SELECT cv.idComentarioValoracion, cv.idLibro, cv.valoracion, cv.comentario, cv.idUsuario, l.titulo, u.nombres FROM ComentariosValoraciones cv INNER JOIN libros l ON cv.idLibro = l.idLibro INNER JOIN Usuarios u ON cv.idUsuario = u.idUsuarios ORDER BY cv.idComentarioValoracion DESC";
            /*
            CREATE VIEW vistaComentarios
            AS
            SELECT cv.idComentarioValoracion, cv.idLibro, cv.valoracion, cv.comentario, cv.idUsuario, l.titulo, u.nombres FROM ComentariosValoraciones cv INNER JOIN libros l ON cv.idLibro = l.idLibro INNER JOIN Usuarios u ON cv.idUsuario = u.idUsuarios ORDER BY cv.idComentarioValoracion DESC;
            
            $sql = "SELECT * FROM vistaComentarios;";*/
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateComentarios(int $id, int $idLibro, string $valoracion, string $comentario, int $idUsuario){
            $this->idLibro = $idLibro;
            $this->valoracion = $valoracion;
            $this->comentario = $comentario;
            $this->idUsuario = $idUsuario;
            
            $sql = "UPDATE ComentariosValoraciones SET idLibro = ?, valoracion = ?, comentario = ?, idUsuario = ? WHERE idComentarioValoracion = $id";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->idLibro, $this->valoracion, $this->comentario, $this->idUsuario);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getComentario(int $id){
            $sql = "SELECT * FROM ComentariosValoraciones WHERE idComentarioValoracion = ?";
            $arrWhere = array($id);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delComentario(int $id){
            $sql = "DELETE FROM ComentariosValoraciones WHERE idComentarioValoracion = ?";
            $arrWhere = array($id);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>