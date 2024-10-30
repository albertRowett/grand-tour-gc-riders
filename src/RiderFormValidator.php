<?php

namespace Collection;

use DateTime;

class RiderFormValidator
{
    public function validateRiderForm(
        string $name,
        string $image,
        string $team,
        string $nation,
        string $dob,
        string $giroGc,
        string $tourGc,
        string $vueltaGc,
        string $giroStages,
        string $tourStages,
        string $vueltaStages
    ): bool {
        foreach ([$name, $image, $team, $nation] as $field) {
            $trimmedField = trim($field);
            if ($trimmedField === '' || strlen($trimmedField) > 999) return false; // varchar with max length 999 in DB
        }

        if (!$this->isValidDate($dob)) return false;

        foreach ([$giroGc, $tourGc, $vueltaGc, $giroStages, $tourStages, $vueltaStages] as $field) {
            $fieldInt = intval($field);
            if ($fieldInt != $field || $fieldInt < 0 || $fieldInt > 255) return false; // tinyint in DB, so cannot exceed 255
        }

        return true;
    }

    private function isValidDate(string $dob): bool
    {
        $date = DateTime::createFromFormat('Y-m-d', $dob);
        return $date && $date->format('Y-m-d') === $dob;
    }
}
