<?php
//error en la consulta endpoint no encontrado
http_response_code(404);
$response = [
    'status' => 404,
    'message' => "Endpoint no encontrado.",
    'meta' => null,
];
echo json_encode($response);