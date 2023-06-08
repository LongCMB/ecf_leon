<?php

use App\Autoloader as AppAutoloader;
use Core\Autoloader as CoreAutoloader;
use App\Brand\Brand;
use App\Brand\BrandManager;
use Core\Controller;

require_once('../conf/constantes.php');

require_once ROOT . '/App/Autoloader.php';
AppAutoloader::register();
require_once ROOT . '/Core/Autoloader.php';
CoreAutoloader::register();

// require_once '../App/Brand/Brand.php';
// require_once '../App/Brand/BrandManager.php';
// require_once '../App/Debug.php';

$dao = new PDO ('mysql:host=localhost;dbname=instruments', 'root', '');
$dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$dao->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAME uft8');

// Debug::vardum($dao);


$psa = new Brand(['brand' => 'PSA']);

// Debug::print($psa);

$manager = new BrandManager($dao);

// $output = $manager->findById(4);

// // Debug::vardum($output);

// $manager->create($psa);

// Debug::vardum($manager->findAll());

$action = $_GET['action'] ?? 'index'; 
$controllerName = $_GET['controller'] ?? 'Controller'; 

$controller = new $controllerName();

if (!method_exists($controller, $action)) {
    die("404 Not Found"); 
}

$controller->$action();
