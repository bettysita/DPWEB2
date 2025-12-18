<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

require_once("../model/CategoriaModel.php");
$objCategoria = new CategoriaModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];

    if ($nombre == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, el nombre de la categoría es obligatorio');
    } else {
        $existeCategoria = $objCategoria->existeCategoria($nombre);
        if ($existeCategoria > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error, la categoría ya existe');
        } else {
            $respuesta = $objCategoria->registrar($nombre, $detalle);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'Categoría registrada exitosamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error, fallo en el registro');
            }
        }
    }
    echo json_encode($arrResponse);
} 

if ($tipo == "ver_categorias") {
    $datos = $objCategoria->verCategorias();
    if (count($datos) >= 0) {
        $arrResponse = array('status' => true, 'data' => $datos);
    } else {
        $arrResponse = array('status' => false, 'msg' => 'Error al cargar categorías');
    }
    echo json_encode($arrResponse);
} 

if ($tipo == "ver") {
    $id_categoria = $_POST['id_categoria'];
    $categoria = $objCategoria->ver($id_categoria);
    if ($categoria) {
        $arrResponse = array('status' => true, 'data' => $categoria);
    } else {
        $arrResponse = array('status' => false, 'msg' => 'Categoría no encontrada');
    }
    echo json_encode($arrResponse);
} 

if ($tipo == "actualizar") {
    $id_categoria = $_POST['id_categoria'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];

    if ($nombre == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, el nombre de la categoría es obligatorio');
    } else {
        $respuesta = $objCategoria->actualizar($id_categoria, $nombre, $detalle);
        if ($respuesta) {
            $arrResponse = array('status' => true, 'msg' => 'Categoría actualizada exitosamente');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error, fallo en la actualización');
        }
    }
    echo json_encode($arrResponse);
} 

if ($tipo == "eliminar") {
    $id_categoria = $_POST['id_categoria'];
    $respuesta = $objCategoria->eliminar($id_categoria);
    if ($respuesta) {
        $arrResponse = array('status' => true, 'msg' => 'Categoría eliminada exitosamente');
    } else {
        $arrResponse = array('status' => false, 'msg' => 'Error, fallo en la eliminación');
    }
    echo json_encode($arrResponse);
}