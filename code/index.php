<?php

require_once 'Classes/BrandManager.php';
require_once 'Classes/Brand.php';
require_once 'Classes/Debug.php';

$dao = new PDO ('mysql:host=localhost;dbname=instruments', 'root', '');
$dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$dao->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAME uft8');

// Debug::vardum($dao);


$psa = new Brand(['brand' => 'PSA']);

// Debug::print($psa);

$manager = new BrandManager($dao);

$output = $manager->findById(4);

// Debug::vardum($output);

$manager->create($psa);

Debug::vardum($manager->findAll());