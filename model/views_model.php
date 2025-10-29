<?php
<<<<<<< HEAD
class viewModel
{
    protected static function get_view($view)
    {
       $white_list = ["home","products","new-products","edit-products","users","new-user","edit-user","new-categoria","categoria-edit","categoria-lista","clientes","new-clientes","edit-clientes","proveedor","new-proveedor","edit-proveedor"];
       if (in_array($view,$white_list)) {
            if (is_file("./views/".$view.".php")) {
            $content = "./views/".$view.".php";
            }else {
                 $content = "404";
=======
class viewModel{
    protected static function get_view($view){
<<<<<<< HEAD
        $white_list = ["users","new-user", "edit-user", "new-categoria", "categorias-lista", 
        "categorias-edit", "new-producto", "productos-lista", "productos-edit", "proveedor-new", "proveedor-edit", "proveedor-list",
        "clientes-new", "clientes-list", "clientes-edit"];
=======
        $white_list = ["home", "products", "users", "new-user","edit-user", "productos-edit","categories","productos-lista","new-producto","categorias-lista","new-categoria","categorias-edit"];
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
        if (in_array($view, $white_list)) {
            if (is_file("./view/".$view.".php")) {
                $content = "./view/".$view.".php";
            }else{
                $content = "404";
>>>>>>> bd3482433679cf4fce04f27e62d13fa276e9bdfa
            }
        }elseif ($view == "login") {
            $content = "login";
         }else {
            $content = "404";
       }
       return $content;
    }
}
<<<<<<< HEAD
=======

>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
