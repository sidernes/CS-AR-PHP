<?php
require 'JwtTokenGenerator.php';
require 'JwtTokenValidator.php';
class MainTokens {
    private $periodo;
    private $secretKey;
    private $tokenGenerator;
    private $tokenValidator;

    public function __construct() {
        $this->secretKey = JWT_KEY;
        // $this->periodo = 24 * 3600;
        $this->periodo = 7 * 24 * 3600;
        $this->tokenGenerator = new JwtTokenGenerator($this->secretKey, $this->periodo);
        $this->tokenValidator = new JwtTokenValidator($this->secretKey);
    }

    public function generateToken(array $payload): string {
        return $this->tokenGenerator->generateToken($payload);
    }

    public function validateToken(string $token): bool {
        return $this->tokenValidator->validateToken($token);
    }

    public function decodeToken(string $token): ?array {
        return $this->tokenValidator->decodeToken($token);
    }

    public function getIdUser($token){
        $payload = $this->decodeToken($token);
        return $payload['user_id'];
    }

}