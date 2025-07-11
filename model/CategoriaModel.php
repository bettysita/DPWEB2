<?php
require_once("../library/conexion.php");

class CategoriaModel {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function registrar($nombre, $detalle) {
        $sql = "INSERT INTO categoria (nombre, detalle) VALUES ('$nombre', '$detalle')";
        $ejecutar = $this->conexion->query($sql);
        return $ejecutar ? $this->conexion->insert_id : 0;
    }

    public function existeCategoria($nombre) {
        $sql = "SELECT * FROM categoria WHERE nombre = '$nombre'";
        $consulta = $this->conexion->query($sql);
        return $consulta->num_rows;
    }
}
