<?php
require_once("../model/CategoriaModel.php");

$objCategoria = new CategoriaModel();
<<<<<<< HEAD

$tipo = $_GET['tipo'];
=======
<<<<<<< HEAD

$tipo = $_GET['tipo'];

if ($tipo == "ver_categorias") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $categorias = $objCategoria->verCategorias();
    if (count($categorias)) {
        $respuesta = array('status' => true, 'msg' => '', 'data' => $categorias);
    }
    echo json_encode($respuesta);
}

=======

$tipo = $_GET['tipo'];
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
if ($tipo == "registrar") {
    //print_r($_POST);
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];

    if ($nombre == "" || $detalle == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
<<<<<<< HEAD
        //validacion si existe categoria con el mismo nombre
        $existeCategoria = $objCategoria->existeCategoria($nombre);
        if ($existeCategoria > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error, nombre de categoria ya existe');
        } else {

            $respuesta = $objCategoria->registrar($nombre, $detalle);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'Registrado correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error, fallo en registro');
=======
<<<<<<< HEAD
        //validacion si existe persona con el mismo dni
        $existeCategoria = $objCategoria->existeCategoria($nombre);
        if ($existeCategoria > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error, categoria ya existe');
        } else {
            $respuesta = $objCategoria->registrar($nombre, $detalle);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'Registrado Correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error, falló en registro');
=======
        //validacion si existe categoria con el mismo nombre
        $existeCategoria = $objCategoria->existeCategoria($nombre);
        if ($existeCategoria > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error, nombre de categoria ya existe');
        } else {

            $respuesta = $objCategoria->registrar($nombre, $detalle);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'Registrado correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error, fallo en registro');
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
            }
        }
    }
    echo json_encode($arrResponse);
}
<<<<<<< HEAD

if ($tipo == "mostrar_categorias") {
   $categorias = $objCategoria->mostrarCategorias();
   $respuesta = array();
   if (!empty($categorias)) {
    $respuesta = array('status' => true, 'msg' => 'Categorias encontradas', 'data' => $categorias);
   }else {
    $respuesta = array('status' => false, 'msg' => 'No ahy categorias registradas', 'data' => array());
   }
   header('Content-Type: application/json');
   echo json_encode($respuesta);
=======
<<<<<<< HEAD
if ($tipo == "ver") {
    //print_r($_POST);
    $respuesta = array('status' => false, 'msg' => '');
    $id_categoria = $_POST['id_categoria'];
    $categoria = $objCategoria->ver($id_categoria);
    if ($categoria) {
        $respuesta['status'] = true;
        $respuesta['data'] = $categoria;
    } else {
        $respuesta['msg'] = 'Error, categoria no existe';
    }
    echo json_encode($respuesta);
}
if ($tipo == "actualizar") {
    //print_r($_POST);
    $id_cat = $_POST['id_categoria'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    if ($id_cat == "" || $nombre == "" || $detalle == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        $existeID = $objCategoria->ver($id_cat);
        if (!$existeID) {
            //devolver mensaje
            $arrResponse = array('status' => false, 'msg' => 'Error, categoria no existe en BD');
            echo json_encode($arrResponse);
            // cerrar funcion
            exit;
        } else {
            // actualizar
            $actualizar = $objCategoria->actualizar($id_cat, $nombre, $detalle);
            if ($actualizar) {
                $arrResponse = array('status' => true, 'msg'=>"Actualizado correctamente");
            }else {
                $arrResponse = array('status' => false, 'msg'=>$actualizar);
=======

if ($tipo == "mostrar_categorias") {
    $categorias = $objCategoria->mostrarCategorias();
    $respuesta = array('status' => true, 'msg' => '', 'data' => $categorias);
    header('Content-Type: application/json');
    echo json_encode($respuesta);
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
}

if ($tipo == "ver") {
    $respuesta = array('status' => false, 'msg' => '');
    $id_categoria = $_POST['id_categoria'];
    $categoria = $objCategoria->ver($id_categoria);
    if($categoria){
        $respuesta ['status'] = true;
        $respuesta ['data'] = $categoria;
    }else {
        $respuesta['msg'] = "Error, categoria no existe";
    }
    echo json_encode($respuesta);
}

<<<<<<< HEAD
if ($tipo == "obtener_categoria") {
    header('Content-Type: application/json');
    $id = $_GET['id'];
    $modelo = new CategoriaModel();
    $categoria = $modelo->obtenerCategoriaPorId($id);
    echo json_encode($categoria);
    exit;
}
=======
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f

if ($tipo == "actualizar") {
    $id_categoria = $_POST['id_categoria'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];

    if ($id_categoria == "" || $nombre == "" || $detalle == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    }else {
        $existeID = $objCategoria->ver($id_categoria);
        if(!$existeID){
            $arrResponse = array('status' =>false, 'msg' => 'Error, categoria no existe');
            echo json_encode($arrResponse);
            exit; 
        }else {
            $actualizar = $objCategoria->actualizar($id_categoria, $nombre, $detalle);
            if($actualizar){
                $arrResponse = array('status' => true, 'msg' => 'Actualizado correctamente');
                
            }else {
                $arrResponse = array('status' => false, 'msg' => $actualizar);  
<<<<<<< HEAD
=======
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
            }
            echo json_encode($arrResponse);
            exit;
        }
    }
}
<<<<<<< HEAD
=======
<<<<<<< HEAD
if ($tipo == "eliminar") {
    //print_r($_POST);
    $id_categoria = $_POST['id_categoria'];
    $respuesta = array('status' => false, 'msg' => '');
    $resultado = $objCategoria->eliminar($id_categoria);
    if ($resultado) {
        $respuesta = array('status' => true, 'msg' => 'Eliminado Correctamente');
    }else {
        $respuesta = array('status' => false, 'msg' => $resultado);
    }
    echo json_encode($respuesta);
}
=======
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f

if($tipo == "eliminar"){
    $id_categoria = $_POST['id_categoria'];
    if($id_categoria == ""){
        $arrResponse = array('status' => false, 'msg' => 'Error, id vacio');
    }else{
        $eliminar = $objCategoria->eliminar($id_categoria);
        if ($eliminar) {
            $arrResponse = array('status' => true, 'msg' => 'Categoria eliminada');
        }else{
            $arrResponse = array('status' => false, 'msg' => 'Error al eliminar categoria');
        }
        echo json_encode($arrResponse);
        exit;
    }
<<<<<<< HEAD
}
=======
}


>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
