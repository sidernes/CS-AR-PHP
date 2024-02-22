<?php
interface TokenGeneratorInterface {
    public function generateToken(array $payload): string;
}