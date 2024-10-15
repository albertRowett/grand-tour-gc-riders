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

    public function getRiders(int $retired, ?int $teamId): array|false
    {
        $queryString = '
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
            WHERE `riders`.`retired` = :retired
        ';
        if ($teamId !== null) {
            $queryString .= 'AND `teams`.`id` = :teamId';
        }
        $queryString .= '
            ORDER BY (`riders`.`giro_gc` + `riders`.`tour_gc` + `riders`.`vuelta_gc`) DESC,
            (`riders`.`giro_stages` + `riders`.`tour_stages` + `riders`.`vuelta_stages`) DESC,
            `riders`.`dob` DESC;
        ';
        $query = $this->db->prepare($queryString);
        $params = ['retired' => $retired];
        if ($teamId !== null) {
            $params['teamId'] = $teamId;
        }
        $query->execute($params);
        $data = $query->fetchAll();

        if (!$data) {
            return false;
        }

        $riders = [];
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
            $riders[] = $rider;
        }
        return $riders;
    }

    public function getRiderById(int $id): Rider|false
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
            WHERE `riders`.`id` = :id;
        ');
        $query->execute(['id' => $id]);
        $data = $query->fetch();

        if (!$data) {
            return false;
        }

        $rider = new Rider(
            $data['id'],
            $data['name'],
            $data['image'],
            $data['team'],
            $data['nation'],
            $data['dob'],
            $data['giro_gc'],
            $data['tour_gc'],
            $data['vuelta_gc'],
            $data['giro_stages'],
            $data['tour_stages'],
            $data['vuelta_stages'],
            $data['retired']
        );
        return $rider;
    }

    public function addRider(
        string $name,
        string $image,
        int $teamId,
        int $nationId,
        string $dob,
        ?int $giroGc,
        ?int $tourGc,
        ?int $vueltaGc,
        ?int $giroStages,
        ?int $tourStages,
        ?int $vueltaStages
    ): bool {
        $query = $this->db->prepare('
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
            :teamId,
            :nationId,
            :dob,
            :giroGc,
            :tourGc,
            :vueltaGc,
            :giroStages,
            :tourStages,
            :vueltaStages,
            0
            );
        ');
        return $query->execute(
            [
                'name' => $name,
                'image' => $image,
                'teamId' => $teamId,
                'nationId' => $nationId,
                'dob' => $dob,
                'giroGc' => $giroGc,
                'tourGc' => $tourGc,
                'vueltaGc' => $vueltaGc,
                'giroStages' => $giroStages,
                'tourStages' => $tourStages,
                'vueltaStages' => $vueltaStages
            ]
        );
    }

    public function editRider(
        int $id,
        string $name,
        string $image,
        int $teamId,
        int $nationId,
        string $dob,
        ?int $giroGc,
        ?int $tourGc,
        ?int $vueltaGc,
        ?int $giroStages,
        ?int $tourStages,
        ?int $vueltaStages
    ): bool {
        $query = $this->db->prepare('
            UPDATE `riders` SET
            `name` = :name,
            `image` = :image,
            `team_id` = :teamId,
            `nation_id` = :nationId,
            `dob` = :dob,
            `giro_gc` = :giroGc,
            `tour_gc` = :tourGc,
            `vuelta_gc` = :vueltaGc,
            `giro_stages` = :giroStages,
            `tour_stages` = :tourStages,
            `vuelta_stages` = :vueltaStages
            WHERE `id` = :id;
        ');
        return $query->execute(
            [
                'name' => $name,
                'image' => $image,
                'teamId' => $teamId,
                'nationId' => $nationId,
                'dob' => $dob,
                'giroGc' => $giroGc,
                'tourGc' => $tourGc,
                'vueltaGc' => $vueltaGc,
                'giroStages' => $giroStages,
                'tourStages' => $tourStages,
                'vueltaStages' => $vueltaStages,
                'id' => $id
            ]
        );
    }

    public function toggleRiderRetirement(int $id, int $retired): bool
    {
        $query = $this->db->prepare("UPDATE `riders` SET `retired` = $retired WHERE `id` = $id;");
        return $query->execute();
    }
}
