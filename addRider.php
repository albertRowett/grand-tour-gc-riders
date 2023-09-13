<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\AddRiderHtml;
use Collection\Models\RidersModel;

require_once 'database.php';
require_once 'vendor/autoload.php';

$ridersModel = new RidersModel($db);
$headHtml = new HeadHtml();
$addRiderHtml = new AddRiderHtml();

// Handling form submission
$name = $_POST['name'] ?? false;
$image = $_POST['image'] ?? false;
$team = $_POST['team'] ?? false;
$nationality = $_POST['nationality'] ?? false;
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

if (strlen($nationality) > 0) {
    $nationalityValidation = true;
} else {
    $nationalityValidation = false;
}

if(strlen($dob) === 10) {
    $dobValidation = true;
} else {
    $dobValidation = false;
}

if (
    $nameValidation &&
    $imageValidation &&
    $teamValidation &&
    $nationalityValidation &&
    $dobValidation
) {
    $teamId = $ridersModel->getTeamIdFromTeam($team);
    $nationId = $ridersModel->getNationIdFromNationality($nationality);

    if ($teamId === false) {
        $ridersModel->addTeam($team);
        $teamId = $ridersModel->getTeamIdFromTeam($team);
    }

    if ($nationId === false) {
        $ridersModel->addNation($nationality);
        $nationId = $ridersModel->getNationIdFromNationality($nationality);
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
