
<?php
include("../config/config.php");
require_once '../jwt/jwt.php';
class AuthController {
    public static function login() {
           
                $token = generateJWT('1');
                 echo   $token;
        
    }
}
AuthController::login();
?>
