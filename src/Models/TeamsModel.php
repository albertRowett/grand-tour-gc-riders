<?php

namespace Collection\Models;

use Collection\Entities\Team;
use PDO;

class TeamsModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllTeams(): array|false
    {
        $query = $this->db->prepare('SELECT `id`, `team` FROM `teams` ORDER BY `team` ASC;');
        $query->execute();
        $data = $query->fetchAll();

        if (!$data) {
            return false;
        }

        $teams = [];
        foreach ($data as $datum) {
            $team = new Team(
                $datum['id'],
                $datum['team']
            );
            $teams[] = $team;
        }
        return $teams;
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

    public function addTeam(string $team): bool
    {
        $query = $this->db->prepare('INSERT INTO `teams` (`team`) VALUES (:team);');
        return $query->execute(['team' => $team]);
    }
}
