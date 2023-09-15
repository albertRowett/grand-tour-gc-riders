<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\EditRiderHtml;
use Collection\Models\NationsModel;
use Collection\Models\RidersModel;
use Collection\Models\TeamsModel;
use Collection\RiderFormValidator;

require_once 'database.php';
require_once 'vendor/autoload.php';

$riderFormValidator = new RiderFormValidator();
$ridersModel = new RidersModel($db);
$teamsModel = new TeamsModel($db);
$nationsModel = new NationsModel($db);
$headHtml = new HeadHtml();
$editRiderHtml = new EditRiderHtml();

// Handling form submission
$name = $_POST['name'] ?? false;
$image = $_POST['image'] ?? false;
$team = $_POST['team'] ?? false;
$nation = $_POST['nation'] ?? false;
$dob = $_POST['dob'] ?? false;
$giroGcWins = $_POST['giroGcWins'] ?? false;
$tourGcWins = $_POST['tourGcWins'] ?? false;
$vueltaGcWins = $_POST['vueltaGcWins'] ?? false;
$giroStageWins = $_POST['giroStageWins'] ?? false;
$tourStageWins = $_POST['tourStageWins'] ?? false;
$vueltaStageWins = $_POST['vueltaStageWins'] ?? false;

if ($riderFormValidator->validateRiderForm($name, $image, $team, $nation, $dob)) {
    $teamId = $teamsModel->getIdFromTeam($team);
    $nationId = $nationsModel->getIdFromNation($nation);

    if ($teamId === false) {
        if ($teamsModel->addTeam($team)) {
            $teamId = $teamsModel->getIdFromTeam($team);
        } else {
            header('Location: editRider.php?error=1');
        }
    }

    if ($nationId === false) {
        if ($nationsModel->addNation($nation)) {
            $nationId = $nationsModel->getIdFromNation($nation);
        } else {
            header('Location: editRider.php?error=1');
        }
    }

    if (
        $ridersModel->addRider(
            $name,
            $image,
            $teamId,
            $nationId,
            $dob,
            $giroGcWins,
            $tourGcWins,
            $vueltaGcWins,
            $giroStageWins,
            $tourStageWins,
            $vueltaStageWins
        )
    ) {
        header('Location: index.php');
    } else {
        header('Location: editRider.php?error=1');
    };
}

// Displaying the page
$headHtml->display();
$editRiderHtml->display($ridersModel);
