
<?php
require_once  '../../vendor/autoload.php';

use Firebase\JWT\JWT;


function generateJWT($userId) {
    $key = "polk_vernaza";  // Cambia "your_secret_key" por tu clave secreta real
    $payload = array(
        "iat" => time(),
        "exp" => time() + (60*60), // Token válido por 1 hora
        "userId" => $userId
    );

    return JWT::encode($payload, $key, 'HS256');  // Asegúrate de incluir el algoritmo correcto (HS256 en este caso)
}

function validateJWT($jwt) {
    $key = "polk_vernaza";  // Cambia "your_secret_key" por tu clave secreta real
    try {
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        return (array) $decoded;
    } catch (Exception $e) {
        return false;
    }
}
?>
