<?php 

require_once '../lib/Service.php';
class UserModulesService extends Service{
    private $modules;
    public function __construct() {
        $this->userModel = null;
        $this->modules = [
            [
                'id' => 1,
                'name' => 'Módulo 1',
                'description' => 'Descripción del módulo 1',
                'icon' => 'icon1.png',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Módulo 2',
                'description' => 'Descripción del módulo 2',
                'icon' => 'icon2.png',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Módulo 3',
                'description' => 'Descripción del módulo 3',
                'icon' => 'icon3.png',
                'status' => 1
            ],
            [
                'id' => 4,
                'name' => 'Módulo 4',
                'description' => 'Descripción del módulo 4',
                'icon' => 'icon4.png',
                'status' => 1
            ],
            [
                'id' => 5,
                'name' => 'Módulo 5',
                'description' => 'Descripción del módulo 5',
                'icon' => 'icon5.png',
                'status' => 1
            ]
        ];
    }

    public function listModules() {
        //retornar los modulos
        return $this->success($this->modules);
    }

    public function getModule($id) {
        //buscar el modulo por id
        $module = array_filter($this->modules, function ($module) use ($id) {
            return $module['id'] == $id;
        });
        if (count($module) === 0) {
            return $this->error("Módulo no encontrado.", 404);
        }
        return $this->success(array_values($module)[0]);
    }
}