<?php

include('../controllers/ApiProductControler.php');
class Router{

    public static function Api(){

        // MOSTRAR PRODUCTOS
    if (!empty($_POST['showproduct'])) {

        echo ApiProductControler::getAllProductApi($_POST['token']);
      }
     // CREAR PRODUCTOS
     if (!empty($_POST['id_product_create'])) {

        echo ApiProductControler::createProductApi($_POST['nombre_product'],$_POST['precio'],$_POST['stock'],$_POST['descripcion'],$_POST['token']);
      }

         // EDITAR PRODUCTOS
    if (!empty($_POST['editproductdata'])) {

      echo ApiProductControler::getProductApi($_POST['editproductdata'],$_POST['token']);
    }

      // EDITAR PRODUCTOS EJECUTE
      if (!empty($_POST['id_product_edit'])) {
        echo ApiProductControler::updateProductApi($_POST['id_product_edit'],$_POST['edit_nombre'],$_POST['precio'],$_POST['descripcion'],$_POST['stock'],$_POST['token']);
      }
        // ELIMINAR PRODUCTOS
    if (!empty($_POST['id_product_delete'])) {

      echo ApiProductControler::deleteProductApi($_POST['id_product_delete'],$_POST['token']);
    }
      
    }

    

}

Router::Api();
?>