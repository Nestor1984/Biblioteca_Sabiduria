<?php
    require_once("autoload.php");

    class Devoluciones extends Conexion{
        
        private $fechaDevo;
        private $estado;
        private $multa;
        private $idPres;
        private $comen;
        private $idBibli;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertDevoluciones(string $fechaDevo, string $estado, float $multa, int $idPres, string $comen, int $idBibli){
            $this->fechaDevo = $fechaDevo;
            $this->estado = $estado;
            $this->multa = $multa;
            $this->idPres = $idPres;
            $this->comen = $comen;
            $this->idBibli = $idBibli;

            $sql = "INSERT INTO Devolucion(fechaDevolucion, estado, multa, idPrestamo, comentarios, idBibliotecario) VALUES(?, ?, ?, ?, ?, ?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->fechaDevo, $this->estado, $this->multa, $this->idPres, $this->comen, $this->idBibli);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

        public function getDevoluciones(){
            $sql = "SELECT d.idDevolucion, d.fechaDevolucion, d.estado, d.multa, p.idPrestamo FROM Devolucion d INNER JOIN prestamos p ON d.idPrestamo = p.idPrestamo ORDER BY d.idDevolucion DESC";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateDevoluciones(int $id, string $fechaDevo, string $estado, float $multa, int $idPres, string $comen, int $idBibli){
            $this->fechaDevo = $fechaDevo;
            $this->estado = $estado;
            $this->multa = $multa;
            $this->idPres = $idPres;
            $this->comen = $comen;
            $this->idBibli = $idBibli;
            
            $sql = "UPDATE Devolucion SET fechaDevolucion = ?, estado = ?, multa = ?, idPrestamo = ?, comentarios = ?, idBibliotecario = ? WHERE idDevolucion = $id";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->fechaDevo, $this->estado, $this->multa, $this->idPres, $this->comen, $this->idBibli);
            $resExecute = $update->execute($arrData);
            return $resExecute;
        }

        public function getDevolucion(int $id){
            $sql = "SELECT * FROM Devolucion WHERE idDevolucion = ?";
            $arrWhere = array($id);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delDevolucion(int $id){
            $sql = "DELETE FROM Devolucion WHERE idDevolucion = ?";
            $arrWhere = array($id);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
        
    }
?>