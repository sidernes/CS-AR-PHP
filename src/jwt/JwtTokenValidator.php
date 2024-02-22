<?php
require 'TokenValidatorInterface.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class JwtTokenValidator implements TokenValidatorInterface {
    private $secretKey;

    public function __construct(string $secretKey) {
        $this->secretKey = $secretKey;
    }

    public function validateToken(string $token): bool {
        try {
            // Decodifica el token para verificar su validez
            $decoded = JWT::decode($token, new Key($this->secretKey, 'HS256'));

            // Verifica si el token ha expirado comparando el tiempo actual con el tiempo de expiración (exp) del token
            if (isset($decoded->exp) && $decoded->exp > time()) {
                return true; // El token es válido y no ha expirado
            } else {
                return false; // El token ha expirado
            }

        } catch (\Exception $e) {
            throw new Exception("Token inválido.", 401);
        }
    }

    public function decodeToken(string $token): ?array {
        try {
            // Decodifica el token para obtener el payload
            $decoded = JWT::decode($token, new Key($this->secretKey, 'HS256'));
            return (array) $decoded;
        } catch (\Exception $e) {
            throw new Exception("Token inválido.", 401);
        }
    }
}