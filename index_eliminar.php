<?php
// echo "Hello, PHP!</br>";
require 'vendor/autoload.php'; // Asegúrate de incluir el autoloader de Composer
define('JWT_KEY', 'E39B15D45339CF6AAC5C131816A9EE5DDCC23343');
header('Content-Type: application/json');
$header = getallheaders();

// echo json_encode([
//             'status' => 200,
//             'metodo' => $_SERVER['REQUEST_METHOD'],
//             'parametros' => json_decode(file_get_contents('php://input'), true),
//             'token' => $token
//         ]);
// include_once 'src/auth/LoginDto.php';
// $postData = json_decode(file_get_contents('php://input'), true);
// try {
//     $loginDto = new LoginDto($postData);
//     echo "Datos validados: " . $loginDto->user . ", " . $loginDto->password;

// } catch (Exception $e) {
//     http_response_code($e->getCode());
//     $response = [
//         'status' => $e->getCode(),
//         'message' => $e->getMessage(),
//         'data' => null,
//         'error' => $e->getMessage(),
//         'meta' => null,
//     ];
//     echo json_encode($response);
// }
// include_once 'src/auth/AuthController.php';
// new AuthController();

// include_once 'src/auth/AuthService.php';
// $Bearertoken = $header['Authorization'] ?? null;
// if ($Bearertoken === null) {
//     http_response_code(401);
//     $response = [
//         'status' => 401,
//         'message' => "Token no encontrado.",
//         'data' => null,
//         'error' => "Token no encontrado.",
//         'meta' => null,
//     ];
//     echo json_encode($response);
// } else {
//     $authService = new AuthService();
//     $token = explode(' ', $Bearertoken);
//     $authService->validateToken($token[1]);
// }