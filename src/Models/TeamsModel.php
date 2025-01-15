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

    public function getTeams(?int $active = null): array|false
    {
        $queryString = 'SELECT `id`, `team`, `active` FROM `teams`';
        $params = [];

        if ($active !== null) {
            $queryString .= ' WHERE `active` = :active';
            $params['active'] = $active;
        }

        $queryString .= ' ORDER BY `team` ASC;';
        $query = $this->db->prepare($queryString);
        $query->execute($params);
        $data = $query->fetchAll();

        if (!$data) {
            return false;
        }

        $teams = [];
        foreach ($data as $datum) {
            $team = new Team(
                $datum['id'],
                $datum['team'],
                $datum['active']
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

    public function checkForTeamById(int $id): bool
    {
        $query = $this->db->prepare('SELECT 1 FROM `teams` WHERE `id` = :id;');
        $query->execute(['id' => $id]);
        return (bool) $query->fetch();
    }

    public function addTeam(string $team): bool
    {
        $query = $this->db->prepare('
            INSERT INTO `teams` (
                `team`,
                `active`
            )
            VALUES (
                :team,
                1
            );
        ');
        return $query->execute(['team' => $team]);
    }

    public function changeTeamStatus(array $ids, int $active): bool
    {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $params = array_merge([$active], $ids);

        $query = $this->db->prepare("UPDATE `teams` SET `active` = ? WHERE `id` IN ($placeholders);");
        return $query->execute($params);
    }
}
