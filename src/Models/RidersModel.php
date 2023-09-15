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

    public function getActiveRiders(): array|false
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
            `riders`.`vuelta_stages`,
            `riders`.`retired`
            FROM `riders`
                INNER JOIN `teams`
                    ON `riders`.`team_id` = `teams`.`id`
                INNER JOIN `nations`
                    ON `riders`.`nation_id` = `nations`.`id`
            WHERE `riders`.`retired` = 0
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
                $datum['vuelta_stages'],
                $datum['retired']
            );
            $allRiders[] = $rider;
        }

        return $allRiders;
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
    ): bool {
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
            `vuelta_stages`,
            `retired`
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
            :vueltaStageWins,
            0
            );
        ");
        return $query->execute(
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

    public function retireRider($id): bool
    {
        $query = $this->db->prepare("UPDATE `riders` SET `retired` = 1 WHERE `id` = $id;");
        return $query->execute();
    }
}
