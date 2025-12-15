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
    $id_cliente = $_POST['id_cliente'];
    $fecha_venta = $_POST['fecha_venta'];
    $id_vendedor = 1; // TODO: get from session
    $temporales = $objVenta->buscarTemporales();
    if (count($temporales) > 0 && !empty($id_cliente)) {
        // Generate correlativo
        $ultima_venta = $objVenta->buscar_ultima_venta();
        $correlativo = $ultima_venta ? $ultima_venta->codigo + 1 : 1;
        // Insert into venta table
        $id_venta = $objVenta->registrar_venta($id_cliente, $fecha_venta, $id_vendedor, $correlativo);
        if ($id_venta > 0) {
            // Insert details
            foreach ($temporales as $temp) {
                $objVenta->registrar_detalle_venta($id_venta, $temp->id_producto, $temp->cantidad, $temp->precio);
            }
            // Calculate total
            $total = 0;
            foreach ($temporales as $temp) {
                $total += $temp->precio * $temp->cantidad;
            }
            // Clear temporals
            $objVenta->eliminarTemporales();
            $respuesta = array('status' => true, 'msg' => 'venta registrada', 'codigo' => $correlativo, 'total' => $total);
        } else {
            $respuesta = array('status' => false, 'msg' => 'error al registrar venta');
        }
    } else {
        $respuesta = array('status' => false, 'msg' => 'no hay productos o cliente no seleccionado');
    }
    echo json_encode($respuesta);
}
