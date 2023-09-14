<?php

namespace Collection;

class RiderFormValidator
{
    public function validateRiderForm(
        string $name,
        string $image,
        string $team,
        string $nation,
        string $dob
    ): bool {
        if (strlen($name) > 0) {
            $nameValidation = true;
        } else {
            $nameValidation = false;
        }

        if (strlen($image) > 0) {
            $imageValidation = true;
        } else {
            $imageValidation = false;
        }

        if (strlen($team) > 0) {
            $teamValidation = true;
        } else {
            $teamValidation = false;
        }

        if (strlen($nation) > 0) {
            $nationValidation = true;
        } else {
            $nationValidation = false;
        }

        if (strlen($dob) === 10) {
            $dobValidation = true;
        } else {
            $dobValidation = false;
        }

        if (
            $nameValidation &&
            $imageValidation &&
            $teamValidation &&
            $nationValidation &&
            $dobValidation
        ) {
            return true;
        }
        return false;
    }
}
