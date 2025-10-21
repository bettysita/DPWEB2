<?php
require_once("../library/conexion.php");
<<<<<<< HEAD
class CategoriaModel
{
=======
class CategoriaModel{
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
<<<<<<< HEAD
    
    public function verCategorias()
    {
        $arr_categorias = array();
        $consulta = "SELECT * FROM categoria";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_categorias, $objeto);
        }
        return $arr_categorias;
    }
    public function existeCategoria($nombre)
    {
        $consulta = "SELECT * FROM categoria WHERE nombre='$nombre'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }
    public function registrar($nombre, $detalle)
    {
        $consulta = "INSERT INTO categoria (nombre,detalle) VALUES ('$nombre', '$detalle')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
=======
    public function registrar($nombre, $detalle) {
        $consulta = "INSERT INTO categoria (nombre, detalle) VALUE('$nombre', '$detalle')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            $sql = $this->conexion->insert_id;
        }else{
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
            $sql = 0;
        }
        return $sql;
    }
<<<<<<< HEAD
    public function ver($id)
    {
        $consulta = "SELECT * FROM categoria WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    public function actualizar($id_cat, $nombre, $detalle) {
        $consulta = "UPDATE categoria SET nombre='$nombre', detalle='$detalle' WHERE id='$id_cat'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
     public function eliminar($id){
        $consulta = "DELETE FROM categoria WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    
=======

    public function existeCategoria($nombre){
        $consulta = "SELECT * FROM categoria WHERE nombre='$nombre'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;

    }

    public function buscarCategoriaPorNombre($nombre){
        $consulta = "SELECT id, nombre FROM categoria WHERE nombre='$nombre' LIMIT 1";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    
    public function mostrarCategorias() {
        $arr_categorias = array();
        $consulta = "SELECT * FROM categoria";
        $sql = $this->conexion->query($consulta);
        if (!$sql) {
            error_log("Error en query(): " . $this->conexion->error);
            return $arr_categorias;
        }
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_categorias, $objeto);
        }
        return $arr_categorias;
    }
    

    public function ver($id){
        $consulta = "SELECT * FROM categoria WHERE id = '$id'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    public function actualizar($id_categoria, $nombre, $detalle){
        $consulta = "UPDATE categoria SET nombre='$nombre', detalle='$detalle' WHERE id= '$id_categoria'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    public function eliminar($id_categoria){
        $consulta = "DELETE FROM categoria WHERE id='$id_categoria'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
}