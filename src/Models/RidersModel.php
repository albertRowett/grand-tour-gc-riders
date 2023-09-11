<?php

namespace Collection\Models;

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
        $query = $this->db->prepare(
            'SELECT `riders`.`id`, `riders`.`name`, `riders`.`image`, `teams`.`team`, `nations`.`nation`, `riders`.`dob`, `riders`.`giro_gc`, `riders`.`tour_gc`, `riders`.`vuelta_gc`, `riders`.`giro_stages`, `riders`.`tour_stages`, `riders`.`vuelta_stages`
            FROM `riders`
                INNER JOIN `teams`
                    ON `riders`.`team_id` = `teams`.`id`
                INNER JOIN `nations`
                    ON `riders`.`nation_id` = `nations`.`id`
            ORDER BY `riders`.`dob`;'
        );
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
}
