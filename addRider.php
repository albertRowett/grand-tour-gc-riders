<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\AddRiderHtml;
use Collection\Models\NationsModel;
use Collection\Models\RidersModel;
use Collection\Models\TeamsModel;

require_once 'database.php';
require_once 'vendor/autoload.php';

$ridersModel = new RidersModel($db);
$teamsModel = new TeamsModel($db);
$nationsModel = new NationsModel($db);
$headHtml = new HeadHtml();
$addRiderHtml = new AddRiderHtml();

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
    $teamId = $teamsModel->getIdFromTeam($team);
    $nationId = $nationsModel->getIdFromNation($nation);

    if ($teamId === false) {
        $teamsModel->addTeam($team);
        $teamId = $teamsModel->getIdFromTeam($team);
    }

    if ($nationId === false) {
        $nationsModel->addNation($nation);
        $nationId = $nationsModel->getIdFromNation($nation);
    }

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
    );

    header('Location: index.php');
}

// Displaying the page
$headHtml->display();
$addRiderHtml->display();
