<?php

namespace Collection;

use Collection\Models\TeamsModel;

class TeamsFormValidator
{
    public function validateTeamsForm(array $formData, TeamsModel $teamsModel): bool
    {
        if (
            array_key_last($formData) !== 'submit'
            || end($formData) !== 'Submit'
        ) {
            return false;
        }

        array_pop($formData);
        $teamIds = array_keys($formData);

        foreach ($teamIds as $teamId) {
            if (
                $teamId < 1
                || intval($teamId) !== $teamId // short-circuit DB check if $teamId is not positive int
                || $teamsModel->checkForTeamById($teamId) === false
            ) {
                return false;
            }
        }

        return true;
    }
}
