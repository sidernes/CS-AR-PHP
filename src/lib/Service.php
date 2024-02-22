<?php
// /src/Base/Service.php

class Service {
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

    private function response($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}