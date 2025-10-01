<?php
class viewModel{
    protected static function get_view($view){
        $white_list = ["home", "products", "users", "new-user","edit-user", "productos-edit","categories","productos-lista","new-producto","categorias-lista","new-categoria","categorias-edit"];
        if (in_array($view, $white_list)) {
            if (is_file("./view/".$view.".php")) {
                $content = "./view/".$view.".php";
            }else{
                $content = "404";
            }
        }elseif($view == "login"){ 
            $content = "login";
        }else{
            $content = "404";
        }
         return $content;
    }
}