<?php
require_once '../jwt/jwt.php';
include('../models/Usuario.php');

class ApiUserControler {
 
    public static function limpiarDatos($datos)
    {
      $datos = trim($datos);
      $datos = stripcslashes($datos);
      $datos = htmlspecialchars($datos);
  
  
      return $datos;
    }
    public static function Validation($token)
    {
        $respose=array("msg"=>"No Authenticado","status"=>"401");
      if(empty(validateJWT($token))){
        return json_encode($respose);
      }
       
    }
  

 //POST CREATE CONTROLLER ******USUARIOS*******
 public static function createUserApi($email,$pass,$username,$token)
 {
   try {
    $respose=array("msg"=>"Error al crear","status"=>"","data"=>"");

        if(!empty($email) && !empty($pass)){
            $defaulrol="admin";
            $email=ApiUserControler::limpiarDatos($email);
            $pass=ApiUserControler::limpiarDatos($pass);
            $username=ApiUserControler::limpiarDatos($username);
            $resul=Usuario::createUser($email,$pass,$defaulrol,$username);
            if( $resul>=1){
                $respose['msg']="Registros encontrados ";
                $respose['status']="200";
                $respose['data']=$resul;
            }else{
                $respose['msg']="Registros no encontrados ";
                $respose['status']="400";

            }
         
        }else{
                $respose['msg']="No encontrado ";
                $respose['status']="400";

        }
        
       return json_encode($respose) ;
     
   } catch (PDOException $c) {

       return $c->getMessage();
   }
 }

 //POST GET ALL CONTROLLER ******USUARIOS*******
 
 public static function getAllUserApi($token)
 {
   try {
    ApiUserControler::Validation($token);
    $respose=array("msg"=>"Error al crear","status"=>"","data"=>"");
   
            $resul=Usuario::getUserAll();
            if( !empty($resul)){
                $respose['msg']="Registros encontrados ";
                $respose['status']="200";
                $respose['data']=$resul;
            }else{
                $respose['msg']="Registros no encontrados ";
                $respose['status']="404";

            }    
       return json_encode($respose) ;
     
   } catch (PDOException $c) {

       return $c->getMessage();
   }
 }


 //POST GET  CONTROLLER ******USUARIOS*******
 public static function getUserApi($id,$token)
 {
   try {
    ApiUserControler::Validation($token);
    $respose=array("msg"=>"Error al crear","status"=>"","data"=>"");
            $resul=Usuario::getUser($id);
            if( !empty($resul)){
                $respose['msg']="Registros encontrados ";
                $respose['status']="200";
                $respose['data']=$resul;
            }else{
                $respose['msg']="Registros no encontrados ";
                $respose['status']="404";

            }    
       return json_encode($respose) ;
     
   } catch (PDOException $c) {

       return $c->getMessage();
   }
 }

 //POST UPDATE  CONTROLLER ******USUARIOS*******
 public static function updateUserApi($id,$email,$pass,$username,$token)
 {
   try {
    ApiUserControler::Validation($token);
    $respose=array("msg"=>"Error al crear","status"=>"","data"=>"");
    $defaulrol="admin";
    $email=ApiUserControler::limpiarDatos($email);
    $pass=ApiUserControler::limpiarDatos($pass);
    $username=ApiUserControler::limpiarDatos($username);
            $resul=Usuario::updateUser($id,$email,$pass, $defaulrol,$username);
            if( !empty($resul)){
                $respose['msg']="Actualizado ";
                $respose['status']="200";
                $respose['data']=$resul;
            }else{
                $respose['msg']="No actualizado ";
                $respose['status']="400";

            }    
       return json_encode($respose) ;
     
   } catch (PDOException $c) {

       return $c->getMessage();
   }
 }

 //POST DELETE  CONTROLLER ******USUARIOS*******
 public static function deleteUserApi($id,$token)
 {
   try {
    ApiUserControler::Validation($token);
    $respose=array("msg"=>"Error al crear","status"=>"","data"=>"");
   
            $resul=Usuario::deleteUser($id);
            if( !empty($resul)){
                $respose['msg']="Eliminado ";
                $respose['status']="200";
                $respose['data']=$resul;
            }else{
                $respose['msg']="No Eliminado ";
                $respose['status']="400";

            }    
       return json_encode($respose) ;
     
   } catch (PDOException $c) {

       return $c->getMessage();
   }
 }

 public static function login($email,$pass){
   
    $respose=array("msg"=>"Error al crear","status"=>"","email"=>"","token"=>"");

    if(!empty($email) && !empty($pass)){
      
        $email=ApiUserControler::limpiarDatos($email);
        $pass=ApiUserControler::limpiarDatos($pass);
    
        $resul=Usuario::login($email,$pass);
        $token="";
     if(!empty($resul)){
        $token= generateJWT($email);
     }
    
    
        if( !empty($resul)){
            
            $respose['msg']="Login ";
            $respose['status']="200";
            $respose['email']=$email;
            $respose['token']=$token;
          
        }else{
            $respose['msg']="No encontrado";
            $respose['status']="400";
        }
     
    }else{
            $respose['msg']="No encontrado ";
            $respose['status']="400";

    }
    
   return json_encode($respose) ;

 }

}
//echo ApiUserControler::login('jose@gmail.com','1234');
echo ApiUserControler::Validation('2eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vZXhhbXBsZS5vcmciLCJhdWQiOiJodHRwOi8vZXhhbXBsZS5jb20iLCJpYXQiOjE3MjA2NTY4NDQsIm5iZiI6MTcyMDY1Njg1NCwiZGF0YSI6eyJ1c2VySWQiOiJqb3NlQGdtYWlsLmNvbSJ9fQ.xqiWOX73qVze90lcJm0mgpVquD3WvmGG1aRMiovO5EI');
?>