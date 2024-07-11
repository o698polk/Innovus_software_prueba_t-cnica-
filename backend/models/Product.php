
<?php
include('../config/config.php');
class Product {
   

  //POST CREATE MODELS ******PRODUCTOS*******
  public static function createProduct($nombre,$precio,$stock,$descripcion)
  {

    try {

        $pass = Usuario::encriptarDato($pass);
        $data = dbcx::cx(1)->prepare('INSERT INTO productos(nombre,precio,stock,descripcion)values(:nombre,:precio,:stock,:descripcion)');
        $data->bindParam("nombre",$nombre, PDO::PARAM_STR);
        $data->bindParam("precio", $precio, PDO::PARAM_STR);
        $data->bindParam("stock", $stock, PDO::PARAM_STR);
        $data->bindParam("descripcion", $descripcion, PDO::PARAM_STR);
        $data->fetchAll(PDO::FETCH_ASSOC);
        $data->execute();
        $verif=$data->RowCount();
        dbcx::cx(0);
        return $verif ;
      
    } catch (PDOException $c) {

        return $c->getMessage();
    }
  }



   // GET ALL MODELS******PRODUCTOS*******

   public static function getProductAll()
   {
     try {
         $data = dbcx::cx(1)->prepare('SELECT * FROM productos');
         $data->execute();
         $users = $data->fetchAll(PDO::FETCH_ASSOC);
         dbcx::cx(0);
         return $users ;
       
     } catch (PDOException $c) {
 
         return $c->getMessage();
     }
   }


    // GET ID  MODELS******PRODUCTOS*******

    public static function getProduct($id)
    {
      try {
          $data = dbcx::cx(1)->prepare('SELECT * FROM productos where id=:id');
          $data->bindParam("id",$id, PDO::PARAM_STR);
          $data->execute();
          $user=$data->fetch();
          dbcx::cx(0);
          return $user ;
        
      } catch (PDOException $c) {
  
          return $c->getMessage();
      }
    }

    // POST UPDATE MODELS ******PRODUCTOS*******

    public static function updateProduct($id,$nombre,$precio,$stock,$descripcion)
    {
      try {

          $data = dbcx::cx(1)->prepare('UPDATE productos  SET nombre=:nombre,precio=:precio,stock=:stock,descripcion=:descripcion where id=:id');
          $data->bindParam("nombre",$nombre, PDO::PARAM_STR);
          $data->bindParam("precio", $precio, PDO::PARAM_STR);
          $data->bindParam("stock", $stock, PDO::PARAM_STR);
          $data->bindParam("descripcion", $descripcion, PDO::PARAM_STR);
          $data->bindParam("id",$id, PDO::PARAM_STR);
          $data->execute();
          $verif=$data->RowCount();
          dbcx::cx(0);
          return $verif ;
        
      } catch (PDOException $c) {
  
          return $c->getMessage();
      }
    }



     // POST DELETE  MODELS ******PRODUCTOS*******

     public static function deleteProduct($id)
     {
       try {
           $data = dbcx::cx(1)->prepare('DELETE FROM  productos  WHERE id=:id');
           $data->bindParam("id",$id, PDO::PARAM_STR);
           $data->execute();
           $user=$data->fetch();
           dbcx::cx(0);
           return $verif ;
         
       } catch (PDOException $c) {
   
           return $c->getMessage();
       }
     }

     

}
?>
