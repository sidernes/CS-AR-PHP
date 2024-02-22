<?php
interface TokenValidatorInterface {
    public function validateToken(string $token): bool;
    public function decodeToken(string $token): ?array;
}

?>