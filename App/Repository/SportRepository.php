<?php

namespace App\Repository;

use App\Model\Sport;
use App\Service\Database;
use PDO;
use PDOException;

class SportRepository extends Database implements ISportRepository{

    public function add(Sport $sport)
    {
        $stmt = $this->db->prepare("INSERT INTO sport (name) VALUES (:name)");
        $stmt->bindValue(':name', $sport->getName());
        $stmt->execute();
        $stmt = null;
    }

    public function findAll() : array
    {
        $stmt = $this->db->prepare("SELECT * FROM sport ORDER BY name ASC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetchAll();
        if (!$arr) {
            throw new PDOException("Could not find sport in database");
        }
        $stmt = null;
        $sports = [];
        foreach ($arr as $sport) {
            $s = new Sport($sport['name']);
            $s->setId($sport['id']);
            $sports[] = $s;
        }
        return $sports;
    }

    public function update(Sport $sport)
    {
        $stmt = $this->db->prepare("UPDATE sport SET name = :name WHERE id = :id");
        $stmt->bindValue(':name', $sport->getName());
        $stmt->bindValue(':id', $sport->getId());
        $stmt->execute();
        $stmt = null;
    }

    public function delete(Sport $sport)
    {
        $stmt = $this->db->prepare("DELETE FROM sport WHERE id = :id");
        $stmt->bindValue(':id', $sport->getId());
        $stmt->execute();
        $stmt = null;
    }

    public function findById($id): Sport
    {
        $stmt = $this->db->prepare("SELECT * FROM sport WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        if (!$arr) {
            throw new PDOException("Could not find id in database");
        }
        $stmt = null;
        $sport = new Sport($arr['design']);
        $sport->setId($arr['id']);
        return $sport;
    }
}
