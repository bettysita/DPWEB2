<?php
require_once("../model/VentaModel.php");
require_once("../model/ProductoModel.php");

$objProducto = new ProductoModel();
$objVenta = new VentaModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrarTemporal") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $id_producto = $_POST['id_producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $b_producto = $objVenta->buscarTemporal($id_producto);
    if ($b_producto) {
        $objVenta->actualizarCantidadTemporal($id_producto, $cantidad);
        $respuesta = array('status' => true, 'msg' => 'actualizado');
    }else {
        $registro = $objVenta->registrar_temporal($id_producto, $precio, $cantidad);
        $respuesta = array('status' => true, 'msg' => 'registrado');
    }
    echo json_encode($respuesta);
}

if ($tipo == "listarTemporales") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $temporales = $objVenta->buscarTemporales();
    $arrTemp = array();
    if (count($temporales)) {
        foreach ($temporales as $temp) {
            $producto = $objProducto->ver($temp->id_producto);
            $temp->producto = $producto->nombre;
            $temp->subtotal = $temp->precio * $temp->cantidad;
            array_push($arrTemp, $temp);
        }
        usort($arrTemp, function($a, $b) {
            return strcasecmp($a->producto, $b->producto);
        });
        $respuesta = array('status' => true, 'msg' => '', 'data' => $arrTemp);
    }
    echo json_encode($respuesta);
}

if ($tipo == "eliminarTemporal") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $id = $_POST['id'];
    $eliminar = $objVenta->eliminarTemporal($id);
    if ($eliminar) {
        $respuesta = array('status' => true, 'msg' => 'eliminado');
    }
    echo json_encode($respuesta);
}

if ($tipo == "actualizarCantidadTemporalPorId") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $actualizar = $objVenta->actualizarCantidadTemporalPorId($id, $cantidad);
    if ($actualizar) {
        $respuesta = array('status' => true, 'msg' => 'cantidad actualizada');
    }
    echo json_encode($respuesta);
}

if ($tipo == "registrarVenta") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    // Assuming user id from session, but for now hardcoded or get from post
    $id_usuario = 1; // TODO: get from session
    $temporales = $objVenta->buscarTemporales();
    if (count($temporales) > 0) {
        $total = 0;
        foreach ($temporales as $temp) {
            $total += $temp->precio * $temp->cantidad;
        }
        // Insert into venta table, assuming table exists
        // For now, just clear temporals
        $objVenta->eliminarTemporales();
        $respuesta = array('status' => true, 'msg' => 'venta registrada', 'total' => $total);
    }
    echo json_encode($respuesta);
}
