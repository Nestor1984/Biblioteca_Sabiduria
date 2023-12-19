<?php
    require_once("autoload.php");

    class Ejemplares extends Conexion{
        
        private $idLibro;
        private $estado;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertEjemplares(int $idLibro, string $estado){
            $this->idLibro = $idLibro;
            $this->estado = $estado;

            $sql = "INSERT INTO ejemplares(idLibro, estado) VALUES(?, ?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->idLibro, $this->estado);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

        public function getEjemplares(){
            //$sql = "SELECT e.idEjemplar, e.idLibro, e.estado, l.titulo FROM Ejemplares e INNER JOIN libros l ON e.idLibro = l.idLibro ORDER BY e.idEjemplar DESC";
            /*
            DELIMITER $$
            CREATE PROCEDURE `obtenerEjemplares`()
            BEGIN
            SELECT e.idEjemplar, e.idLibro, e.estado, l.titulo FROM Ejemplares e INNER JOIN libros l ON e.idLibro = l.idLibro ORDER BY e.idEjemplar DESC;         
            END$$
            DELIMITER ;
             */
            $sql = "CALL `obtenerEjemplares`();";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateEjemplares(int $id, int $idLibro, string $estado){
            $this->idLibro = $idLibro;
            $this->estado = $estado;
            $sql = "UPDATE ejemplares SET idLibro = ?, estado = ? WHERE idEjemplar = $id";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->idLibro, $this->estado);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getEjemplar(int $id){
            $sql = "SELECT * FROM ejemplares WHERE idEjemplar = ?";
            $arrWhere = array($id);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delEjemplar(int $id){
            $sql = "DELETE FROM ejemplares WHERE idEjemplar = ?";
            $arrWhere = array($id);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>