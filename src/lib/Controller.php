<?php
// /src/Base/Service.php

class Controller {
    protected function success($data = null, $message = "Operación exitosa", $meta = null) {
        $this->response([
            'status' => 200,
            'message' => $message,
            'data' => $data,
            'meta' => $meta,
        ]);
    }

    protected function error($message = "Error en la operación", $status = 400, $error = null, $meta = null) {
        $this->response([
            'status' => $status,
            'message' => $message,
            'data' => null,
            'error' => $error,
            'meta' => $meta,
        ]);
    }

    public function validate($header) {
        include_once '../auth/AuthService.php';
        $Bearertoken = $header['Authorization'] ?? null;
        if ($Bearertoken === null) {
            http_response_code(401);
            throw new Exception("Token no encontrado.", 401);
        } else {
            $authService = new AuthService();
            $token = explode(' ', $Bearertoken);
            $authService->validateToken($token[1]);
        }
    }

    private function response($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}