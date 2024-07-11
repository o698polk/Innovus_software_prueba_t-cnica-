
<?php
require_once  '../../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function generateJWT($userId) {
    $payload = [
        'iss' => 'http://example.org',
        'aud' => 'http://example.com',
        'iat' => time(),
        'nbf' => time() + 10,
        'data' => [
            'userId' => $userId,
        ]
    ];

    $secretKey = 'polk';
    return JWT::encode($payload, $secretKey, 'HS256');

}

function validateJWT($jwt)
{
    $secretKey = 'polk';

    try {
        $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));
        return (array) $decoded->data;
    } catch (Exception $e) {
        return false;
    }
}
?>
