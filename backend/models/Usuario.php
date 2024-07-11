
<?php
include('../config/config.php');
class Usuario {
   
  public static function encriptarDato($dato)
  {
    // Generar el hash de la contraseña

    $textoEncriptado = hash('sha256', $dato);
    return $textoEncriptado;
  }
  //POST CREATE MODELS ******USUARIOS*******
  public static function createUser($email,$pass,$rol,$username)
  {

    try {

        $pass = Usuario::encriptarDato($pass);
        $data = dbcx::cx(1)->prepare('INSERT INTO usuarios(email,passwords,rol,username)values(:emailuser,:passuser,:rol,:username)');
        $data->bindParam("email", $email, PDO::PARAM_STR);
        $data->bindParam("passwords", $pass, PDO::PARAM_STR);
        $data->bindParam("rol", $rol, PDO::PARAM_STR);
        $data->bindParam("username", $username, PDO::PARAM_STR);
        $data->fetchAll(PDO::FETCH_ASSOC);
        $data->execute();
        $verif=$data->RowCount();
        dbcx::cx(0);
        return $verif ;
      
    } catch (PDOException $c) {

        return $c->getMessage();
    }
  }



   // GET ALL MODELS******USUARIOS*******

   public static function getUserAll()
   {
     try {
         $data = dbcx::cx(1)->prepare('SELECT * FROM usuarios');
         $data->execute();
         $users = $data->fetchAll(PDO::FETCH_ASSOC);
         dbcx::cx(0);
         return $users ;
       
     } catch (PDOException $c) {
 
         return $c->getMessage();
     }
   }


    // GET ID  MODELS******USUARIOS*******

    public static function getUser($id)
    {
      try {
          $data = dbcx::cx(1)->prepare('SELECT * FROM usuarios where id=:id');
          $data->bindParam("id",$id, PDO::PARAM_STR);
          $data->execute();
          $user = $data->fetchAll(PDO::FETCH_ASSOC);
          dbcx::cx(0);
          return $user ;
        
      } catch (PDOException $c) {
  
          return $c->getMessage();
      }
    }

    // POST UPDATE MODELS ******USUARIOS*******

    public static function updateUser($id,$email,$pass,$rol,$username)
    {
      try {

        $bar = dbcx::cx(1)->prepare('SELECT * FROM usuarios WHERE  id=:id');
        $bar->bindParam("id",$id, PDO::PARAM_STR);
        $bar->fetchAll(PDO::FETCH_ASSOC);
        $bar->execute();
        while ($reed = $bar->fetch()) {
          if ($reed['passwords'] != $pass) {
               $pass = Usuario::encriptarDato($pass);
          } 
        }
          $data = dbcx::cx(1)->prepare('UPDATE  usuarios  SET email=:email,passwords=:passwords,rol=:rol,username=:username where id=:id');
          $data->bindParam("email", $email, PDO::PARAM_STR);
          $data->bindParam("passwords", $pass, PDO::PARAM_STR);
          $data->bindParam("rol", $rol, PDO::PARAM_STR);
          $data->bindParam("username", $username, PDO::PARAM_STR);
          $data->bindParam("id",$id, PDO::PARAM_STR);
          $data->execute();
          $verif=$data->RowCount();
          dbcx::cx(0);
          return $verif ;
        
      } catch (PDOException $c) {
  
          return $c->getMessage();
      }
    }



     // POST DELETE  MODELS ******USUARIOS*******

     public static function deleteUser($id)
     {
       try {
           $data = dbcx::cx(1)->prepare('DELETE FROM  usuarios  WHERE id=:id');
           $data->bindParam("id",$id, PDO::PARAM_STR);
           $data->execute();
           $verif=$data->RowCount();
           dbcx::cx(0);
          


           return $verif ;
         
       } catch (PDOException $c) {
   
           return $c->getMessage();
       }
     }

      // POST DELETE  MODELS ******USUARIOS*******

      public static function login($email,$pass)
      {
        try {
          $pass=Usuario::encriptarDato($pass);
            $data = dbcx::cx(1)->prepare('SELECT *FROM usuarios WHERE  email=:email and  passwords=:passwords ');
            $data->bindParam("email",$email, PDO::PARAM_STR);
            $data->bindParam("passwords",$pass, PDO::PARAM_STR);
            $data->execute();
            $users = $data->fetchAll(PDO::FETCH_ASSOC);
            dbcx::cx(0);
            return   $users;
        
        } catch (PDOException $c) {
    
            return $c->getMessage();
        }
      }

}
?>
