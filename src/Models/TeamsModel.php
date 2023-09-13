<?php

namespace Collection\Models;

use PDO;

class TeamsModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getIdFromTeam(string $team): int|false
    {
        $query = $this->db->prepare('SELECT `id` FROM `teams` WHERE `team` = :team;');
        $query->execute(['team' => $team]);
        $data = $query->fetch();

        if ($data) {
            return $data['id'];
        }
        return false;
    }

    public function addTeam(string $team): void
    {
        $query = $this->db->prepare('INSERT INTO `teams` (`team`) VALUES (:team);');
        $query->execute(['team' => $team]);
    }
}