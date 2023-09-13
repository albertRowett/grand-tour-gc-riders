<?php

namespace Collection\Models;

use PDO;

class NationsModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
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

    public function addNation(string $nation): void
    {
        $query = $this->db->prepare('INSERT INTO `nations` (`nation`) VALUES (:nation);');
        $query->execute(['nation' => $nation]);
    }
}
