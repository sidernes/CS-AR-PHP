<?php
include_once 'AuthService.php';
class AuthController {
    protected $authService;

    public function __construct() {
        $this->authService = new AuthService();
        $requestData = json_decode(file_get_contents('php://input'), true);
        switch ($_SERVER['REQUEST_METHOD']) {
            // case 'GET':
            //     $this->handleGet($requestData);
            //     break;
            case 'POST':
                if(!class_exists('LoginDto')) include_once 'LoginDto.php';
                try {
                    $validatedData = LoginDto::validate($requestData);
                    $this->authService->validateUser($validatedData);
                } catch (Exception $e) {
                    http_response_code($e->getCode());
                    $response = [
                        'status' => $e->getCode(),
                        'message' => $e->getMessage(),
                        'data' => null,
                        'error' => $e->getMessage(),
                        'meta' => null,
                    ];
                    $this->response($response);
                }
                break;
            default:
                break;
        }
    }

    private function response($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

new AuthController();