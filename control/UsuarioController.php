<?php
require_once("../model/UsuarioModel.php");

$objPersona = new UsuarioModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
    // print_r($_POST);
    $nro_identidad = $_POST['nro_identidad'];
    $razon_social = $_POST['razon_social'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $departamento = $_POST['departamento'];
    $provincia = $_POST['provincia'];
    $distrito = $_POST['distrito'];
    $cod_postal = $_POST['cod_postal'];
    $direccion = $_POST['direccion'];
    $rol = $_POST['rol'];
    // Encriptando dni para utilizarlo como contraseña
    $password = password_hash($nro_identidad, PASSWORD_DEFAULT);

    if ($nro_identidad == "" || $razon_social == "" || $telefono  == "" || $correo == "" || $departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" ||  $direccion == "" || $rol == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        // validacion si existe persona con el mismo dni
        $existePersona = $objPersona->existePersona($nro_identidad);
        if ($existePersona > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error, nro de documento ya existe');
        } else {
            $respuesta = $objPersona->registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'Registrado correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error, fallo en registro');
            }
        }
    }

    echo json_encode($arrResponse);

}
if ($tipo == "iniciar_sesion") {
    $nro_identidad = $_POST['usuario'];
    $password = $_POST['password'];
    if ($nro_identidad == "" || $password == "") {
        $respuesta = array('status' => false, 'msg' => 'ERROR, CAMPOS VACIOS');
    }else {
        $existePersona = $objPersona->existePersona($nro_identidad);
        if (!$existePersona) {
<<<<<<< HEAD
            $respuesta = array('status' => false, 'msg' => 'ERROR, USUARIO NO REGISTRADO');
        }else {
            $persona = $objPersona->buscarPersonaPorNroIdentidad($nro_identidad);
            if (password_verify($password,$persona->password)) {
=======
            $respuesta = array('status' => false, 'msg' => 'Error, usuario no registrado');
        } else {
            $persona = $objPersona->buscarPersonaPorNroIdenidad($nro_identidad);

            if (password_verify($password, $persona->password)) {
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
                session_start();
                $_SESSION['ventas_id'] = $persona->id;
                $_SESSION['ventas_usuario'] = $persona->razon_social;
                $respuesta = array('status' => true, 'msg' => 'OK');
            }else {
                $respuesta = array('status' => false, 'msg' => 'CONTRASEÑA INCORRECTA');
            }
        }
    }
    echo json_encode($respuesta);
}
if ($tipo == "ver_usuarios") {
<<<<<<< HEAD
    $usuarios = $objPersona->verUsuarios();
    echo json_encode($usuarios);
}
if ($tipo == "ver") {
    //print_r($_POST);
    $respuesta = array('status'=>false, 'msg'=>'Error');
=======
    $usuario = $objPersona->verUsuarios();
    header('content-type:application/json');
    echo json_encode($usuario);
}
if ($tipo == "ver") {
    // print_r ($_POST);
    $respuesta = array('status' => false, 'msg' => 'error');
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
    $id_persona = $_POST['id_persona'];
    $usuario = $objPersona->ver($id_persona);
    if ($usuario) {
        $respuesta['status'] = true;
        $respuesta['data'] = $usuario;
<<<<<<< HEAD
    }else {
=======
    } else {
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
        $respuesta['msg'] = 'Error, usuario no existe';
    }
    echo json_encode($respuesta);
}
<<<<<<< HEAD
if ($tipo=="actualizar") {
    //print_r($_POST);
=======
if ($tipo == "actualizar") {
    // print_r($_POST);
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
    $id_persona = $_POST['id_persona'];
    $nro_identidad = $_POST['nro_identidad'];
    $razon_social = $_POST['razon_social'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $departamento = $_POST['departamento'];
    $provincia = $_POST['provincia'];
    $distrito = $_POST['distrito'];
    $cod_postal = $_POST['cod_postal'];
    $direccion = $_POST['direccion'];
    $rol = $_POST['rol'];
<<<<<<< HEAD
    if ( $id_persona == "" || $nro_identidad == "" || $razon_social == "" || $telefono  == "" || $correo == "" || $departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" ||  $direccion == "" || $rol == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    }else {
        $existeID = $objPersona->ver($id_persona);
        if (!$existeID) {
            $arrResponse = array('status' => false, 'msg' => 'Error, Usuario no existe en BD');
            echo json_encode($arrResponse);
            //cerrar la funcion
            exit;
        } else {
           // actualizar
           $actualizar = $objPersona->actualizar($id_persona, $nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol);
           if ($actualizar) {
            $arrResponse = array('status' => true, 'msg'=>"Actualizado correctamente");
           }else {
            $arrResponse = array('status' => false, 'msg'=>"Actualizar");
           }
           echo json_encode($arrResponse);
           exit;
        }
    }
}

=======
    if ($id_persona == "" || $nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        $existeID = $objPersona->ver($id_persona);
        if (!$existeID) {
            //devolver el mensaje
            $arrResponse = array('status' => false, 'msg' => 'Error, Usuario no existe');
            echo json_encode($arrResponse);
            exit;
            //cerrar funcion

       } else {
           // actualizar
           $actualizar = $objPersona->actualizar($id_persona, $nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol);
           if ($actualizar) {
            $arrResponse = array('status' => true, 'msg'=>"Actualizado correctamente");
           }else {
            $arrResponse = array('status' => false, 'msg'=>"Actualizar");
           }
           echo json_encode($arrResponse);
           exit;
        }
    }
}
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
if ($tipo=="eliminar") {
    $respuesta = array('status' => false, 'msg' => 'Error');
    $id_persona = $_POST['id_persona'];
    if ($id_persona == "") {
        $respuesta['msg'] = 'Error, ID de usuario vacío';
    } else {
        // Verificar si el usuario existe antes de eliminarlo
        $existeUsuario = $objPersona->ver($id_persona);
        if (!$existeUsuario) {
            $respuesta['msg'] = 'Error, usuario no existe en la base de datos';
        } else {
            // Proceder con la eliminación
            $eliminar = $objPersona->eliminar($id_persona);
            if ($eliminar) {
                $respuesta['status'] = true;
                $respuesta['msg'] = 'Usuario eliminado correctamente';
            } else {
                $respuesta['msg'] = 'Error al eliminar el usuario de la base de datos';
            }
        }
    }
    
    echo json_encode($respuesta);
    exit;
}
<<<<<<< HEAD
if ($tipo == "ver_proveedores") {
    $proveedores = $objPersona->verProveedores();
    if (count($proveedores) > 0) {
        $respuesta = array('status' => true, 'data' => $proveedores);
    } else {
        $respuesta = array('status' => false, 'msg' => 'No hay proveedores');
    }
    echo json_encode($respuesta);
    exit;
}
if ($tipo == "ver_clientes") {
    $clientes = $objPersona->verClientes();
    echo json_encode($clientes);
    exit;
}
if ($tipo == "ver_proveedor") {
    $proveedor = $objPersona->verProveedor();
    echo json_encode($proveedor);
    exit;
}
=======
if ($tipo=="ver_proveedores") {
    $proveedores = $objPersona->verProveedores();
    
    echo json_encode(['status' => true, 'data' => $proveedores]);
    exit;
}
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
