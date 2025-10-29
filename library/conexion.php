<?php
require_once "../config/config.php";

<<<<<<< HEAD
class  Conexion{
    public static function connect(){
        $mysql = new mysqli(BD_HOST, BD_USER, BD_PASSWORD, BD_NAME);
=======
class Conexion{
    public static function connect() 
    {
        $mysql = new mysqli(BD_HOST,BD_USER,BD_PASSWORD,BD_NAME);
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
        $mysql->set_charset(BD_CHARSET);
        date_default_timezone_set("America/Lima");

        if (mysqli_connect_errno()) {
<<<<<<< HEAD
            echo"Error de conexion". mysqli_connect_errno();
=======
            echo "Error de conexion".mysqli_connect_errno();
        }else {
            "Conexion exitosa";
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
        }
        return $mysql;
    }
}
<<<<<<< HEAD
=======

>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
