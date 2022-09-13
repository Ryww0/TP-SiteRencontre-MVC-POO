<?php

namespace App\Controller;

require ('App/Repository/SportRepository.php');
use App\model\sport;
use App\Repository\SportRepository;

class HomeController
{
    public function invoke()
    {
        $repo = new SportRepository();
        return $repo->findAll();
    }
}