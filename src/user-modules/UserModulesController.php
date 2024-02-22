<?php
// $header = getallheaders();
// $autorization = $header['Authorization'] ?? null;
// print_r(json_decode(file_get_contents('php://input'), true));
// print_r($_SERVER['REQUEST_METHOD']);
// print_r($autorization);
// print_r($_GET);
require_once '../lib/Controller.php';
require_once 'UserModulesService.php';
class UserModulesController extends Controller{
    protected $userModulesService;
    private $header;

    public function __construct() {
        $this->userModulesService = new UserModulesService();
        // $requestData = json_decode(file_get_contents('php://input'), true);
        $this->header = getallheaders();
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $this->validate($this->header);
                    if(isset($_GET['module']))
                        $this->userModulesService->getModule($_GET['module']);
                    else
                        $this->userModulesService->listModules();
                    break;
                case 'POST':
                    // $this->userModulesService->
                    break;
                case 'PUT':
                    // $this->handlePut($requestData);
                    break;
                case 'DELETE':
                    // $this->handleDelete($requestData);
                    break;
                default:
                    break;
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
            $response = [
                'status' => $e->getCode(),
                'message' => $e->getMessage(),
                'error' => $e->getMessage(),
            ];
            echo json_encode($response);
        }
    }
}

new UserModulesController();