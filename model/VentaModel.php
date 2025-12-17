<?php
require_once("../library/conexion.php");
class VentaModel
{
    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registrar_temporal($id_producto, $precio, $cantidad)
    {
        $consulta = "INSERT INTO temporal_venta (id_producto, precio, cantidad) VALUES ('$id_producto', '$precio', '$cantidad')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            return $this->conexion->insert_id;
        }
        return 0;
    }
    public function actualizarCantidadTemporal($id_producto, $cantidad)
    {
        $consulta = "UPDATE temporal_venta SET cantidad='$cantidad' WHERE id_producto='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    public function actualizarCantidadTemporalPorId($id, $cantidad)
    {
        $consulta = "UPDATE temporal_venta SET cantidad='$cantidad' WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    public function buscarTemporales()
    {
        $arr_temporal = array();
        $consulta = "SELECT * FROM temporal_venta";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_temporal, $objeto);
        }
        return $arr_temporal;
    }
    public function buscarTemporal($id_producto)
    {
        $consulta = "SELECT * FROM temporal_venta WHERE id_producto='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }
    public function eliminarTemporal($id)
    {
        $consulta = "DELETE FROM temporal_venta WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    public function eliminarTemporales()
    {
        $consulta = "DELETE FROM temporal_venta";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    //---------------------- VENTAS REGISTRADAS (OFICIALES)----------------
    public function buscar_ultima_venta(){
        $consulta = "SELECT codigo FROM venta ORDER BY id DESC LIMIT 1";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }
    public function registrar_venta($id_cliente, $fecha_venta, $id_vendedor, $correlativo){
        $consulta = "INSERT INTO venta (codigo, id_cliente, fecha_hora, id_vendedor) VALUES ('$correlativo', '$id_cliente', '$fecha_venta', '$id_vendedor')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            return $this->conexion->insert_id;
        }
        return 0;
    }

    public function registrar_detalle_venta($id_venta, $id_producto, $cantidad, $precio){
        $consulta = "INSERT INTO venta_detalle (id_venta, id_producto, cantidad, precio) VALUES ('$id_venta', '$id_producto', '$cantidad', '$precio')";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    public function buscarVentasPorDniCliente($dni){
        $arr_ventas = array();
        $consulta = "SELECT v.id, v.codigo, v.fecha_hora, p.razon_social, p.nro_identidad FROM venta v INNER JOIN persona p ON v.id_cliente = p.id WHERE p.nro_identidad = '$dni'";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_ventas, $objeto);
        }
        return $arr_ventas;
    }











}

