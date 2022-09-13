<?php

require_once ('Config/config.php');

require_once ('./App/Model/sport.php');
require_once ('./App/Controller/homeController.php');

use App\Controller\HomeController;
use App\model\sport;

$test = new HomeController();
var_dump($test->invoke());