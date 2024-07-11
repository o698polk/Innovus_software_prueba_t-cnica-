<?php
require_once '../jwt/jwt.php';

include('../models/Product.php');
class ApiProductControler {
 
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
 public static function createProductApi($nombre,$precio,$stock,$descripcion,$token)
 {
   try {
    ApiProductControler::Validation($token);
    $respose=array("msg"=>"Error al crear","status"=>"","data"=>"");

        if(!empty($nombre) && !empty($precio)&&!empty($stock)&&!empty($descripcion)){
            
            $nombre=ApiProductControler::limpiarDatos($nombre);
            $precio=ApiProductControler::limpiarDatos($precio);
            $stock=ApiProductControler::limpiarDatos($stock);
            $descripcion=ApiProductControler::limpiarDatos($descripcion);
          
            $resul=Product::createProduct($nombre,$precio,$stock,$descripcion);

            if( $resul>=1){
                $respose['msg']="Producto creado ";
                $respose['status']="200";
                $respose['data']=$resul;
            }else{
                $respose['msg']="Producto no creado ";
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
 
 public static function getAllProductApi($token)
 {
   try {
    ApiProductControler::Validation($token);
    $respose=array("msg"=>"Error al crear","status"=>"","data"=>"");
   
            $resul=Product::getProductAll();
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
 public static function getProductApi($id,$token)
 {
   try {
    ApiProductControler::Validation($token);
    $respose=array("msg"=>"Error al crear","status"=>"","data"=>"");
            $resul=Product::getProduct($id);
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
 public static function updateProductApi($id,$nombre,$precio,$stock,$descripcion,$token)
 {
   try {
    ApiProductControler::Validation($token);
    $respose=array("msg"=>"Error al crear","status"=>"","data"=>"");  
        $nombre=ApiProductControler::limpiarDatos($nombre);
        $precio=ApiProductControler::limpiarDatos($precio);
        $stock=ApiProductControler::limpiarDatos($stock);
        $descripcion=ApiProductControler::limpiarDatos($descripcion);
      
        $resul=Product::updateProduct($id,$nombre,$precio,$stock,$descripcion);

        if( $resul>=1){
            $respose['msg']="Producto creado ";
            $respose['status']="200";
            $respose['data']=$resul;
        }else{
            $respose['msg']="Producto no creado ";
            $respose['status']="400";

        }
       return json_encode($respose) ;
     
   } catch (PDOException $c) {

       return $c->getMessage();
   }
 }

 //POST DELETE  CONTROLLER ******USUARIOS*******
 public static function deleteProductApi($id,$token)
 {
   try {
    ApiProductControler::Validation($token);
    $respose=array("msg"=>"Error al crear","status"=>"","data"=>"");
   
            $resul=Product::deleteProduct($id);
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


}
//echo ApiProductControler::login('jose@gmail.com','1234');
//echo ApiProductControler::Validation('2eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vZXhhbXBsZS5vcmciLCJhdWQiOiJodHRwOi8vZXhhbXBsZS5jb20iLCJpYXQiOjE3MjA2NTY4NDQsIm5iZiI6MTcyMDY1Njg1NCwiZGF0YSI6eyJ1c2VySWQiOiJqb3NlQGdtYWlsLmNvbSJ9fQ.xqiWOX73qVze90lcJm0mgpVquD3WvmGG1aRMiovO5EI');
?>