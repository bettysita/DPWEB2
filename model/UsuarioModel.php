<?php
require_once("../library/conexion.php");
class UsuarioModel
{
    private $conexion;
<<<<<<< HEAD
    function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
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
        }
        return $sql;
    }
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

