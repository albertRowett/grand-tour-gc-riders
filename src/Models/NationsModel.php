<?php

namespace Collection\Models;

use Collection\Entities\Nation;
use PDO;

class NationsModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getNations(): array|false
    {
        $query = $this->db->prepare('SELECT `id`, `nation` FROM `nations` ORDER BY `nation` ASC;');
        $query->execute();
        $data = $query->fetchAll();

        if (!$data) {
            return false;
        }

        $nations = [];
        foreach ($data as $datum) {
            $nation = new Nation(
                $datum['id'],
                $datum['nation']
            );
            $nations[] = $nation;
        }
        return $nations;
    }

    public function getIdFromNation(string $nation): int|false
    {
        $query = $this->db->prepare('SELECT `id` FROM `nations` WHERE `nation` = :nation;');
        $query->execute(['nation' => $nation]);
        $data = $query->fetch();

        if ($data) {
            return $data['id'];
        }
        return false;
    }

    public function checkForNationById(int $id): bool
    {
        $query = $this->db->prepare('SELECT 1 FROM `nations` WHERE `id` = :id;');
        $query->execute(['id' => $id]);
        return (bool) $query->fetch();
    }

    public function addNation(string $nation): bool
    {
        $query = $this->db->prepare('INSERT INTO `nations` (`nation`) VALUES (:nation);');
        return $query->execute(['nation' => $nation]);
    }
}
