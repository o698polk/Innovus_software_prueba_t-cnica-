<?php

include('../controllers/ApiUserControler.php');
class Router{

    public static function Api(){

        // LOGIN 
    if (!empty($_POST['login_api_rute'])) {

        $email_user = $_POST['userlogin'];
        $pass_user =  $_POST['passlogin'];
  
  
        echo ApiUserControler::login($email_user, $pass_user);
      }
    }

}

Router::Api();
?>