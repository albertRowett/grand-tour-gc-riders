<?php

namespace Collection\Models;

use Collection\Entities\Rider;
use PDO;

class RidersModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllRiders(): array|false
    {
        $query = $this->db->prepare('
            SELECT
            `riders`.`id`,
            `riders`.`name`,
            `riders`.`image`,
            `teams`.`team`,
            `nations`.`nation`,
            `riders`.`dob`,
            `riders`.`giro_gc`,
            `riders`.`tour_gc`,
            `riders`.`vuelta_gc`,
            `riders`.`giro_stages`,
            `riders`.`tour_stages`,
            `riders`.`vuelta_stages`
            FROM `riders`
                INNER JOIN `teams`
                    ON `riders`.`team_id` = `teams`.`id`
                INNER JOIN `nations`
                    ON `riders`.`nation_id` = `nations`.`id`
            ORDER BY `riders`.`id` DESC;
        ');
        $query->execute();
        $data = $query->fetchAll();

        if (!$data) {
            return false;
        }

        $allRiders = [];
        foreach ($data as $datum) {
            $rider = new Rider(
                $datum['id'],
                $datum['name'],
                $datum['image'],
                $datum['team'],
                $datum['nation'],
                $datum['dob'],
                $datum['giro_gc'],
                $datum['tour_gc'],
                $datum['vuelta_gc'],
                $datum['giro_stages'],
                $datum['tour_stages'],
                $datum['vuelta_stages']
            );
            $allRiders[] = $rider;
        }

        return $allRiders;
    }

    public function getTeamIdFromTeam(string $team): int|false
    {
        $query = $this->db->prepare('SELECT `id` FROM `teams` WHERE `team` = :team;');
        $query->execute(['team' => $team]);
        $data = $query->fetch();

        if ($data) {
            return $data['id'];
        }
        return false;
    }

    public function getNationIdFromNationality(string $nationality): int|false
    {
        $query = $this->db->prepare('SELECT `id` FROM `nations` WHERE `nation` = :nation;');
        $query->execute(['nation' => $nationality]);
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

    public function addNation(string $nation): void
    {
        $query = $this->db->prepare('INSERT INTO `nations` (`nation`) VALUES (:nation);');
        $query->execute(['nation' => $nation]);
    }

    public function addRider(
        string $name,
        string $image,
        int $teamId,
        int $nationId,
        string $dob,
        ?int $giroGcWins,
        ?int $tourGcWins,
        ?int $vueltaGcWins,
        ?int $giroStageWins,
        ?int $tourStageWins,
        ?int $vueltaStageWins
    ): void {
        $query = $this->db->prepare("
            INSERT INTO `riders` (
            `name`,
            `image`,
            `team_id`,
            `nation_id`,
            `dob`,
            `giro_gc`,
            `tour_gc`,
            `vuelta_gc`,
            `giro_stages`,
            `tour_stages`,
            `vuelta_stages`
            )
            VALUES (
            :name,
            :image,
            $teamId,
            $nationId,
            :dob,
            :giroGcWins,
            :tourGcWins,
            :vueltaGcWins,
            :giroStageWins,
            :tourStageWins,
            :vueltaStageWins
            );
        ");
        $query->execute(
            [
                'name' => $name,
                'image' => $image,
                'dob' => $dob,
                'giroGcWins' => $giroGcWins,
                'tourGcWins' => $tourGcWins,
                'vueltaGcWins' => $vueltaGcWins,
                'giroStageWins' => $giroStageWins,
                'tourStageWins' => $tourStageWins,
                'vueltaStageWins' => $vueltaStageWins
            ]
        );
    }
}
