<?php
require './TokenGeneratorInterface.php';
require './TokenValidatorInterface.php';
class TokenManager {
    private $tokenGenerator;
    private $tokenValidator;

    public function __construct(TokenGeneratorInterface $tokenGenerator, TokenValidatorInterface $tokenValidator) {
        $this->tokenGenerator = $tokenGenerator;
        $this->tokenValidator = $tokenValidator;
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
}

?>