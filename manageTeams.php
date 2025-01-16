<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\FooterHtml;
use Collection\HTML\PageContents\HeaderHtml;
use Collection\HTML\PageContents\ManageTeamsHtml;
use Collection\Models\TeamsModel;
use Collection\TeamsFormValidator;

require_once 'database.php';
require_once 'vendor/autoload.php';

$teamsModel = new TeamsModel($db);
$teamsFormValidator = new TeamsFormValidator();
$headHtml = new HeadHtml();
$headerHtml = new HeaderHtml();
$manageTeamsHtml = new ManageTeamsHtml();
$footerHtml = new FooterHtml();

$teams = $teamsModel->getTeams();

// Handle form submission
$formData = $_POST ?? false;

if ($formData !== []) { // Prevent validation attempt on page load
    if (
        $teamsFormValidator->validateTeamsForm(
            $formData,
            $teamsModel
        ) === false
    ) {
        header('Location: manageTeams.php?error=1');
        exit;
    }

    array_pop($formData); // Remove 'submit' => 'Submit' from end of array
    $activeTeamIds = array_keys($formData);
    $allTeamIds = array_map(fn($team) => $team->id, $teams);
    $inactiveTeamIds = array_diff($allTeamIds, $activeTeamIds);

    if (
        $activeTeamIds !== []
        && $teamsModel->changeTeamStatus($activeTeamIds, 1) === false
    ) {
            header('Location: manageTeams.php?error=1');
            exit;
    }

    if (
        $inactiveTeamIds !== []
        && $teamsModel->changeTeamStatus($inactiveTeamIds, 0) === false
    ) {
            header('Location: manageTeams.php?error=1');
            exit;
    }

    header('Location: manageTeams.php');
    exit;
}

// Display page
$headHtml->display();
$headerHtml->display();
$manageTeamsHtml->display($teams);
$footerHtml->display();
