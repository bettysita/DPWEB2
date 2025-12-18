<?php
require_once("../model/VentaModel.php");
require_once("../model/ProductoModel.php");

$objProducto = new ProductoModel();
$objVenta = new VentaModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrarTemporal") {
    $id_producto = $_POST['id_producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $b_producto = $objVenta->buscarTemporal($id_producto);
    if ($b_producto) {
        $nueva_cantidad = $b_producto->cantidad + $cantidad;
        $objVenta->actualizarCantidadTemporal($id_producto, $nueva_cantidad);
        $respuesta = array('status' => true, 'msg' => 'actualizado');
    }else {
        $registro = $objVenta->registrar_temporal($id_producto, $precio, $cantidad);
        $respuesta = array('status' => true, 'msg' => 'registrado');
    }
    echo json_encode($respuesta);
}

if ($tipo == "listarTemporales") {
    $temporales = $objVenta->buscarTemporales();
    $arrTemp = array();
    if (count($temporales) >= 0) {
        foreach ($temporales as $temp) {
            $producto = $objProducto->ver($temp->id_producto);
            $temp->producto = ($producto) ? $producto->nombre : "Producto no encontrado";
            $temp->subtotal = $temp->precio * $temp->cantidad;
            array_push($arrTemp, $temp);
        }
        usort($arrTemp, function($a, $b) {
            return strcasecmp($a->producto, $b->producto);
        });
        $respuesta = array('status' => true, 'data' => $arrTemp);
    } else {
        $respuesta = array('status' => false, 'msg' => 'Error al listar temporales');
    }
    echo json_encode($respuesta);
}

if ($tipo == "eliminarTemporal") {
    $id = $_POST['id'];
    $eliminar = $objVenta->eliminarTemporal($id);
    if ($eliminar) {
        $respuesta = array('status' => true, 'msg' => 'eliminado');
    } else {
        $respuesta = array('status' => false, 'msg' => 'Error al eliminar');
    }
    echo json_encode($respuesta);
}

if ($tipo == "actualizarCantidadTemporalPorId") {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $actualizar = $objVenta->actualizarCantidadTemporalPorId($id, $cantidad);
    if ($actualizar) {
        $respuesta = array('status' => true, 'msg' => 'cantidad actualizada');
    } else {
        $respuesta = array('status' => false, 'msg' => 'Error al actualizar');
    }
    echo json_encode($respuesta);
}

if ($tipo == "registrarVenta") {
    session_start();
    $id_cliente = $_POST['id_cliente'] ?? '';
    $fecha_venta = $_POST['fecha_venta'] ?? date('Y-m-d H:i:s');
    $id_vendedor = $_SESSION['ventas_id'] ?? 1;
    
    $temporales = $objVenta->buscarTemporales();
    if (count($temporales) > 0 && !empty($id_cliente)) {
        // Generate correlativo
        $ultima_venta = $objVenta->buscar_ultima_venta();
        $correlativo = $ultima_venta ? ($ultima_venta->codigo + 1) : 1;
        // Insert into venta table
        $id_venta = $objVenta->registrar_venta($id_cliente, $fecha_venta, $id_vendedor, $correlativo);
        if ($id_venta > 0) {
            // Insert details
            $total = 0;
            foreach ($temporales as $temp) {
                $objVenta->registrar_detalle_venta($id_venta, $temp->id_producto, $temp->cantidad, $temp->precio);
                $total += $temp->precio * $temp->cantidad;
            }
            // Clear temporals
            $objVenta->eliminarTemporales();
            $respuesta = array('status' => true, 'msg' => 'Venta registrada con éxito', 'codigo' => $correlativo, 'total' => $total);
        } else {
            $respuesta = array('status' => false, 'msg' => 'Error al registrar venta en base de datos');
        }
    } else {
        $respuesta = array('status' => false, 'msg' => 'No hay productos en el carrito o cliente no seleccionado');
    }
    echo json_encode($respuesta);
}

if ($tipo == "buscarVentasPorDni") {
    $dni = $_POST['dni'] ?? '';
    if (!empty($dni)) {
        $ventas = $objVenta->buscarVentasPorDniCliente($dni);
        $respuesta = array('status' => true, 'data' => $ventas);
    } else {
        $respuesta = array('status' => false, 'msg' => 'DNI no proporcionado');
    }
    echo json_encode($respuesta);
}
