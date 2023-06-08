<?php

namespace Core;

use App\Brand\BrandManager;

class Controller
{
    protected string $module;
    protected BrandManager $manager;

    public function __construct()
    {
        $model = get_called_class();
        $model = explode('\\', $model);
        $model = end($model);
        $model = str_replace('Controller', '', $model);
        $this->module = strtolower($model);
        $managerName = 'App\\' . ucfirst($this->module) . '\\' . ucfirst($this->module) . 'Manager';
        $this->manager = new $managerName();
    }

    public function index()
    {
        $data  = $this->manager->findAll();
        require_once 'views/brand.index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'il faudra vérifier les données cet après-midi en même temps que le dev des fichiers de vues';
        } else {
            require_once 'views/brand.add.php';
        }
    }

}
