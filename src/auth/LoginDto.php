<?php
include_once '../lib/Dto.php';
class LoginDto {
    // Convertimos el método de validación en un método estático
    public static function validate($data) {
        if (isset($data['user']) && isset($data['password']) && !empty($data['user']) && !empty($data['password'])) {
            return [
                'user' => $data['user'],
                'password' => $data['password']
            ];
        } else {
            // Lanzamos una excepción si la validación falla
            //estructurar requerida de los datos
            $structure = "{user: 'string requerido', password: 'string requerido'}";
            throw new Exception("Error en los datos ingresados, los datos deben tener la forma: ".$structure, 400);
        }
    }
}