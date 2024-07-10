// backend/models/Usuario.php
<?php
include('../config/config.php');

class Usuario {
   
  // CREATE ******USUARIOS*******
  public static function createUser($email,$pass,$rol,$username)
  {

    try {
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



   // GET ALL ******USUARIOS*******

   public static function getUserAll()
   {
     try {
         $data = dbcx::cx(1)->prepare('SELECT * FROM usuarios');
         $data->execute();
         $user=$data->fetch();
         dbcx::cx(0);
         return $user ;
       
     } catch (PDOException $c) {
 
         return $c->getMessage();
     }
   }


    // GET ID ******USUARIOS*******

    public static function getUser($id)
    {
      try {
          $data = dbcx::cx(1)->prepare('SELECT * FROM usuarios where id=:id');
          $data->bindParam("id",$id, PDO::PARAM_STR);
          $data->execute();
          $user=$data->fetch();
          dbcx::cx(0);
          return $user ;
        
      } catch (PDOException $c) {
  
          return $c->getMessage();
      }
    }

    // GET ID ******USUARIOS*******

    public static function updateUser($id,$email,$pass,$rol,$username)
    {
      try {
          $data = dbcx::cx(1)->prepare('UPDATE  channelltm  SET email=:email,passwords=:passwords,rol=:rol,username=:username where id=:id');
          $data->bindParam("email", $email, PDO::PARAM_STR);
          $data->bindParam("passwords", $pass, PDO::PARAM_STR);
          $data->bindParam("rol", $rol, PDO::PARAM_STR);
          $data->bindParam("username", $username, PDO::PARAM_STR);
          $data->bindParam("id",$id, PDO::PARAM_STR);
          $data->execute();
          $user=$data->fetch();
          dbcx::cx(0);
          return $user ;
        
      } catch (PDOException $c) {
  
          return $c->getMessage();
      }
    }
}
?>
