<?php

namespace App\Repository;

use App\Model\Sport;

interface ISportRepository
{
    public function add(Sport $sport);
    public function findAll() : array;
    public function update(Sport $sport);
    public function delete(Sport $sport);
    public function findById($id) : Sport;
}
