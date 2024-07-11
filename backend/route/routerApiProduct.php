<?php

include('../controllers/ApiProductControler.php');
class Router{

    public static function Api(){

        // MOSTRAR PRODUCTOS
    if (!empty($_POST['showproduct'])) {

        echo ApiProductControler::getAllProductApi($_POST['token']);
      }
     // CREAR PRODUCTOS
     if (!empty($_POST['nombre_product'])) {

        echo ApiProductControler::createProductApi($_POST['nombre_product'],$_POST['precio'],$_POST['descripcion'],$_POST['stock'],$_POST['token']);
      }
      
    }

    

}

Router::Api();
?>