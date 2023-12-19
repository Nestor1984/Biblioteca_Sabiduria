<?php
    require_once("autoload.php");

    class Prestamos extends Conexion{
        
        private $fechaDePres;
        private $plazo;
        private $idUsu;
        private $idBibli;
        private $idEjem;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertPrestamos(string $fechaPres, string $plazo, int $idUsu, int $idBibli, int $idEjem){
            $this->fechaDePres = $fechaPres;
            $this->plazo = $plazo;
            $this->idUsu = $idUsu;
            $this->idBibli = $idBibli;
            $this->idEjem = $idEjem;

            $sql = "INSERT INTO Prestamos(fechaDePrestamo, plazo, idUsuario, idBibliotecario, idEjemplar) VALUES(?, ?, ?, ?, ?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->fechaDePres, $this->plazo, $this->idUsu, $this->idBibli, $this->idEjem);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

        public function getPrestamos(){
            $sql = "SELECT p.idPrestamo, p.fechaDePrestamo, e.idEjemplar, l.titulo, u.nombres FROM Prestamos p INNER JOIN Ejemplares e ON e.idEjemplar = p.idEjemplar INNER JOIN libros l ON e.idLibro = l.idLibro INNER JOIN Usuarios U ON p.idUsuario = u.idUsuarios ORDER BY p.idPrestamo DESC";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updatePrestamos(int $id, string $fechaPres, string $plazo, int $idUsu, int $idBibli, int $idEjem){
            $this->fechaDePres = $fechaPres;
            $this->plazo = $plazo;
            $this->idUsu = $idUsu;
            $this->idBibli = $idBibli;
            $this->idEjem = $idEjem;

            $sql = "UPDATE Prestamos SET fechaDePrestamo = ?, plazo = ?, idUsuario = ?, idBibliotecario = ?, idEjemplar = ? WHERE idPrestamo = $id";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->fechaDePres, $this->plazo, $this->idUsu, $this->idBibli, $this->idEjem);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getPrestamo(int $id){
            $sql = "SELECT * FROM Prestamos WHERE idPrestamo = ?";
            $arrWhere = array($id);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delPrestamo(int $id){
            $sql = "DELETE FROM Prestamos WHERE idPrestamo = ?";
            $arrWhere = array($id);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>