<?php

require_once 'Autoloader.php';
require_once 'config/config.php';

use App\Autoloader;
use App\Controller\HomeController;

Autoloader::$folderList =
    [
        "App/Model/",
        "App/Controller/",
        "App/Repository/",
        "App/Service/",
    ];
Autoloader::register();

$homeController = new HomeController();
var_dump($homeController->invoke());
