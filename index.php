<?php

require_once ('./App/Model/sport.php');

use App\model\sport;

$sport = new Sport('foot');
var_dump($sport->getName());