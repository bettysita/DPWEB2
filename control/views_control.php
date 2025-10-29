<?php
require_once "./model/views_model.php";

class viewsControl extends viewModel
{
<<<<<<< HEAD
    public function getPlantillaControl()
    {
        return require_once "./view/plantilla.php";
    }
    public function getViewControl()
    {
        session_start();
        if (isset($_SESSION['ventas_id'])) {

            if (isset($_GET["views"])) {
                $ruta = explode("/", $_GET["views"]);
                $response = viewModel::get_view($ruta[0]);
            } else {
                $response = "index.php";
            }
        }else {
=======
    public function getPlantillaControl(){
        return require_once "./views/plantilla.php";
    }
    public function getViewControl(){
       
        session_start();
        if(isset($_SESSION['ventas_id'])){
            
        
            if (isset($_GET["views"])) {
            $ruta = explode("/",$_GET["views"]);
            $response = viewModel::get_view($ruta[0]);
            }else{
            $response = "index.php";
            }
        }else{
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
            $response = "login";
        }
        return $response;
        
    }
}
