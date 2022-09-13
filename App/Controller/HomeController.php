<?php

namespace App\Controller;

use App\model\sport;
use App\Repository\SportRepository;

class HomeController
{
    public function invoke()
    {
        $repo = new SportRepository();
        return $repo->findAll();
    }

    public function add($sport)
    {

    }
}