<?php
define('JWT_KEY', 'E39B15D45339CF6AAC5C131816A9EE5DDCC23343');
require '../../vendor/autoload.php';

// /src/AuthorizationModule/Services/AuthService.php
require_once '../lib/Service.php'; // Asegúrate de incluir la ruta correcta
require_once '../jwt/MainTokens.php';
class AuthService extends Service {
    protected $userModel;
    private $jwt;

    public function __construct() {
        //definiendo el modelo de usuario
        $this->userModel = null;
        $this->jwt = new MainTokens();
    }

    public function validateUser($data) {
        //consulta a la base de datos
        // $user = $this->userModel->getUserByUsername($data['user']);
        $user = [
            'id' => 1,
            'nombre' => 'Ricardo Villalta',
            'rol' => 'admin',
            'estado' => 1
        ];

        // Usuario no encontrado
        if ($user === null) {
            return $this->error("Usuario no encontrado.", 404);
        }

        // Usuario inactivo
        if ($user['estado'] === 0) {
            return $this->error("Usuario inactivo.", 401);
        }
        // Usuario válido y activo
        return $this->success([
            'token' => $this->jwt->generateToken([
                'user_id' => $user['id'],
             ])
        ], "Usuario autenticado con éxito.");
    }

    public function validateToken($token) {
        if ($this->jwt->validateToken($token)) {
            $decoded = $this->jwt->decodeToken($token);
            return $decoded['user_id'];
        }
        throw new Exception("Token inválido.", 401);
    }
}