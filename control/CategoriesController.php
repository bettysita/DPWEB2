<?php
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
            $arrResponse = array('status' => true, 'msg' => 'Registro exitoso');
            $respuesta = $objCategoria->registrar($nombre, $detalle);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'Categoría registrada exitosamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error, fallo en el registro');
            }
        }
    }
    echo json_encode($arrResponse);
} elseif ($tipo == "ver_categorias") {
    $arr_categorias = $objCategoria->verCategorias();
    $arrResponse = array('status' => true, 'data' => $arr_categorias);
    echo json_encode($arrResponse);
} elseif ($tipo == "ver") {
    $id_categoria = $_POST['id_categoria'];
    $categoria = $objCategoria->ver($id_categoria);
    if ($categoria) {
        $arrResponse = array('status' => true, 'data' => $categoria);
    } else {
        $arrResponse = array('status' => false, 'msg' => 'Categoría no encontrada');
    }
    echo json_encode($arrResponse);
} elseif ($tipo == "actualizar") {
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
} elseif ($tipo == "eliminar") {
    $id_categoria = $_POST['id_categoria'];
    $respuesta = $objCategoria->eliminar($id_categoria);
    if ($respuesta) {
        $arrResponse = array('status' => true, 'msg' => 'Categoría eliminada exitosamente');
    } else {
        $arrResponse = array('status' => false, 'msg' => 'Error, fallo en la eliminación');
    }
    echo json_encode($arrResponse);
}
