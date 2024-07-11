<?php

include('../controllers/ApiProductControler.php');
class Router{

    public static function Api(){

        // LOGIN 
    if (!empty($_POST['showproduct'])) {

        echo ApiProductControler::getAllProductApi($_POST['token']);
      }
    }

}

Router::Api();
?>