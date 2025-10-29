<?php
require_once("../library/conexion.php");
<<<<<<< HEAD

class UsuarioModel {
    private $conexion;

=======
class UsuarioModel
{
    private $conexion;
<<<<<<< HEAD
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
    function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
<<<<<<< HEAD

    public function registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password) {
        $consulta = "INSERT INTO persona (nro_identidad, razon_social, telefono, correo, departamento, provincia, distrito, cod_postal, direccion, rol, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($consulta);
        if (!$stmt) {
            error_log("Error en prepare(): " . $this->conexion->error);
            return 0;
=======
    public function registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password){
        $consulta = "INSERT INTO persona (nro_identidad, razon_social, telefono, correo, departamento, provincia, distrito, cod_postal, direccion, rol, password) VALUES ('$nro_identidad', '$razon_social', '$telefono', '$correo', '$departamento', '$provincia', '$distrito', '$cod_postal', '$direccion', '$rol', '$password')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            $sql = $this->conexion->insert_id;

        }else{
=======
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registrar($nro_identidad, $razon_social, $telefono,  $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password)
    {
        $consulta = "INSERT INTO persona (nro_identidad, razon_social, telefono,  correo, departamento, provincia, distrito, cod_postal, direccion, rol, password) VALUES('$nro_identidad', '$razon_social', '$telefono', '$correo', '$departamento', '$provincia', '$distrito', '$cod_postal', '$direccion', '$rol', '$password')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
            $sql = 0;
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
        }
        $stmt->bind_param("sssssssssss", $nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password);
        $resultado = $stmt->execute();
        if ($resultado) {
            $insert_id = $this->conexion->insert_id;
            $stmt->close();
            return $insert_id;
        } else {
            error_log("Error en execute(): " . $stmt->error);
            $stmt->close();
            return 0;
        }
    }

    public function existePersona($nro_identidad) {
        $consulta = "SELECT * FROM persona WHERE nro_identidad = ?";
        $stmt = $this->conexion->prepare($consulta);
        if (!$stmt) {
            error_log("Error en prepare(): " . $this->conexion->error);
            return 0;
        }
        $stmt->bind_param("s", $nro_identidad);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $num_rows = $resultado->num_rows;
        $stmt->close();
        return $num_rows;
    }

    public function buscarPersonaPorNroIdentidad($nro_identidad) {
        $consulta = "SELECT id, razon_social, password FROM persona WHERE nro_identidad = ? LIMIT 1";
        $stmt = $this->conexion->prepare($consulta);
        if (!$stmt) {
            error_log("Error en prepare(): " . $this->conexion->error);
            return null;
        }
        $stmt->bind_param("s", $nro_identidad);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado && $resultado->num_rows > 0) {
            $persona = $resultado->fetch_object();
            $stmt->close();
            return $persona;
        }
        $stmt->close();
        return null;
    }

    public function mostrarUsuarios() {
        $arr_usuarios = array();
        $consulta = "SELECT * FROM persona WHERE rol<>'proveedor' AND  rol<>'cliente'";
        $sql = $this->conexion->query($consulta);
        if (!$sql) {
            error_log("Error en query(): " . $this->conexion->error);
            return $arr_usuarios;
        }
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_usuarios, $objeto);
        }
        return $arr_usuarios;
    }

    
    public function obtenerUsuarioPorId($id) {
        if (!is_numeric($id) || $id <= 0) {
            return false;
        }
        $consulta = "SELECT id, nro_identidad, razon_social, correo, departamento, provincia, distrito, cod_postal, direccion, rol, estado FROM persona WHERE id = ? LIMIT 1";
        $stmt = $this->conexion->prepare($consulta);
        if (!$stmt) {
            error_log("Error en prepare(): " . $this->conexion->error);
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado && $resultado->num_rows > 0) {
            $usuario = $resultado->fetch_object();
            $stmt->close();
            return $usuario;
        }
        $stmt->close();
        return false;
    }
    
    public function existeCorreoEnOtroUsuario($correo, $excluirId) {
        $consulta = "SELECT id FROM persona WHERE correo = ? AND id != ? LIMIT 1";
        $stmt = $this->conexion->prepare($consulta);
        if (!$stmt) {
            error_log("Error en prepare(): " . $this->conexion->error);
            return false;
        }
        $stmt->bind_param("si", $correo, $excluirId);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $existe = $resultado->num_rows > 0;
        $stmt->close();
        return $existe;
    }

    public function existeIdentidadEnOtroUsuario($nro_identidad, $excluirId) {
        $consulta = "SELECT id FROM persona WHERE nro_identidad = ? AND id != ? LIMIT 1";
        $stmt = $this->conexion->prepare($consulta);
        if (!$stmt) {
            error_log("Error en prepare(): " . $this->conexion->error);
            return false;
        }
        $stmt->bind_param("si", $nro_identidad, $excluirId);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $existe = $resultado->num_rows > 0;
        $stmt->close();
        return $existe;
    }
    

    public function ver($id){
        $consulta = "SELECT * FROM persona WHERE id= '$id'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    public function actualizar($id_persona, $nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol){
        $consulta = "UPDATE persona SET nro_identidad='$nro_identidad', razon_social='$razon_social', telefono='$telefono', correo='$correo', departamento='$departamento', provincia='$provincia', distrito='$distrito', cod_postal='$cod_postal', direccion='$direccion', rol='$rol' WHERE id='$id_persona'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
<<<<<<< HEAD

    public function eliminar($id_persona){
        $consulta = "DELETE FROM persona WHERE  id = '$id_persona'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
=======
<<<<<<< HEAD
    public function existePersona($nro_identidad){
        $consulta="SELECT * FROM persona WHERE nro_identidad='$nro_identidad'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }
   
   
    public function buscarPersonaPorNroIdentidad($nro_identidad){
        $consulta = "SELECT id, razon_social, password FROM persona WHERE nro_identidad='$nro_identidad' LIMIT 1";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }
    
    
    public function verUsuarios(){
        $arr_usuarios = array();
        $consulta = "SELECT * FROM persona WHERE rol!='Cliente' and rol!='Proveedor'";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_usuarios, $objeto);
        }
        return $arr_usuarios;
    }
   
   
    public function ver($id){
      $consulta = "SELECT * FROM persona WHERE id='$id'";
      $sql = $this->conexion->query($consulta);
      return $sql->fetch_object();
    }
    
    
    public function actualizar($id_persona, $nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol){
       $consulta = "UPDATE persona SET nro_identidad='$nro_identidad', razon_social='$razon_social', telefono='$telefono', correo='$correo', departamento='$departamento', provincia='$provincia', distrito='$distrito', cod_postal='$cod_postal', direccion='$direccion', rol='$rol' WHERE id='$id_persona'";
       $sql = $this->conexion->query($consulta);
       return $sql;
    }
    
    
    public function eliminar($id){
    $consulta = "DELETE FROM persona WHERE id='$id'";
    $sql = $this->conexion->query($consulta);
    return $sql;
    }

  public function verProveedores() {
    $arr_proveedores = array();
    $consulta = "SELECT id, razon_social FROM persona WHERE rol = 'Proveedor'";
    $sql = $this->conexion->query($consulta);
    while ($objeto = $sql->fetch_object()) {
        array_push($arr_proveedores, $objeto);
    }
    return $arr_proveedores;
}
public function verClientes(){
        $arr_usuarios = array();
        $consulta = "SELECT * FROM persona WHERE rol='Cliente'";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_usuarios, $objeto);
        }
        return $arr_usuarios;
    } 

    public function verProveedor(){
        $arr_usuarios = array();
        $consulta = "SELECT * FROM persona WHERE rol='Proveedor'";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_usuarios, $objeto);
        }
        return $arr_usuarios;
    }
=======
    public function existePersona($nro_identidad)
    {
        $consulta = "SELECT * FROM persona WHERE nro_identidad = '$nro_identidad'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }
    public function buscarPersonaPorNroIdenidad($nro_identidad)
    {

        $consulta = "SELECT id, razon_social, password FROM persona WHERE nro_identidad = '$nro_identidad'limit 1";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }
    public function verUsuarios()
    {
        $arr_usuario = array();
        $consulta = "SELECT * FROM persona";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_usuario, $objeto);
        }
        return $arr_usuario;
    }
    public function ver($id)
    {
        $consulta = "SELECT * FROM persona WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }
    public function actualizar($id_persona, $nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol){
       $consulta = "UPDATE persona SET nro_identidad='$nro_identidad', razon_social='$razon_social', telefono='$telefono', correo='$correo', departamento='$departamento', provincia='$provincia', distrito='$distrito', cod_postal='$cod_postal', direccion='$direccion', rol='$rol' WHERE id='$id_persona'";
       $sql = $this->conexion->query($consulta);
       return $sql;
    }
   
        public function eliminar($id){
    $consulta = "DELETE FROM persona WHERE id='$id'";
    $sql = $this->conexion->query($consulta);
    return $sql;
    }
    public function verProveedores(){
        $arr_proveedores = array();
        $consulta = "SELECT id, razon_social FROM persona  WHERE rol='proveedor'";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_proveedores, $objeto);
        }
        return $arr_proveedores;
    }   
        
    
   
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
}
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f

    public function mostrarClientes(){
        $arr_usuarios = array();
        $consulta = "SELECT * FROM persona WHERE rol = 'cliente'";
        $sql = $this->conexion->query($consulta);

        if (!$sql) {
            error_log("Error en query(): " . $this->conexion->error);
            return $arr_usuarios;
        }
        while ($objeto = $sql->fetch_object()){
            array_push($arr_usuarios, $objeto);
        }
        return $arr_usuarios;
    }

      public function mostrarProveedores(){
        $arr_usuarios = array();
        $consulta = "SELECT * FROM persona WHERE rol = 'proveedor'";
        $sql = $this->conexion->query($consulta);

        if (!$sql) {
            error_log("Error en query(): " . $this->conexion->error);
            return $arr_usuarios;
        }
        while ($objeto = $sql->fetch_object()){
            array_push($arr_usuarios, $objeto);
        }
        return $arr_usuarios;
    }

}