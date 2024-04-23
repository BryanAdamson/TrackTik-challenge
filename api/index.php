<?php
require_once 'controllers/Provider1Controller.php';
require_once 'controllers/Provider2Controller.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$endpoint = strtok($_SERVER['REQUEST_URI'], '?');


switch ($endpoint) {
    case '/api/provider1':
        $provider1Controller = new Provider1Controller();
        if ($requestMethod === 'POST') {
            $provider1Controller->receiveData();
        }
        else {
            http_response_code(405);
            echo json_encode([
                "success" => false,
                "message" => "Method Not Allowed"
            ]);
        }
        break;
    case '/api/provider2':
        $provider2Controller = new Provider2Controller();
        if ($requestMethod === 'POST') {
            $provider2Controller->receiveData();
        } else {
            http_response_code(405);
            echo json_encode(array("message" => "Method Not Allowed"));
        }
        break;
    default:
        http_response_code(404);
        echo json_encode([
            "success" => false,
            "endpoint" => $endpoint,
            "message" => "Not Found Yet"
        ]);
}