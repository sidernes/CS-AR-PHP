<?php
require 'TokenGeneratorInterface.php';
use \Firebase\JWT\JWT;

class JwtTokenGenerator implements TokenGeneratorInterface {
    private $secretKey;
    private $tokenExpiry; // Tiempo de expiración del token en segundos
    public function __construct(string $secretKey, int $tokenExpiry = 3600) {
        $this->secretKey = $secretKey;
        $this->tokenExpiry = $tokenExpiry;
    }
    public function generateToken(array $payload): string {
        $issuedAt = time();
        $expirationTime = $issuedAt + $this->tokenExpiry; 
        $payload['exp'] = $expirationTime;
        $token = JWT::encode($payload, $this->secretKey, 'HS256');
        return $token;
    }
}